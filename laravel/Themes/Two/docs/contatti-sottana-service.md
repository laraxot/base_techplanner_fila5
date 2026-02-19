# Dati Contatto e Brand - Sottana Service

## Dati Aziendali Corretti

### Contatti
| Tipo | Valore |
|------|--------|
| Email | studio@sottana.com |
| Telefono Fisso | +39 041 455552 |
| Telefono Mobile | +39 347 58 96 127 |
| Indirizzo | via Vanzo 86/A, 31021 Mogliano Veneto TV |
| P.IVA | 05532540266 |
|REA | TV - 451911 |

### Coordinate Geografiche
- **Latitudine**: 45.5786
- **Longitudine**: 12.2364

### Brand
| Campo | Valore |
|-------|--------|
| Nome | Sottana Service |
| Logo | Elefante stilizzato SVG (nel header) |

### Mappa
- **Provider**: OpenStreetMap (GRATUITO)
- **Implementazione**: iframe embed + link diretto
- **Regola**: MAI usare Google Maps API (a pagamento)

## File Modificati

### 1. Lang Files
- `Themes/Two/lang/it/header.php` - brand name
- `Themes/Two/lang/en/header.php` - brand name

### 2. Blade Components
- `Themes/Two/resources/views/components/sections/header.blade.php` - fix @include
- `Themes/Two/resources/views/components/sections/footer/v1.blade.php`:
  - Email: studio@sottana.com
  - Telefono fisso: +39 041 455552
  - Telefono mobile: +39 347 58 96 127
  - Supporto tipo "phone_mobile" e "mobile"
  - Mappa Google Maps embed

### 3. JSON Config
- `config/local/techplanner/database/content/sections/footer.json`:
  - Dati contatto aggiornati
  - Sezione map aggiunta
- `config/local/techplanner/database/content/sections/header.json`:
  - Brand: Sottana Service

## Note Tecniche

### Formato Telefoni
- Visualizzazione: +39 041 455552
- Link tel: +39041455552 (senza spazi)

### Tipi Contatto nel JSON
- `type: "phone"` - telefono fisso
- `type: "phone_mobile"` o `"mobile"` - cellulare

### Mappa
- Utilizza iframe embed Google Maps
- Link diretto per navigazione completa
- Coordinate: Via Vanzo 86/A, Mogliano Veneto

## Prossimi Passi
- [ ] Verificare visualizzazione mappa nel frontend
- [ ] Testare link telefonici
- [ ] Integrare modulo Geo per mappa dinamica
