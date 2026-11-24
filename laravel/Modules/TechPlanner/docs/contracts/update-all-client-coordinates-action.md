---
title: "Contratto — UpdateAllClientCoordinatesAction"
type: contract
action: "Modules\TechPlanner\Actions\UpdateAllClientCoordinatesAction"
tags: [contract, action, clienti, geocoding, http]
created: 2026-11-24
updated: 2026-11-24
---

# UpdateAllClientCoordinatesAction

Sorgente: `app/Actions/UpdateAllClientCoordinatesAction.php`. Comando: `techplanner:clients-update-coordinates`.

## Input

- Nessuno: lavora su tutti i `Client` con `latitude` o `longitude` null.

## Output

- `bool`: sempre `true` se non lancia.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| TP-CLIENT-GEOCODE-INV-1 | Tocca solo i clienti senza coordinate: quelli già geocodificati non si richiedono. | — |
| TP-CLIENT-GEOCODE-INV-2 | Un indirizzo senza risultato (`null`) lascia il cliente invariato. | — |

## Effetti collaterali

- Una richiesta HTTP per cliente a Google Geocoding API tramite `Modules\Geo\Actions\GetCoordinatesAction`
  (chiave `services.google.maps.key`): l'indirizzo completo (`full_address`) del cliente esce verso un terzo.
- `update()` di `latitude`/`longitude` sul cliente.

## Errori

- Chiave mancante, risposta HTTP non riuscita o JSON non valido: `RuntimeException` da `GetCoordinatesAction`, che
  interrompe il ciclo; i clienti già aggiornati restano aggiornati. Il comando stampa il messaggio e ritorna 1.

## Non fa

- Non limita la frequenza delle richieste né usa cache: con molti clienti può superare le quote dell'API.
- Non usa il proxy OSM/Nominatim del modulo Geo.
- Non è schedulata.
