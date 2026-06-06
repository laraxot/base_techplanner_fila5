<?php

declare(strict_types=1);

namespace Modules\User\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Models\OauthClient as Client;
<<<<<<< HEAD
use Modules\User\Models\User;

/**
 * @property User|null $owner
 *
=======

/**
 * @property \Modules\User\Models\User|null $owner *
>>>>>>> 8215f950 (.)
 * @mixin Client
 */
final class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    #[\Override]
    public function toArray(Request $request): array
    {
        /** @var Client $client */
        $client = $this->resource;

        return [
            'id' => $client->id,
            'name' => $client->name,
            'owner' => $this->when(
<<<<<<< HEAD
$client->owner !== null,
                fn (): OwnerResource => new OwnerResource($client->owner)
=======
                null !== $client->owner,                fn (): OwnerResource => new OwnerResource($client->owner)
>>>>>>> 8215f950 (.)
            ),
        ];
    }
}
