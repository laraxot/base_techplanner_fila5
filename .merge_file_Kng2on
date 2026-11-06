<?php

declare(strict_types=1);

namespace Modules\Notify\Models\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Modules\Notify\Enums\ContactTypeEnum;

/**
 * Trait HasContact.
 *
 * Fornisce funzionalità per la gestione degli indirizzi nei modelli Eloquent.
 * Questo trait implementa la relazione polimorfica con il modello Address
 * e offre metodi di utilità per la gestione degli indirizzi.
 *
 * @property Collection<int, Address> $addresses
 */
trait HasContact
{
    /**
     * Initialize the trait
<<<<<<< HEAD
     */
    protected function initializeHasContact(): void
=======
     *
     * @return void
     */
    protected function initializeHasContact()
>>>>>>> 6ed19256f (.)
    {
        // Automatically create a random token
        $fields = Arr::map(ContactTypeEnum::cases(), fn ($item) => $item->value);
        $this->mergeFillable($fields);
    }
}
