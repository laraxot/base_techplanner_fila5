---
trigger: always_on
description: Regole per l'utilizzo di XotBaseRelationManager in Laraxot PTVX
globs: ["**/Filament/Resources/**/*RelationManager*.php"]
---

# Regole per RelationManagers in Laraxot PTVX

## Regole Fondamentali

1. **TUTTI i RelationManager devono estendere `Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager` e NON direttamente `Filament\Resources\RelationManagers\RelationManager`.**

2. **NON UTILIZZARE MAI i metodi `->label()`, `->placeholder()` e `->helperText()`**. Le traduzioni vengono gestite automaticamente dal LangServiceProvider.

3. **Il metodo `form()` è dichiarato come `final` in XotBaseRelationManager e NON può essere sovrascritto**. Implementare invece `getFormSchema()`.

4. **NON IMPLEMENTARE MAI il metodo `table(Table $table): Table`**. Usare invece i metodi `getTableColumns()`, `getTableHeaderActions()`, `getTableActions()` e `getTableBulkActions()`.

## Sintassi Corretta

```php
<?php

declare(strict_types=1);

namespace Modules\NomeModulo\Filament\Resources\NomeResource\RelationManagers;

use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class EsempioRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'nomeRelazione';
    protected static ?string $recordTitleAttribute = 'nome';

    // Implementazione...
}
```

## Sintassi NON Corretta

```php
<?php

// ❌ ERRATO: Non estendere direttamente RelationManager
use Filament\Resources\RelationManagers\RelationManager;

class EsempioRelationManager extends RelationManager
{
    // ...
}

// ❌ ERRATO: Non sovrascrivere il metodo form() che è final
public function form(Form $form): Form
{
    // ...
}

// ❌ ERRATO: Non usare i metodi ->label(), ->placeholder(), ->helperText()
TextInput::make('field_name')
    ->label('Nome campo')    // ERRATO!
    ->placeholder('Inserisci valore')  // ERRATO!
    ->helperText('Testo di aiuto')     // ERRATO!
```

## Metodi da Implementare

1. **getTableColumns()**:
   ```php
   /**
    * @return array<string, \Filament\Tables\Columns\Column>
    */
   public function getTableColumns(): array
   {
       return [
           TextColumn::make('name')
               ->searchable()
               ->sortable(),
           // Altre colonne...
       ];
   }
   ```

2. **getFormSchema()**:
   ```php
   /**
    * @return array<int, \Filament\Forms\Components\Component>
    */
   public function getFormSchema(): array
   {
       return [
           TextInput::make('field_name')
               ->required(),
           // Altri componenti...
       ];
   }
   ```

3. **getTableHeaderActions()**:
   ```php
   /**
    * @return array<string, \Filament\Tables\Actions\Action>
    */
   public function getTableHeaderActions(): array
   {
       return [
           'attach' => AttachAction::make()
               ->modalHeading(__('module::resource.actions.attach.modal.heading'))
               ->form(fn (AttachAction $action): array => [
                   $action->getRecordSelect(),
                   TextInput::make('pivot_field')
                       ->required(),
               ]),
           // Altre azioni...
       ];
   }
   ```

4. **getTableActions()**:
   ```php
   /**
    * @return array<string, \Filament\Tables\Actions\Action>
    */
   public function getTableActions(): array
   {
       return [
           'edit' => EditAction::make()
               ->modalHeading(__('module::resource.actions.edit.modal.heading')),
           'detach' => DetachAction::make()
               ->modalHeading(__('module::resource.actions.detach.modal.heading')),
           // Altre azioni...
       ];
   }
   ```

5. **getTableBulkActions()**:
   ```php
   /**
    * @return array<string, \Filament\Tables\Actions\BulkAction>
    */
   public function getTableBulkActions(): array
   {
       return [
           'detach' => DetachBulkAction::make()
               ->modalHeading(__('module::resource.actions.bulk_detach.modal.heading')),
           // Altre azioni...
       ];
   }
   ```

## Metodi da NON Sovrascrivere o Eliminare

