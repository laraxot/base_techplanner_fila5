---
title: "Asset di moduli e temi in public_html: symlink, non copie"
type: concept
module: Xot
status: active
created: 2026-11-12
updated: 2026-11-12
tags: [public_html, symlink, assets, temi, moduli, gitignore, deploy, AssetAction]
qmd: "public_html assets modulo symlink gitignore temi themes copia AssetAction deploy"
related:
  - ../../../../../Themes/Two/docs/wiki/concepts/public-asset-deployment.md
  - ../../../../../../docs/audit/RELEASE.md
---

# Asset di moduli e temi in `public_html`: symlink, non copie

## La regola

`public_html` è la document root e non si cancella. Gli asset di temi e moduli ci arrivano **solo con symlink
relativi**:

| In `public_html` | Comando (da dentro la cartella padre) |
|---|---|
| `themes/<Tema>` | `ln -s ../../laravel/Themes/<Tema>/public <Tema>` |
| `assets/<modulo in minuscolo>` | `ln -s ../../laravel/Modules/<Modulo>/public <modulo>` |

Accanto a ciascuna cartella c'è un `.gitignore` con una riga per nome, **con la barra finale**:

```gitignore
# public_html/assets/.gitignore
geo/
ui/
user/
xot/
# ... una riga per ogni modulo
```

## Perché

- **Una sola copia.** Il file sta nel modulo (o nel tema) e solo lì. Prima si copiava (`npm run copy`,
  `vendor:publish`, `AssetAction`) e le copie si disallineavano: `laravel/public` aveva 50 file vecchi mai serviti,
  `public_html/themes/Two` era rimasta indietro rispetto alla build.
- **Versionato con il codice che lo usa.** Il modulo porta con sé i suoi asset: chi aggiorna il modulo aggiorna
  anche quelli, nello stesso commit.
- **Build visibile subito.** `npm run build` scrive in `<Modulo|Tema>/public` (per Geo: `outDir: './public'`); il sito
  la vede senza altri passi e l'URL resta `/assets/<modulo>/...` o `/themes/<Tema>/...`.
- **Relativo, quindi portabile.** `../../laravel/...` funziona in qualsiasi cartella venga clonato il progetto
  (locale, staging, produzione), senza percorsi assoluti.

### Perché il `.gitignore` con la barra finale

Per git un symlink è un file, non una cartella. Il pattern `geo/` vale solo per le cartelle, quindi:

- il **symlink** `public_html/assets/geo` non corrisponde al pattern e resta **tracciato**: chi clona trova già il link;
- una **cartella vera** con lo stesso nome (copia lasciata da `vendor:publish`, `npm run copy`, `AssetAction` per un
  modulo senza `public/`, una vecchia installazione) corrisponde al pattern ed è **ignorata**: non può finire nel repo
  per sbaglio e non sporca `git status`.

Per i moduli che non hanno `public/` (oggi tutti tranne Geo, UI, User, Xot) `AssetAction` crea una cartella vera
`public_html/assets/<modulo>/` con i file copiati da `resources/`: è una cache rigenerabile, e il `.gitignore` la
tiene fuori.

## Cosa fa il codice

- `XotBaseServiceProvider::registerPublicAssets()` non registra `vendor:publish` se `assets/<modulo>` è già un symlink
  (copiare ogni file su se stesso lo troncherebbe).
- `AssetAction` (`modulo::img/logo.png`): se la destinazione sta dentro `Modules/<Modulo>/public` (cioè passa dal
  symlink), il file versionato fa fede e **non viene sovrascritto** con la versione di `resources/`; si copia solo se
  manca. Prima, in locale (copia forzata a ogni richiesta), una visita al pannello modificava
  `Modules/Xot/public/img/logo.png` nel repo. `public_path()` restituisce percorsi già risolti
  (`app/Application.php`), per questo il controllo confronta i percorsi invece di usare `is_link()`.
- `Modules/Xot/tests/Unit/PublicAssetsAreSymlinkedTest.php` controlla la regola senza avviare l'applicazione:
  symlink e voce nel `.gitignore` per ogni modulo con `public/` e per ogni tema con una build, voce nel `.gitignore`
  anche per i moduli senza `public/`.
- `deploy.sh`, passo «Symlink nella document root»: crea i symlink mancanti, corregge quelli che puntano altrove e
  sposta in `storage/backups` (non cancella) una vecchia cartella trovata al posto del link.

## Aggiungere un modulo con asset pubblici

```bash
cd public_html/assets
ln -s ../../laravel/Modules/NuovoModulo/public nuovomodulo
grep -qx 'nuovomodulo/' .gitignore || echo 'nuovomodulo/' >> .gitignore
git add -f nuovomodulo .gitignore
```

Verifica: `git ls-files -s public_html/assets/nuovomodulo` mostra modo `120000` (symlink).
