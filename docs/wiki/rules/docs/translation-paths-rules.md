---
trigger: always_on
description: Regole per i percorsi dei file di traduzione in Laraxot PTVX
globs: ["**/lang/**/*.php"]
---

# Regole per i percorsi dei file di traduzione in Laraxot PTVX

## Percorsi standard

I file di traduzione devono essere posizionati **ESCLUSIVAMENTE** nei seguenti percorsi:

```
/Modules/<NomeModulo>/lang/<lingua>/<file>.php
```

### Esempi di percorsi corretti
- ✅ `/Modules/Lang/lang/it/lang_service.php`
- ✅ `/Modules/IndennitaCondizioniLavoro/lang/it/upload.php`

### Esempi di percorsi errati da evitare
- ❌ `/Modules/Lang/lang/lang/it/lang_service.php` (doppia cartella `lang`)
- ❌ `/Modules/Lang/resources/lang/it/lang_service.php` (percorso non standard)
- ❌ `/resources/lang/it/lang_service.php` (non dentro un modulo)

## Anti-pattern da evitare

1. **Duplicazione di file di traduzione**
   ```
   /Modules/Lang/lang/it/lang_service.php
   /Modules/Lang/lang/lang/it/lang_service.php  # Errato: duplicato con percorso errato
   ```
   Questo causa conflitti durante il caricamento delle traduzioni e può portare a errori di sintassi PHP difficili da tracciare.

2. **Uso simultaneo di sintassi differenti**
   ```php
   // File 1: Sintassi breve (corretta)
   return [
       'key' => 'value',
   ];

   // File 2: Sintassi vecchia (sconsigliata)
   return array(
       'key' => 'value',
   );
   ```
   Utilizzare sempre e solo la sintassi breve degli array `[]`.

3. **Percorsi multipli per le stesse traduzioni**
   ```
   /Modules/Lang/lang/it/
   /Modules/Lang/resources/lang/it/  # Duplicazione da evitare
   ```

## Procedure per correggere i percorsi errati

1. **Identificare file in posizioni errate**:
   ```bash
   find /var/www/html/ptvx/laravel/Modules -path "*/lang/lang/*" -type f
   ```

2. **Spostare i file nella posizione corretta**:
   ```bash
   mv /var/www/html/ptvx/laravel/Modules/Lang/lang/lang/it/file.php /var/www/html/ptvx/laravel/Modules/Lang/lang/it/file.php
   ```

3. **Pulire la cache dopo la correzione**:
   ```bash
   cd /var/www/html/ptvx/laravel && php artisan cache:clear && php artisan config:clear && php artisan view:clear
   ```

4. **Utilizzare lo script di verifica**:
   ```bash
   /var/www/html/ptvx/bashscripts/check_duplicate_translations.sh
   ```

## Regole di manutenzione

- Aggiornare le traduzioni quando si modificano funzionalità
- Verificare periodicamente l'assenza di duplicati
- Mantenere la documentazione aggiornata
- Seguire sempre la struttura standard dei file di traduzione

## Esempi di errori comuni e correzioni

### Errore: percorso duplicato con doppia cartella `lang`
```
Modules/Lang/lang/lang/it/lang_service.php
```

**Correzione**:
```bash
mv Modules/Lang/lang/lang/it/lang_service.php Modules/Lang/lang/it/lang_service.php
```

### Errore: sintassi errata con parentesi mancanti
```php
'bet_action' =>
array (
  'label' => 'bet_action',
'GeneratePDFProjectReportAction' =>
```

**Correzione**:
```php
'bet_action' =>
array (
  'label' => 'bet_action',
),  // Aggiunta parentesi chiusa e virgola
'GeneratePDFProjectReportAction' =>
```

