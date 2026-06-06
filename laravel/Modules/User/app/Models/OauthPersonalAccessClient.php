<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
<<<<<<< HEAD
 * @property string           $id
 * @property string           $client_id
=======
 * @property string $id
 * @property string $client_id
>>>>>>> origin/dev
 * @property OauthClient|null $client
 */
class OauthPersonalAccessClient extends BaseModel
{
<<<<<<< HEAD
    /** @var string */
    protected $table = 'oauth_personal_access_clients';

    /** @var string */
=======
    protected $table = 'oauth_personal_access_clients';

>>>>>>> origin/dev
    protected $connection = 'user';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'client_id',
    ];

    /**
     * @return BelongsTo<OauthClient, $this>
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(OauthClient::class, 'client_id');
    }
}
