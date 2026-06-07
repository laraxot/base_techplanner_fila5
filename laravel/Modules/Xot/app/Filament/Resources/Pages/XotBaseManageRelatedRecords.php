<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Resources\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Concerns\InteractsWithForms;
=======
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
>>>>>>> dev
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;
use Override;
=======
use Filament\Resources\Pages\ManageRelatedRecords as FilamentManageRelatedRecords;
use Modules\Xot\Filament\Traits\HasXotTable;
>>>>>>> 4b6b99016 (first commit)

/**
 * ---
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
    use HasXotTable;
<<<<<<< HEAD
    use InteractsWithForms;
    use NavigationLabelTrait;

    // protected static string $resource;
    protected static string $recordTitleAttribute = 'name';

    /**
     * Restituisce il gruppo di navigazione (override opzionale).
     */
=======
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Traits\HasXotForm;
use Modules\Xot\Filament\Traits\HasXotTable;
use Modules\Xot\Filament\Traits\NavigationLabelTrait;

/**
 * Base page for Filament related-record managers.
 */
abstract class XotBaseManageRelatedRecords extends FilamentManageRelatedRecords
{
    use HasXotForm;
    use HasXotTable;
    use NavigationLabelTrait;

    protected static string $recordTitleAttribute = 'name';

>>>>>>> dev
    public static function getNavigationGroup(): string
    {
        return '';
    }

<<<<<<< HEAD
    /**
     * Restituisce il titolo della pagina.
     */
=======
>>>>>>> dev
    public function getTitle(): string
    {
        return static::transFunc(__FUNCTION__).' - '.$this->getRecordTitle();
    }

    public function getRecordTitle(): string
    {
        $value = $this->record->{static::$recordTitleAttribute};

        return (string) $value;
    }

<<<<<<< HEAD
    /**
     * Restituisce lo schema del form per i record correlati.
     *
     * @return array<\Filament\Schemas\Components\Component>
     */
    // abstract public static function getFormSchema(): array;

    /**
     * Configura lo schema per i record correlati.
     */
    public function schema(Schema $schema): Schema
    {
        // getFormSchema() sempre ritorna array per definizione
        $formSchema = $this->getFormSchema();

        return $schema->components($formSchema);
    }

    /**
     * Restituisce lo schema del form per i record correlati.
     *
=======
    public function schema(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }

    /**
>>>>>>> dev
     * @return array<Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

<<<<<<< HEAD
    /**
     * Definisce le colonne della tabella per la visualizzazione dei record correlati.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, TextColumn>
     */
    #[Override]
    public function getTableColumns(): array
=======
    protected function getTableHeading(): Htmlable|string|null
    {
        return $this->getTableHeadingFromTrait();
    }

    private function getTableHeadingFromTrait(): ?string
    {
        $key = static::getKeyTrans('table.heading');
        $trans = trans($key);

        return is_string($trans) && $trans !== $key ? $trans : null;
    }

    /**
     * @return array<string, TextColumn>
     */
    #[\Override]
    protected function getTableColumns(): array
>>>>>>> dev
    {
        return [
            'id' => TextColumn::make('id')->label('ID')->sortable(),
            'name' => TextColumn::make('name')
                ->label('Nome')
                ->searchable()
                ->sortable(),
            'created_at' => TextColumn::make('created_at')
                ->label('Data Creazione')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ];
    }

    /**
<<<<<<< HEAD
     * Definisce le azioni dell'intestazione della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableHeaderActions(): array
=======
     * @return array<string, Action>
     */
    protected function getTableHeaderActions(): array
>>>>>>> dev
    {
        return [
            'create' => CreateAction::make()->label('Crea Nuovo')->disableCreateAnother(),
        ];
    }

    /**
<<<<<<< HEAD
     * Definisce le azioni per ogni riga della tabella.
     * Questo metodo può essere sovrascritto nelle classi figlie.
     *
     * @return array<string, Action>
     */
    public function getTableActions(): array
    {
        // Preferisci la risorsa correlata per i record nested; altrimenti usa la risorsa della pagina.
        $resource = static::$relatedResource ?? static::getResource();
        // Mostra "view" solo se la risorsa correlata espone quella pagina.
        $hasView = $resource::hasPage('view');

        return [
            'view' => Action::make('view')
                ->label('Visualizza')
                ->icon('heroicon-o-eye')
                ->visible(static fn (): bool => (bool) $hasView)
                ->url(function (Model $record) use ($resource): string {
                    // Prova il guessing degli URL nested di Filament (funziona con nesting multi-livello in richieste normali).
                    $url = $resource::getUrl('view', ['record' => $record], shouldGuessMissingParameters: true);
                    // Fallback per contesti senza dati di request (es. test Livewire).
                    if ($url === '') {
                        $url = $resource::getUrl('view', ['record' => $record], shouldGuessMissingParameters: false);
                    }

                    return is_string($url) ? $url : (string) $url;
                }),
            'edit' => Action::make('edit')
                ->label('Modifica')
                ->icon('heroicon-o-pencil')
                ->url(function (Model $record) use ($resource): string {
                    // Prova il guessing degli URL nested di Filament (funziona con nesting multi-livello in richieste normali).
                    $url = $resource::getUrl('edit', ['record' => $record], shouldGuessMissingParameters: true);
                    // Fallback per contesti senza dati di request (es. test Livewire).
                    if ($url === '') {
                        $url = $resource::getUrl('edit', ['record' => $record], shouldGuessMissingParameters: false);
                    }

                    return is_string($url) ? $url : (string) $url;
                }),
            // 'view' => Action::make('view')
            //     ->label('Visualizza')
            //     ->icon('heroicon-o-eye')
            //     ->url(fn (Model $record): string => static::getResource()::getUrl('view', ['record' => $record])),
        ];
    }
=======
>>>>>>> 4b6b99016 (first commit)
=======
     * @return array<string, Action>
     */
    protected function getTableActions(): array
    {
        return [];
    }

    public static function getNavigationLabel(): string
    {
        return static::transFunc(__FUNCTION__);
    }
>>>>>>> dev
}
