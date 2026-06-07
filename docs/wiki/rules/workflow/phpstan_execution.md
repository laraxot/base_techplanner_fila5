# Esecuzione di PHPStan in Laraxot Fixcity

## Comando corretto

Eseguire PHPStan dalla cartella `laravel` usando il livello configurato in `phpstan.neon`.

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/NomeModulo --memory-limit=-1
```

Per lo sweep completo dei moduli:

```bash
cd laravel
./vendor/bin/phpstan analyse Modules --memory-limit=-1
```

## Regola critica

Non passare `--level` al comando. Il livello e' `max` ed e' definito in `phpstan.neon`.
Non modificare `phpstan.neon` per abbassare o cambiare il livello: correggere gli errori o restringere solo il path analizzato.

## Sweep modulo per modulo

```bash
cd laravel
mkdir -p /tmp/phpstan-modules
for module in Modules/*; do
    [ -d "$module" ] || continue
    module_name="$(basename "$module")"
    [ "$module_name" = "docs" ] && continue

    if ! find "$module" -type f -name '*.php' | grep -q .; then
        printf '%s\tSKIP\tno PHP files\n' "$module_name"
        continue
    fi

    ./vendor/bin/phpstan analyse "$module" --memory-limit=-1 > "/tmp/phpstan-modules/${module_name}.log" 2>&1
    printf '%s\t%s\n' "$module_name" "$?"
done
```

## Issue GitHub per modulo

Per ogni modulo con errori reali:

1. Entrare nel modulo o usare `git -C laravel/Modules/NomeModulo remote -v`.
2. Creare o aggiornare issue nella repo owner del modulo.
3. Incollare comando esatto, path, identificatori PHPStan e snippet degli errori.
4. Dopo il fix, rieseguire PHPStan sul modulo e commentare l'esito.

## Note operative

- `No files found to analyse` su un modulo docs-only non e' un errore di codice: classificare come `SKIP no PHP files`.
- Se compare un errore severo del parallel worker/cache, rieseguire lo stesso modulo anche con `--debug`; poi ripetere il run normale prima di aprire una issue di codice.
