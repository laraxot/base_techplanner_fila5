<?php

declare(strict_types=1);

namespace Modules\Job\Models;

use Modules\Xot\Contracts\ProfileContract;
use Modules\Xot\Models\XotBaseModel;

/**
 * Class BaseModel.
 *
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 */
abstract class BaseModel extends XotBaseModel
{
    /** @var string|null */
    protected $prefix;

    public function __construct(array $attributes = [])
    {
        if (isset($this->prefix)) {
            $this->table = $this->prefix.$this->table;
        }

        parent::__construct($attributes);
    }

    public $incrementing = true;

    public $timestamps = true;

    protected $connection = 'job';

    /** @var list<string> */
    protected $fillable = ['id'];

    protected $primaryKey = 'id';

    /**
     * Le tabelle del modulo hanno tutte `id integer primary key autoincrement`, e questa
     * classe dichiara `$incrementing = true`: il tipo della chiave è intero.
     *
     * Dichiararlo `string` era in contraddizione con l'autoincrement e si vedeva in
     * `Model::is()`, che confronta le chiavi con `===`: un model appena creato e lo
     * stesso model riletto dal database risultavano diversi, e
     * `$task->frequencies->contains($frequency)` rispondeva false su una collection che
     * conteneva davvero quella riga.
     *
     * `JobBatch` resta con chiave stringa: sovrascrive entrambe le proprietà, perché i
     * suoi id sono UUID e non sono autoincrementanti.
     *
     * @var string
     */
    protected $keyType = 'int';

    /** @var list<string> */
    protected $hidden = [];

    protected function casts(): array
    {
        return array_merge(parent::casts(), [
            'published_at' => 'datetime',
        ]);
    }
}
