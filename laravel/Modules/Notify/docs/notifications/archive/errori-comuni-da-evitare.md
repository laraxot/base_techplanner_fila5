---
<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
title: "Errori Comuni da Evitare nelle Implementazioni di Moduli SaluteOra"
=======
=======
<<<<<<< .merge_file_fYP1J6
title: "Errori Comuni da Evitare nelle Implementazioni di Moduli SaluteOra"
=======
<<<<<<< .merge_file_52hUMr
title: "Errori Comuni da Evitare nelle Implementazioni di Moduli SaluteOra"
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG
title: "Errori Comuni da Evitare nelle Implementazioni di Moduli <nome progetto>"
>>>>>>> .merge_file_iw0iyZ
type: concept
tags: [errori, comuni, evitare]
created: 2026-07-14
updated: 2026-07-14
<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
qmd: "errori-comuni-da-evitare errori comuni da evitare nelle implementazioni di moduli saluteora"
=======
=======
<<<<<<< .merge_file_fYP1J6
qmd: "errori-comuni-da-evitare errori comuni da evitare nelle implementazioni di moduli saluteora"
=======
<<<<<<< .merge_file_52hUMr
qmd: "errori-comuni-da-evitare errori comuni da evitare nelle implementazioni di moduli saluteora"
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG
qmd: "errori-comuni-da-evitare errori comuni da evitare nelle implementazioni di moduli <nome progetto>"
>>>>>>> .merge_file_iw0iyZ
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./multi-channel-notifications.md"
  - "./netfun-sms-implementation.md"
  - "./notifications-implementation-guide.md"
  - "./sms-implementation-details.md"
  - "./sms-provider-configuration.md"
  - "./telegram-notifications-guide.md"
---

<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
# Errori Comuni da Evitare nelle Implementazioni di Moduli SaluteOra
=======
=======
<<<<<<< .merge_file_fYP1J6
# Errori Comuni da Evitare nelle Implementazioni di Moduli SaluteOra
=======
<<<<<<< .merge_file_52hUMr
# Errori Comuni da Evitare nelle Implementazioni di Moduli SaluteOra
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG
# Errori Comuni da Evitare nelle Implementazioni di Moduli <nome progetto>
>>>>>>> .merge_file_iw0iyZ

## Errori di Struttura Directory e Namespace

1. **Errore di Case nelle Directory**
<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
=======
<<<<<<< .merge_file_fYP1J6
>>>>>>> .merge_file_203uSG
   - ❌ ERRATO: `/var/www/html/saluteora/laravel/Modules/Notify/App/Actions/`
   - ✅ CORRETTO: `/var/www/html/saluteora/laravel/Modules/Notify/app/Actions/`
   
=======
<<<<<<< .merge_file_KriKB7
=======
<<<<<<< .merge_file_52hUMr
   - ❌ ERRATO: `/var/www/html/saluteora/laravel/Modules/Notify/App/Actions/`
   - ✅ CORRETTO: `/var/www/html/saluteora/laravel/Modules/Notify/app/Actions/`
   
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG
   - ❌ ERRATO: `[project-root]/laravel/Modules/Notify/App/Actions/`
   - ✅ CORRETTO: `[project-root]/laravel/Modules/Notify/app/Actions/`

>>>>>>> .merge_file_iw0iyZ
   > Le directory standard di Laravel sono sempre in lowercase (`app`, `config`, `resources`, ecc.)

2. **Errore di Namespace nei File**
   - ❌ ERRATO: `namespace Modules\Notify\App\Actions;`
   - ✅ CORRETTO: `namespace Modules\Notify\Actions;`
<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
   
=======
=======
<<<<<<< .merge_file_fYP1J6
   
=======
<<<<<<< .merge_file_52hUMr
   
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG

>>>>>>> .merge_file_iw0iyZ
   > Il namespace dipende dalla configurazione PSR-4 nel composer.json del modulo

## Errori di Configurazione

1. **Duplicazione di Configurazioni Generiche**
   - ❌ ERRATO: Aggiungere retry, rate limit, timeout nella sezione specifica del provider
   - ✅ CORRETTO: Usare le sezioni generiche esistenti per questi comportamenti comuni

   ```php
   // ERRATO
   'drivers' => [
       'provider' => [
           'api_key' => env('PROVIDER_KEY'),
           'retry_attempts' => 3,  // ERRORE: Duplicazione
       ],
   ],
<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
   
=======
=======
<<<<<<< .merge_file_fYP1J6
   
=======
<<<<<<< .merge_file_52hUMr
   
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG

>>>>>>> .merge_file_iw0iyZ
   // CORRETTO
   'drivers' => [
       'provider' => [
           'api_key' => env('PROVIDER_KEY'),
       ],
   ],
   'retry' => [
       'attempts' => env('SMS_RETRY_ATTEMPTS', 3),
   ],
   ```

2. **Modifica di Moduli Riutilizzabili**
   - ❌ ERRATO: Modificare file di configurazione in moduli riutilizzabili
   - ✅ CORRETTO: Estendere la configurazione in file separati o fare richieste ai mantenitori

## Errori di Implementazione

1. **Mancata Separazione tra Configurazione e Logica**
   - ❌ ERRATO: Codificare valori di configurazione direttamente nell'implementazione
   - ✅ CORRETTO: Usare le configurazioni esistenti nelle implementazioni

   ```php
   // ERRATO
   public function execute() {
       $timeout = 30; // Hardcoded
   }
<<<<<<< .merge_file_KriKB7
<<<<<<< .merge_file_52hUMr
   
=======
=======
<<<<<<< .merge_file_fYP1J6
   
=======
<<<<<<< .merge_file_52hUMr
   
=======
>>>>>>> .merge_file_W7r1Tc
>>>>>>> .merge_file_203uSG

>>>>>>> .merge_file_iw0iyZ
   // CORRETTO
   public function execute() {
       $timeout = config('sms.timeout');
   }
   ```

2. **Utilizzo di Client HTTP Diversi**
   - ❌ ERRATO: Usare `Illuminate\Support\Facades\Http` quando il modulo usa `GuzzleHttp\Client`
   - ✅ CORRETTO: Seguire le convenzioni esistenti nel modulo per coerenza

## Best Practices per Evitare Errori

1. **Analisi Prima dell'Implementazione**
   - Esamina sempre la struttura esistente del modulo
   - Verifica il composer.json per il mapping PSR-4
   - Controlla le implementazioni esistenti per convenzioni di naming e pattern

2. **Separazione delle Responsabilità**
   - Configurazione: definizione di parametri
   - Implementazione: logica di business e utilizzo
   - Documentazione: spiegazione e guida d'uso

3. **Principio DRY (Don't Repeat Yourself)**
   - Non duplicare configurazioni generiche
   - Riutilizzare componenti e logiche esistenti
   - Centralizzare comportamenti comuni
