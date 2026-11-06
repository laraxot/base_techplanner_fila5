<?php

declare(strict_types=1);

namespace Modules\Notify\Contracts;

use Illuminate\Support\Collection;

/**
 * phpstan-require-extends Model.
 */
interface CanReceivePushNotifications
{
    /**
     * @return Collection<int, string>
     */
    public function getMobileDeviceTokens(): Collection;

    /**
<<<<<<< .merge_file_ggCD5s
     * Chiave primaria del modello notificabile (come Model::getKey()).
     */
    public function getKey(): mixed;
=======
     * Get the value of the model's primary key.
     * non si puo usare mixed che cs lo cancella.
<<<<<<< HEAD
     */
    public function getKey(): string|int|null;
=======
     *
     * @return string|int|null
     */
    public function getKey();
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_qzAvHK
}
