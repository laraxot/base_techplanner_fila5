# XotBaseMigration: Best Practices

## Introduzione

Questo documento illustra le best practices per l'utilizzo di `XotBaseMigration` , con particolare focus su come gestire correttamente le verifiche di colonne e tabelle durante le migrazioni.

## Errori comuni

### 1. Utilizzo diretto di Schema::hasColumn()

**NON UTILIZZARE MAI** il metodo `Schema::hasColumn()` direttamente nelle migrazioni che estendono `XotBaseMigration`:

```php
// ERRATO: Non utilizzare mai
if (\Illuminate\Support\Facades\Schema::hasColumn('mail_templates', 'subject_json')) {
    // ...
}
```

### 2. Utilizzo di prefissi tabelle hardcoded

**NON UTILIZZARE MAI** i nomi delle tabelle hardcoded:

```php
// ERRATO: Non utilizzare mai
DB::table('mail_templates')->where(...);
```

## Approccio corretto

### 1. Verificare l'esistenza delle colonne

Utilizzare sempre i metodi forniti da `XotBaseMigration`:

```php
// CORRETTO
if ($this->hasColumn('column_name')) {
    // ...
}
```

### 2. Verificare il tipo di colonna

```php
// CORRETTO
if (!$this->isColumnType('subject', 'json')) {
    // ...
}
```

### 3. Pattern sicuro per la conversione JSON

```php
// CORRETTO
if ($this->hasColumn('subject') && !$this->isColumnType('subject', 'json')) {
    // 1. Crea colonna temporanea
    if (!$this->hasColumn('subject_json')) {
        $table->json('subject_json')->nullable()->after('subject');
    }
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
    // 2. Migra i dati solo se la colonna temporanea esiste
    if ($this->hasColumn('subject_json')) {
        DB::table('mail_templates')->chunkById(100, function ($records) {
            foreach ($records as $record) {
                if (!empty($record->subject)) {
                    DB::table('mail_templates')
                        ->where('id', $record->id)
                        ->update([
                            'subject_json' => json_encode(['it' => $record->subject])
                        ]);
                }
            }
        });
    }
<<<<<<< HEAD
    
=======

>>>>>>> 4b6b99016 (first commit)
    // 3. Rimuovi e rinomina
    $table->dropColumn('subject');
    $table->renameColumn('subject_json', 'subject');
}
```

## Perché non usare Schema::hasColumn()?

`XotBaseMigration` gestisce:

1. **Connessioni multiple**: Utilizzando `getConn()` per determinare la connessione corretta
2. **Prefissi tabelle**: Aggiungendo automaticamente i prefissi alle tabelle
3. **Multi-tenant**: Gestendo le tabelle su schemi/database multipli
4. **Transaction safety**: Con il corretto rollback e commit delle transazioni

Quando si utilizza `Schema::hasColumn()` direttamente, si bypassa tutta questa logica, portando a errori come:

- Operazioni sulla tabella o connessione errata
- Ignorare i prefissi tabelle configurati
- Problemi con le transazioni durante le migrazioni

## Come evitare errori

<<<<<<< HEAD
1. **Verifica esistenza colonna**: 
=======
1. **Verifica esistenza colonna**:
>>>>>>> 4b6b99016 (first commit)
   ```php
   $this->hasColumn('column_name')
   ```

<<<<<<< HEAD
2. **Verifica tipo colonna**: 
=======
2. **Verifica tipo colonna**:
>>>>>>> 4b6b99016 (first commit)
   ```php
   $this->isColumnType('column_name', 'expected_type')
   ```

<<<<<<< HEAD
3. **Ottieni tipo colonna**: 
=======
3. **Ottieni tipo colonna**:
>>>>>>> 4b6b99016 (first commit)
   ```php
   $this->getColumnType('column_name')
   ```

## Riferimenti

