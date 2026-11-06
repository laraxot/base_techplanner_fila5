<?php

declare(strict_types=1);

namespace Modules\TechPlanner\Filament\Resources;

<<<<<<< .merge_file_oj3UgD
use Modules\TechPlanner\Filament\Resources\ClientResource\Schemas\ClientForm;
use Modules\TechPlanner\Filament\Resources\ClientResource\Schemas\ClientInfolist;
=======
<<<<<<< HEAD
=======
use Override;
>>>>>>> 6ed19256f (.)
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Modules\Geo\Filament\Forms\Components\AddressSection;
use Modules\Notify\Filament\Forms\Components\ContactSection;
use Modules\TechPlanner\Filament\Forms\Components\CompanySection;
>>>>>>> .merge_file_AZmZ9F
use Modules\TechPlanner\Models\Client;
use Modules\Xot\Filament\Resources\XotBaseResource;
<<<<<<< HEAD
use Override;
=======
>>>>>>> 6ed19256f (.)

/**
 * @property ClientResource $resource
 */
class ClientResource extends XotBaseResource
{
    protected static ?string $model = Client::class;


}
