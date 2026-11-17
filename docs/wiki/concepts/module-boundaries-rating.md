---
title: Confini modulo — Rating vs domini applicativi
type: concept
created: 2026-05-29
---

# Rating: confine modulo

Ogni valutazione (stelle, like, sondaggi) passa da **Modules/Rating**.

I moduli consumer (Fixcity, Blog, …) espongono solo:

- `HasRatingContract` + trait `HasRating` / `InteractsWith*`
- Actions che scrivono `RatingMorph`
- Accessor virtuali per Filament/export se serve etichetta locale

Vietato duplicare `*_rating` / `*_rated_at` sulle tabelle del consumer.

Caso Fixcity: [ticket-citizen-rating-via-rating-module.md](../../../laravel/Modules/Fixcity/docs/wiki/concepts/ticket-citizen-rating-via-rating-module.md)
