<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use ValueError;
=======
>>>>>>> dev

class GetSicureArrayByModelAction
{
    use QueueableAction;

    /**
     * @return array<string, mixed>
     */
    public function execute(Model $model): array
    {
        try {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> dev
            /** @var array<string, mixed> $res */
            $res = $model->attributesToArray(); // "" is not a valid backing value for enum Modules\<main module>\Enums\OccurrenceFrequencyEnum

            return $res;
<<<<<<< HEAD
=======
            return $model->attributesToArray(); // "" is not a valid backing value for enum Modules\<main module>\Enums\OccurrenceFrequencyEnum
>>>>>>> 4b6b99016 (first commit)
        } catch (ValueError $e) {
=======
        } catch (\ValueError $e) {
>>>>>>> dev
            $data = [];
            foreach ($model->getAttributes() as $key => $value) {
                try {
                    $data[$key] = $this->$key;

<<<<<<< HEAD
                    /** @phpstan-ignore-next-line */
                } catch (ValueError $e) {
=======
                    /* @phpstan-ignore-next-line */
                } catch (\ValueError $e) {
>>>>>>> dev
                }
            }

            return $data;
        }
    }
}
