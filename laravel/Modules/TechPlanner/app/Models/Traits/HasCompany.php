<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Modules\TechPlanner\Enums\CompanyItemEnum;
=======
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Collection;
use Modules\TechPlanner\Enums\CompanyItemEnum;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
>>>>>>> 4b6b99016 (first commit)
=======
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Modules\TechPlanner\Enums\CompanyItemEnum;
>>>>>>> dev

/**
 * Trait HasContact.
 *
 * Fornisce funzionalità per la gestione degli indirizzi nei modelli Eloquent.
 * Questo trait implementa la relazione polimorfica con il modello Address
 * e offre metodi di utilità per la gestione degli indirizzi.
 *
 * @property Collection<int, Address> $addresses
 */
trait HasCompany
{
<<<<<<< HEAD
<<<<<<< HEAD
    /**
=======

     /**
>>>>>>> 4b6b99016 (first commit)
=======
    /**
>>>>>>> dev
     * Initialize the trait
     *
     * @return void
     */
    protected function initializeHasCompany()
    {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
        $fields = Arr::map(CompanyItemEnum::cases(), fn ($item) => $item->value);
        $this->mergeFillable($fields);
    }
}
<<<<<<< HEAD
=======
        $fields=Arr::map(CompanyItemEnum::cases(), fn ($item) => $item->value);
        $this->mergeFillable($fields);
    }
}
>>>>>>> 4b6b99016 (first commit)
=======
>>>>>>> dev
