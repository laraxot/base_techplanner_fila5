---
title: "Geo: viewport mobile e zoom accessibile"
type: concept
module: Geo
tags: [mobile, viewport, zoom, accessibility, maps]
status: stable
---

# Geo: viewport mobile e zoom accessibile

Le pagine statiche della mappa devono dichiarare soltanto:

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

`maximum-scale=1.0` e `user-scalable=no` impediscono lo zoom richiesto dagli
utenti con difficoltà visive e violano WCAG 1.4.4. La mappa può gestire il
proprio gesto di pan/zoom sul contenitore Leaflet; non deve bloccare lo zoom
dell'intera pagina.

Il contratto vale sia per la pagina farmshops sia per il flusso statico
`contribute/`. Le viste Filament e il picker ereditano il viewport dal layout
del tema e seguono la stessa regola.
