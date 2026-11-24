---
title: "Manuale d'uso per attori - Seo"
module: Seo
type: manuale-uso
---

# Modulo Seo

## Scopo

Seo produce metadati, URL canonici, sitemap, robots.txt, dati strutturati,
link social e verifica IndexNow. Le route pubbliche servono crawler e browser;
la configurazione e la rigenerazione amministrativa passano dal pannello
Filament.

## Matrice attori

| Attore | Accesso o responsabilità verificata |
|---|---|
| Ospite | Può leggere gli endpoint pubblici `sitemap.xml`, `robots.txt` e la chiave IndexNow valida; non configura il modulo. |
| Utente autenticato | N/A come attore operativo del modulo; può incontrare i metadati generati nelle pagine applicative. |
| Gruppo/ruolo | N/A: non è presente una policy SEO con ruolo intermedio dedicato. |
| Admin | N/A come ruolo generico separato: le operazioni BO sono esposte nel pannello del modulo secondo la convenzione Xot. |
| Super-admin | Modifica `indexnow_key` e alias di percorso dalla `SettingPage`; la documentazione del codice la dichiara riservata al super-admin. |
| Operatore | N/A. |

## Flussi reali

1. L'applicazione costruisce i metatag tramite facade/adapters e Actions Seo.
2. `GET /sitemap.xml` esegue `BuildSitemapAction`.
3. `GET /robots.txt` esegue `BuildRobotsTxtAction`.
4. `GET /{key}.txt` verifica e serve la chiave IndexNow configurata; chiavi non
   valide non sono servite.
5. Il super-admin configura chiave e alias dalla `SettingPage`.
6. Il widget amministrativo può generare/rigenerare `public_html/sitemap.xml`.

## Prerequisiti

- Seo abilitato e configurazione tenant disponibile.
- Pagine/Actions consumer che forniscano i percorsi indicizzabili e i dati SEO.
- Valore IndexNow conforme al formato validato, quando si usa la verifica.
- Permessi del processo PHP per scrivere la sitemap quando si usa il widget.
- Pannello Filament e ruolo super-admin per modificare la configurazione.

## Limiti

- `routes/api.php` è vuoto: gli endpoint documentati sono route web alla radice,
  senza prefisso lingua.
- Seo non fornisce un editor pubblico per utenti o ospiti.
- La sitemap generata dal widget scrive sul filesystem pubblico; non è un
  semplice calcolo in memoria.
- La documentazione README contiene materiale storico incoerente; per il flusso
  corrente fanno fede le route, le Actions e le pagine Filament collegate sotto.

## Link a codice/docs

- [Route web](../routes/web.php)
- [Build sitemap](../app/Actions/Sitemap/BuildSitemapAction.php)
- [Build robots](../app/Actions/Robots/BuildRobotsTxtAction.php)
- [Chiave IndexNow](../app/Actions/IndexNow/ServeIndexNowKeyAction.php)
- [Impostazioni](../app/Filament/Pages/SettingPage.php)
- [Widget sitemap](../app/Filament/Widgets/GenerateSitemapWidget.php)
- [Contratto IndexNow](contracts/submit-index-now-action.md)
