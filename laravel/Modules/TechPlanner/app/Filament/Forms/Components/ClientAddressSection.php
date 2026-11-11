<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Modules\Geo\Enums\AddressItemEnum;
use Modules\Geo\Filament\Forms\Components\AddressSection;
use Modules\Notify\Enums\ContactTypeEnum;
use Override;

/**
 * Indirizzo del cliente senza i recapiti (TPL-08).
 *
 * AddressItemEnum include anche telefono, cellulare, fax, e-mail, PEC, WhatsApp e note: nel modulo
 * cliente comparivano due volte, qui e nella sezione Contatti, con due campi per la stessa colonna
 * (vinceva l'ultimo compilato). Qui restano solo i campi dell'indirizzo.
 */
class ClientAddressSection extends AddressSection
{
    /**
     * @return array<int|string, TextInput>
     */
    #[Override]
    public function getFormSchema(): array
    {
        $duplicated = [
            ...array_map(static fn (ContactTypeEnum $type): string => (string) $type->value, ContactTypeEnum::cases()),
            AddressItemEnum::NOTES->value,
        ];

        return array_diff_key(parent::getFormSchema(), array_flip($duplicated));
    }
}
