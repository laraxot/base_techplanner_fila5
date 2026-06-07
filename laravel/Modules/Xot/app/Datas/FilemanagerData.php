<?php

declare(strict_types=1);

namespace Modules\Xot\Datas;

use Spatie\LaravelData\Data;

/**
 * Class FilemanagerData - Gestisce la configurazione del file manager per il framework Laraxot.
 * Utilizzato esclusivamente nell'ambito dell'architettura Filament-first.
 *
 * @phpstan-consistent-constructor
 */
final class FilemanagerData extends Data
{
    /**
     * @param string $disk         Disco di storage predefinito
     * @param array  $disks        Dischi di storage disponibili
     * @param array  $allowedExt  Estensioni file consentite
     * @param int    $maxSize     Dimensione massima file in MB
     * @param string $routePrefix Prefisso per le rotte del file manager
     * @param bool   $enableCrop  Abilita il crop delle immagini
     */
    public function __construct(
        public readonly string $disk = 'public',
        public readonly array $disks = ['public'],
        public readonly array $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip'],
        public readonly int $maxSize = 10,
        public readonly string $routePrefix = 'filemanager',
        public readonly bool $enableCrop = true,
    ) {
    }

    /**
     * Create a new instance of FilemanagerData with default values.
     */
    public static function make(): self
    {
        return new self();
    }
}