1. **form(Form $form)**: Questo metodo è dichiarato come `final` in XotBaseRelationManager
2. **table(Table $table)**: Implementato in HasXotTable, usare i metodi getTable* invece
3. **NON ELIMINARE i metodi tableOLD()**: Questi metodi possono esistere per compatibilità e non dovrebbero essere eliminati

## Tipizzazione Modelli

Quando si usano callback che ricevono un record, tipizzare sempre con Model:

```php
->getStateUsing(function (Model $record, $livewire): bool { /* logica */ })
->after(function (Model $record, $livewire): void { /* logica */ })
```

## File di Traduzione

Ogni RelationManager deve avere un file di traduzione dedicato nel modulo:

```php
// Modules/User/lang/it/teams.php
return [
    'fields' => [
        'name' => [
            'label' => 'Nome Team',
            'help' => 'Nome identificativo del team',
            'placeholder' => 'Inserisci nome team',
        ],
        // Altri campi...
    ],
    'actions' => [
        'attach' => [
            'label' => 'Associa Team',
            'modal' => [
                'heading' => 'Associa Team all\'Utente',
            ],
            'success' => 'Team associato con successo',
            'error' => 'Si è verificato un errore',
        ],
        // Altre azioni...
    ],
];
```

## PHPStan

Per garantire la compatibilità con PHPStan livello 9:

1. Utilizzare `declare(strict_types=1);` in tutti i file
2. Annotare tutti gli array con il tipo generico corretto:
   ```php
   /** @return array<string, \Filament\Tables\Columns\Column> */
   /** @return array<string, \Filament\Tables\Actions\Action> */
   /** @return array<string, \Filament\Tables\Actions\BulkAction> */
   ```
3. Tipizzare sempre i parametri nelle closure con Model anziché mixed
4. Documentare completamente proprietà e metodi con PHPDoc

## Esempio Completo

```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\DetachBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class TeamsRelationManager extends XotBaseRelationManager
{
    protected static string $relationship = 'teams';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Definisce lo schema del form per l'editing e la creazione.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('role')
                ->required(),
        ];
    }

    /**
     * Definisce le colonne della tabella.
     *
     * @return array<string, \Filament\Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        return [
            'name'=>TextColumn::make('name')
                ->searchable()
                ->sortable(),
            'personal_team'=>IconColumn::make('personal_team')
                ->boolean()
                ->getStateUsing(function (Model $record, $livewire): bool {
                    /** @var \Modules\User\Models\User $user */
                    $user = $livewire->getOwnerRecord();
                    return $user->current_team_id === $record->getKey();
                }),
        ];
    }

    /**
     * Definisce le azioni dell'header della tabella.
     *
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableHeaderActions(): array
    {
        return [
            'attach' => AttachAction::make()
                ->modalHeading(__('user::teams.actions.attach.modal.heading'))
                ->form(fn (AttachAction $action): array => [
                    $action->getRecordSelect(),
                    TextInput::make('role')
                        ->default('member')
                        ->required(),
                ]),
        ];
    }

    /**
     * Definisce le azioni per ogni riga della tabella.
     *
     * @return array<string, \Filament\Tables\Actions\Action>
     */
    public function getTableActions(): array
    {
        return [
            'edit' => EditAction::make()
                ->modalHeading(__('user::teams.actions.edit.modal.heading')),
            'detach' => DetachAction::make()
                ->modalHeading(__('user::teams.actions.detach.modal.heading'))
                ->after(function (Model $record, $livewire): void {
                    /** @var \Modules\User\Models\User $user */
                    $user = $livewire->getOwnerRecord();
                    if ($user->current_team_id === $record->getKey()) {
                        $user->update(['current_team_id' => null]);
                    }
                }),
        ];
    }
}
```

## Documentazione

La documentazione completa su XotBaseRelationManager è disponibile in:
- `/laravel/Modules/Xot/docs/filament/relation_managers.md`
- `/laravel/Modules/Xot/docs/filament/xot_table.md`
- `/laravel/Modules/User/docs/filament/teams_relation_manager.md` (esempio pratico)
