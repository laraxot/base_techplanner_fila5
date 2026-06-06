# Dal nome tenant al tema pubblico (pub_theme)

La **risoluzione del tema** dipende dal modulo Tenant: il nome tenant determina la cartella di config da cui si legge `xra.php` e quindi `pub_theme`.

## Catena

1. **`APP_URL`** (`.env`) → es. `http://laravelpizza.local`
2. **`GetTenantNameAction::execute()`** → ricava l’host da `config('app.url')` (o `$_SERVER['SERVER_NAME']`), inverte le parti (es. `laravelpizza.local` → `local/laravelpizza`)
3. **Cartella config** → `config_path($tenantName)` = `laravel/config/local/laravelpizza/`
4. **`TenantService::getConfig('xra')`** → carica `config/local/laravelpizza/xra.php`
5. **`pub_theme`** → in `xra.php` la chiave `pub_theme` (es. `'Meetup'`) identifica il tema pubblico
6. **Percorso tema** → `laravel/Themes/{pub_theme}` (es. `laravel/Themes/Meetup`)

## Ruolo del modulo Tenant

- **GetTenantNameAction**: nome tenant a partire da `APP_URL` (e verifica esistenza della cartella config).
- **GetTenantFilePathAction**: path del file di config per un dato tenant (es. `xra.php`).
- **GetTenantConfigArrayAction**: caricamento dell’array di config (usato da `TenantService::getConfig('xra')`).

`XotData::make()` usa `TenantService::getConfig('xra')` e quindi il valore di `pub_theme` proviene dalla config tenant caricata dal modulo Tenant.

## SSoT per tenant TechPlanner

| Ambiente | File config | `pub_theme` atteso |
|----------|-------------|-------------------|
| Dev locale | `config/local/techplanner/xra.php` | **`Two`** |
| Produzione Sottana | `config/net/sottana1/xra.php` | **`Two`** |
| Fixcity / PA | altri tenant | `Sixteen` |

**Non** usare `config/xot.php` come verità del tema: è fallback generico. La catena runtime passa sempre da `TenantService::getConfig('xra')`.

Verifica obbligatoria prima di modificare view Folio, header CMS o asset Vite:

```bash
cd laravel && php artisan tinker --execute="
echo Modules\Tenant\Services\TenantService::getName().PHP_EOL;
echo Modules\Xot\Datas\XotData::make()->pub_theme.PHP_EOL;
"
```

Atteso su TechPlanner: `local/techplanner` + `Two`.

## Anti-pattern da evitare (agenti AI)

1. **Cambiare `pub_theme` a Sixteen** per risolvere una view mancante — portare il partial nel tema Two o adattare `header.json`.
2. **Confondere BMAD §7** (pattern Folio Sixteen / Fixcity) con il tema del tenant TechPlanner.
3. **Diagnosticare il tema** da un solo file (`config/xot.php`) ignorando la risoluzione tenant.
4. **Dimenticare cache** dopo modifica config: `php artisan config:clear && php artisan view:clear`.

## Riferimenti

- [configuration](configuration.md) – risoluzione tenant-aware dei valori di config
- [pub_theme namespace rule](../../../../docs/pub_theme_namespace_rule.md) – regola `pub_theme::` e changelog errori
- [Public theme resolution (LLM wiki)](../../../docs/wiki/concepts/public-theme-resolution-and-vite-assets.md)
- [Prevenzione push GH008 / LFS](../../../../docs/git-lfs-push-gh008-prevention.md)
- Tema Two: `laravel/Themes/Two/docs/component-library.md`