<<<<<<< HEAD
- [Xot Module Documentation](/var/www/html/saluteora/laravel/modules/xot/docs/migrations.md)
- [JSON Migration Best Practices](/var/www/html/saluteora/laravel/modules/notify/docs/mail-templates/json_migration_fixes.md)
=======
- [Xot Module Documentation](Modules/Xot/docs/MIGRATIONS.md)
- [JSON Migration Best Practices](Modules/Notify/docs/mail-templates/JSON_MIGRATION_FIXES.md)
- [Xot Module Documentation](Modules/Xot/docs/MIGRATIONS.md)
- [JSON Migration Best Practices](Modules/Notify/docs/mail-templates/JSON_MIGRATION_FIXES.md)
- [Xot Module Documentation](Modules/Xot/docs/MIGRATIONS.md)
- [JSON Migration Best Practices](Modules/Notify/docs/mail-templates/JSON_MIGRATION_FIXES.md)
# XotBaseMigration: Best Practices

## Introduzione

Questo documento illustra le best practices per l'utilizzo di `XotBaseMigration` , con particolare focus su come gestire correttamente le verifiche di colonne e tabelle durante le migrazioni.

## Errori comuni

### 1. Utilizzo diretto di Schema::hasColumn()

**NON UTILIZZARE MAI** il metodo `Schema::hasColumn()` direttamente nelle migrazioni che estendono `XotBaseMigration`:

```php
// ERRATO: Non utilizzare mai
if (\Illuminate\Support\Facades\Schema::hasColumn('mail_templates', 'subject_json')) {
    // ...
}
```

### 2. Utilizzo di prefissi tabelle hardcoded

**NON UTILIZZARE MAI** i nomi delle tabelle hardcoded:

```php
// ERRATO: Non utilizzare mai
DB::table('mail_templates')->where(...);
```

## Approccio corretto

### 1. Verificare l'esistenza delle colonne

Utilizzare sempre i metodi forniti da `XotBaseMigration`:

```php
// CORRETTO
if ($this->hasColumn('column_name')) {
    // ...
}
```

### 2. Verificare il tipo di colonna

```php
// CORRETTO
if (!$this->isColumnType('subject', 'json')) {
    // ...
}
```

### 3. Pattern sicuro per la conversione JSON

```php
// CORRETTO
if ($this->hasColumn('subject') && !$this->isColumnType('subject', 'json')) {
    // 1. Crea colonna temporanea
    if (!$this->hasColumn('subject_json')) {
        $table->json('subject_json')->nullable()->after('subject');
    }

    // 2. Migra i dati solo se la colonna temporanea esiste
    if ($this->hasColumn('subject_json')) {
        DB::table('mail_templates')->chunkById(100, function ($records) {
            foreach ($records as $record) {
                if (!empty($record->subject)) {
                    DB::table('mail_templates')
                        ->where('id', $record->id)
                        ->update([
                            'subject_json' => json_encode(['it' => $record->subject])
                        ]);
                }
            }
        });
    }

    // 3. Rimuovi e rinomina
    $table->dropColumn('subject');
    $table->renameColumn('subject_json', 'subject');
}
```

## Perché non usare Schema::hasColumn()?

`XotBaseMigration` gestisce:

1. **Connessioni multiple**: Utilizzando `getConn()` per determinare la connessione corretta
2. **Prefissi tabelle**: Aggiungendo automaticamente i prefissi alle tabelle
3. **Multi-tenant**: Gestendo le tabelle su schemi/database multipli
4. **Transaction safety**: Con il corretto rollback e commit delle transazioni

Quando si utilizza `Schema::hasColumn()` direttamente, si bypassa tutta questa logica, portando a errori come:

- Operazioni sulla tabella o connessione errata
- Ignorare i prefissi tabelle configurati
- Problemi con le transazioni durante le migrazioni

## Come evitare errori

1. **Verifica esistenza colonna**:
   ```php
   $this->hasColumn('column_name')
   ```

2. **Verifica tipo colonna**:
   ```php
   $this->isColumnType('column_name', 'expected_type')
   ```

3. **Ottieni tipo colonna**:
   ```php
   $this->getColumnType('column_name')
   ```

## Riferimenti

- [Xot Module Documentation](Modules/Xot/docs/MIGRATIONS.md)
- [JSON Migration Best Practices](Modules/Notify/docs/mail-templates/JSON_MIGRATION_FIXES.md)
>>>>>>> 4b6b99016 (first commit)
