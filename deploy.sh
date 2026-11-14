#!/usr/bin/env bash
#
# Rilascio in produzione di TechPlanner (OPS-07, riscritto il 2026-11-10).
#
# Differenze dalla versione precedente:
#   - `composer install` dal composer.lock (prima `composer update -W`: in produzione arrivavano versioni mai provate);
#   - sito in manutenzione durante il rilascio, e rimesso online anche se qualcosa fallisce;
#   - copia del database prima delle migrazioni (mysqldump), con il nome stampato a fine rilascio;
#   - niente più `vendor:publish --all` + `rm -rf database/migrations/*` (si pubblicano solo gli asset necessari);
#   - gli asset di temi e moduli arrivano in public_html con symlink (themes/<Tema> e assets/<modulo>, vedi sotto):
#     nessun `npm run copy`, nessun vendor:publish degli asset dei moduli;
#   - si ferma al primo errore (set -euo pipefail) e dice dove.
#
# Uso:   ./deploy.sh                 rilascio completo
#        SKIP_BACKUP=1 ./deploy.sh   senza copia del DB (sconsigliato)
#        NO_DEV=1 ./deploy.sh        senza le dipendenze di sviluppo (da provare prima in staging)
#        SUDO= ./deploy.sh           senza sudo (se l'utente ha già i permessi)
#
# Ripristino: vedi docs/audit/RELEASE.md, sezione «Tornare indietro».

set -euo pipefail

SUDO=${SUDO-sudo}
PHP=${PHP:-php}
APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)/laravel"
BACKUP_DIR=${BACKUP_DIR:-"$APP_DIR/storage/backups"}
STAMP=$(date +%Y%m%d-%H%M%S)

cd "$APP_DIR"

step() { printf '\n==> %s\n' "$*"; }

in_maintenance=0
on_exit() {
    local status=$?
    if [ "$in_maintenance" = 1 ]; then
        step "Rimetto il sito online"
        $SUDO $PHP artisan up || true
    fi
    if [ "$status" -ne 0 ]; then
        echo "DEPLOY_FAILED (riga $1, uscita $status). Il database non è stato ripristinato in automatico: vedi docs/audit/RELEASE.md." >&2
    fi
    exit "$status"
}
trap 'on_exit $LINENO' EXIT

step "Controllo PHP"
$PHP -r 'exit(version_compare(PHP_VERSION, "8.4.1", ">=") ? 0 : 1);' \
    || { echo "Serve PHP 8.4.1 o superiore (trovato $($PHP -r 'echo PHP_VERSION;'))." >&2; exit 1; }

step "Symlink nella document root (temi e moduli)"
# public_html/themes/<Tema>          -> ../../laravel/Themes/<Tema>/public
# public_html/assets/<modulo minusc> -> ../../laravel/Modules/<Modulo>/public
# Gli asset restano nel tema o nel modulo (una sola copia, versionata). I .gitignore di public_html/themes e
# public_html/assets ignorano le cartelle vere con quei nomi: una vecchia copia trovata lì non è nel repo e si
# può rigenerare, quindi viene spostata in storage/backups (non cancellata) e sostituita dal symlink.
link_public() {
    local link=$1 target=$2
    if [ -L "$link" ]; then
        if [ "$(readlink "$link")" != "$target" ]; then
            echo "$link punta a $(readlink "$link") invece di $target: lo correggo."
            ln -sfn "$target" "$link"
        fi
        return
    fi
    if [ -e "$link" ]; then
        local parked="$BACKUP_DIR/public_html-$(basename "$(dirname "$link")")-$(basename "$link")-$STAMP"
        mkdir -p "$BACKUP_DIR"
        mv "$link" "$parked"
        echo "Vecchia copia $link spostata in $parked"
    fi
    ln -s "$target" "$link"
    echo "Creato $link -> $target"
}
mkdir -p "$APP_DIR/../public_html/themes" "$APP_DIR/../public_html/assets"
for theme_public in "$APP_DIR"/Themes/*/public; do
    [ -f "$theme_public/manifest.json" ] || continue
    theme=$(basename "$(dirname "$theme_public")")
    link_public "$APP_DIR/../public_html/themes/$theme" "../../laravel/Themes/$theme/public"
done
for module_public in "$APP_DIR"/Modules/*/public; do
    [ -d "$module_public" ] || continue
    module=$(basename "$(dirname "$module_public")")
    link_public "$APP_DIR/../public_html/assets/${module,,}" "../../laravel/Modules/$module/public"
