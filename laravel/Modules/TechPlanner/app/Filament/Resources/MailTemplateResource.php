<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

<<<<<<< HEAD
use Filament\Resources\Pages\PageRegistration;
use Illuminate\Database\Eloquent\Builder;
use Modules\Notify\Filament\Resources\MailTemplateResource as NotifyBaseMailTemplateResource;
use Modules\Notify\Models\MailTemplate;
use Modules\Progressioni\Providers\Filament\AdminPanelProvider;
use Override;
=======
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\PageRegistration;
use Filament\Schemas\Components\Section;
use Modules\Sigma\Models\Integparam;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;
use Modules\Notify\Filament\Resources\MailTemplateResource as NotifyBaseMailTemplateResource;
use Modules\Notify\Models\MailTemplate;
use Illuminate\Database\Eloquent\Builder;
>>>>>>> 6ed19256f (.)

/**
 * Resource per la gestione template email specifici del modulo Progressioni.
 *
 * Estende la resource base di Notify mantenendo stessa struttura ma
 * con filtro scope per mostrare solo template rilevanti per Progressioni.
 *
 * ⚠️ IMPORTANTE: Richiede SpatieTranslatablePlugin registrato nel panel!
 *
<<<<<<< HEAD
 * @see AdminPanelProvider
=======
 * @see \Modules\Progressioni\Providers\Filament\AdminPanelProvider
>>>>>>> 6ed19256f (.)
 */
class MailTemplateResource extends NotifyBaseMailTemplateResource
{
    /**
     * @return array<string, PageRegistration>
     */
    #[Override]
    public static function getPages(): array
    {
        return [
            ...parent::getPages(),
<<<<<<< HEAD
            // 'index' => \Modules\Progressioni\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates::route('/'),
=======
            //'index' => \Modules\Progressioni\Filament\Resources\MailTemplateResource\Pages\ListMailTemplates::route('/'),
>>>>>>> 6ed19256f (.)
        ];
    }

    /**
     * Filtra solo template email per modulo Progressioni.
     *
     * Mostra template il cui mailable contiene "Progressioni" o
     * il cui slug inizia con "progressioni-".
     *
     * @return Builder<MailTemplate>
     */
    #[Override]
    public static function getEloquentQuery(): Builder
    {
<<<<<<< HEAD
        return MailTemplate::query()
            ->where(function (Builder $query): void {
                // $query->where('slug', 'like', 'techplanner-%');
=======
        return parent::getEloquentQuery()
            ->where(function (Builder $query): void {
                //$query->where('slug', 'like', 'techplanner-%');
>>>>>>> 6ed19256f (.)
                $query->where('slug', 'like', '%');
            });
    }
}
