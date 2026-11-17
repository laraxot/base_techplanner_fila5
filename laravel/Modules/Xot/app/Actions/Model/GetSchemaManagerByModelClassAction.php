<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Doctrine\DBAL\Schema\AbstractSchemaManager;
use Illuminate\Database\Eloquent\Model as EloquentModel;
<<<<<<< HEAD
=======
use RuntimeException;
>>>>>>> 6ed19256f (.)
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetSchemaManagerByModelClassAction
{
    use QueueableAction;

    /**
     * Ottiene lo schema manager Doctrine per una classe di modello Eloquent.
     *
<<<<<<< HEAD
     * @param string $modelClass La classe del modello
=======
     * @param  string  $modelClass  La classe del modello
>>>>>>> 6ed19256f (.)
     *
     * @return AbstractSchemaManager Lo schema manager di Doctrine
     */
    public function execute(string $modelClass): AbstractSchemaManager
    {
        Assert::isInstanceOf($model = app($modelClass), EloquentModel::class);
        $connection = $model->getConnection();

        // In Laravel 9+ il metodo getDoctrineSchemaManager è stato deprecato
        // ma getDoctrineConnection() non esiste, dobbiamo usare getDoctrineSchemaManager direttamente
        if (method_exists($connection, 'getDoctrineSchemaManager')) {
<<<<<<< HEAD
=======
            /** @phpstan-ignore deprecated.method */
>>>>>>> 6ed19256f (.)
            $schemaManager = $connection->getDoctrineSchemaManager();

            Assert::isInstanceOf($schemaManager, AbstractSchemaManager::class);

            return $schemaManager;
        }

        // Se in futuro il metodo getDoctrineConnection diventa disponibile, possiamo usare questo
<<<<<<< HEAD
        throw new \RuntimeException('Non è possibile ottenere lo schema manager Doctrine per questo modello.');
=======
        throw new RuntimeException('Non è possibile ottenere lo schema manager Doctrine per questo modello.');
>>>>>>> 6ed19256f (.)
    }
}
