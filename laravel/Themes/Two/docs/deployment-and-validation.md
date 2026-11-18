# Deploy e validazione - Tema Two

## Produzione

- **Dominio**: `sottana.com` (HTTPS: [ssl-configuration.md](../../../docs/ssl-configuration.md))
- **Document root**: `/home/ploi/sottana.com/public_html`
- **Deploy**: push su `master` attiva l’auto-deploy
- Le modifiche al tema (viste, componenti, asset) vanno verificate su produzione dopo il deploy

## Validazione consigliata

Dopo merge su `master` controllare:

1. **Contatti** – https://sottana.com/it/contatti (o `http://` finché SSL non è attivo)  
   - Sezione "Dove Siamo", mappa (iframe o PNG), link "Ottieni Indicazioni", indirizzo corretto
2. **Header/Footer** – brand, contatti, link
3. **Pagine modificate** – stile, link, contenuti

## Mappa contatti

- Componente: `pub_theme::components.blocks.map.static-clickable`
- Se presente PNG: `public/modules/techplanner/images/map-via-vanzo.png` → mostra immagine statica
- Altrimenti: fallback iframe Google Maps (gratuito, non API)
- Link navigazione: Google Maps con coordinate 45.5633, 12.2506 (Via Vanzo 86/A)

## Collegamenti

- [Deployment e validazione (root)](../../../docs/deployment-and-validation.md)
- [SSL e document root](../../../docs/ssl-configuration.md)
- [Contatti Sottana Service](./contatti-sottana-service.md)
- [Mappa statica implementazione](./mappa-statica-implementazione-completa.md)
