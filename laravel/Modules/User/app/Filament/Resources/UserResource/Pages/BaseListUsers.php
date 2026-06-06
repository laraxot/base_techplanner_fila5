<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
     * @return array<string, Action|ActionGroup>
     */
    #[\Override]
    public function getTableActions(): array
    {
        $actions = [
            'change_password' => ChangePasswordAction::make()->tooltip('Cambio Password')->iconButton(),
        ];

        // Add parent actions - merge arrays
        $parentActions = parent::getTableActions();

        return array_merge($actions, $parentActions);

        /*
         * // Add deactivate action
         * $actions['deactivate'] = Action::make('deactivate')
         * ->tooltip(__('filament-actions::delete.single.label'))
         * ->color('danger')
         * ->icon('heroicon-o-trash')
         * ->action(static fn (UserContract $user) => $user->delete());
         */
/* @phpstan-ignore-next-line */
    }

    /**
     * Get the header actions.
     *
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'export_xls' => ExportXlsAction::make('export_xls'),
        ];
    }

    /**
     * Get header widgets for the user list page.
     *
     * @return array<class-string>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            // UserOverview::class
        ];
    }
}
