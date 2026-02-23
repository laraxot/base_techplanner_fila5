# Fix: Activity TestCase - Database Connection

**Regola**: database.php NON contiene 'activity'. TenantServiceProvider la crea a runtime. I modelli DEVONO avere `$connection = 'activity'`.

## Comportamento Corretto

- Activity, StoredEvent, Snapshot usano `$connection = 'activity'`
- TestCase: `$connectionsToTransact = ['mysql', 'activity', 'user']`
- Nessuna entry 'activity' in database.php (TenantServiceProvider la aggiunge)
- **NO delete in setUp**: DatabaseTransactions fornisce isolamento; un delete manuale verrebbe annullato dal rollback

## Test con Conteggi - Pattern Resiliente

Per evitare fallimenti per accumulo dati tra test, usare `whereIn('id', $createdIds)` invece di query generiche:

```php
// Resiliente: filtra per ID creati nel test
$ourActivities = $userActivities->whereIn('id', [$createdActivity->id]);
expect($ourActivities)->toHaveCount(1);

// Evitare: fallisce se ci sono dati residui
expect($userActivities)->toHaveCount(1);
```

## Collegamenti

- [database-connections](database-connections.md)
- [basemodel-connection-why-activity-not-null](basemodel-connection-why-activity-not-null.md)
- [fix01](prompts/fix01.txt)
