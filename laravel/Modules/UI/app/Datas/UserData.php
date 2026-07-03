<?php

declare(strict_types=1);

namespace Modules\UI\Datas;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $email,
        public ?string $avatar,
        public ?string $role,
        /** @var list<string> */
        public array $permissions,
        /** @var array<string, mixed> */
        public array $settings,
    ) {}
}