done

step "Sito in manutenzione"
$SUDO $PHP artisan down --retry=30 --refresh=15
in_maintenance=1

step "Dipendenze dal composer.lock"
composer_flags=(--no-interaction --prefer-dist --optimize-autoloader)
if [ "${NO_DEV:-0}" = 1 ]; then
    composer_flags+=(--no-dev)
fi
$SUDO env COMPOSER_ALLOW_SUPERUSER=1 $PHP -d memory_limit=-1 "$(command -v composer || echo composer.phar)" install "${composer_flags[@]}"

if [ "${SKIP_BACKUP:-0}" != 1 ]; then
    step "Copia del database prima delle migrazioni"
    mkdir -p "$BACKUP_DIR"
    backup_file="$BACKUP_DIR/db-$STAMP.sql.gz"
    # Credenziali lette dalla configurazione di Laravel, passate a mysqldump via ambiente (mai sulla riga di comando).
    db_json=$($PHP artisan tinker --execute='$c = config("database.connections.".config("database.default")); echo json_encode(["driver" => $c["driver"] ?? "", "host" => $c["host"] ?? "", "port" => (string) ($c["port"] ?? ""), "database" => $c["database"] ?? "", "username" => $c["username"] ?? "", "password" => $c["password"] ?? ""]);' | tail -n 1)
    db() { printf '%s' "$db_json" | $PHP -r '$d = json_decode(stream_get_contents(STDIN), true); echo $d[$argv[1]] ?? "";' "$1"; }
    case "$(db driver)" in
        mysql | mariadb)
            MYSQL_PWD="$(db password)" mysqldump --single-transaction --quick --routines \
                -h "$(db host)" -P "$(db port)" -u "$(db username)" "$(db database)" | gzip > "$backup_file"
            ;;
        sqlite)
            gzip -c "$(db database)" > "$backup_file"
            ;;
        *)
            echo "Driver $(db driver): copia non supportata, uso SKIP_BACKUP=1 solo se hai già una copia." >&2
            exit 1
            ;;
    esac
    chmod 600 "$backup_file"
    echo "Copia salvata in $backup_file"
fi

step "Migrazioni"
$SUDO $PHP artisan migrate --force --no-interaction

step "Asset e cache"
$SUDO $PHP artisan filament:upgrade --no-interaction
$SUDO $PHP artisan livewire:publish --assets
# public_html/vendor è ignorata da git: lo stile del banner cookie (Gdpr) va pubblicato a ogni rilascio.
$SUDO $PHP artisan vendor:publish --tag=cookie-public --force
$SUDO $PHP artisan optimize:clear
$SUDO $PHP artisan config:cache
$SUDO $PHP artisan view:cache
$SUDO $PHP artisan icons:cache
$SUDO $PHP artisan filament:optimize
# Le route restano senza cache: alcune rotte dei moduli sono closure (route:cache fallirebbe).
$SUDO $PHP artisan route:clear
$SUDO $PHP artisan queue:restart

step "Permessi"
$SUDO chown -R www-data:www-data storage bootstrap/cache
$SUDO chmod -R ug+rwX storage bootstrap/cache

step "Sito online"
$SUDO $PHP artisan up
in_maintenance=0

echo "DEPLOY_SUCCESS"
