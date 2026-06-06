<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
<<<<<<< HEAD
* @property string $id
 * @property string $client_id
 * @property OauthClient|null $client
 */
class OauthPersonalAccessClient extends BaseModel
{
protected $table = 'oauth_personal_access_clients';
    protected $connection = 'user';
=======
 * @property string           $id
 * @property string           $client_id * @property OauthClient|null $client
 */
class OauthPersonalAccessClient extends BaseModel
{
    /** @var string */
    protected $table = 'oauth_personal_access_clients';

    /** @var string */    protected $connection = 'user';
>>>>>>> 8215f950 (.)

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
