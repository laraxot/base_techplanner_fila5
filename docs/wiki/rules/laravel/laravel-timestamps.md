# Regola: Gestione dei Timestamps in Laravel

## Descrizione
In Laravel, i timestamps (created_at e updated_at) vengono gestiti automaticamente dai modelli quando:
1. La classe Model estende \Illuminate\Database\Eloquent\Model
2. La proprietà $timestamps è true (default)
3. Le colonne created_at e updated_at esistono nella tabella

## Regole da Seguire

1. **MAI specificare manualmente created_at/updated_at**
   ```php
   // ERRATO
   Model::create([
       'created_at' => now()  // Non fare mai questo!
   ]);
   ```

2. **Lasciare che Laravel gestisca i timestamps**
   ```php
   // CORRETTO
   Model::create([
       'name' => 'value'  // Laravel aggiungerà automaticamente created_at/updated_at
   ]);
   ```

3. **Se necessario disabilitare i timestamps**
   ```php
   class MyModel extends Model
   {
       public $timestamps = false;  // Solo se non vuoi i timestamps
   }
   ```

## Riconoscimento degli Errori

1. **Pattern di errore**
   - Qualsiasi chiamata a create() o update() che include created_at o updated_at
   - Qualsiasi override di $timestamps = false senza motivo valido

2. **Esempi di errori comuni**
   ```php
   // ERRATO
   User::create([
       'name' => 'John',
       'created_at' => now()  // Laravel gestirà già questo
   ]);
   ```

## Best Practices

1. **Assumere che i timestamps siano gestiti**
   - Non preoccuparti mai di created_at/updated_at
   - Laravel li gestirà automaticamente

2. **Se necessario, leggere i timestamps**
   ```php
   // CORRETTO
   $user = User::find(1);
   $createdAt = $user->created_at;  // Leggi ma non scrivere
   ```

## Verifica

Prima di ogni commit:
1. Verifica che non ci siano created_at/updated_at in create()
2. Verifica che non ci siano $timestamps = false senza motivo valido
3. Assicurati che i modelli abbiano le colonne necessarie nella migrazione
