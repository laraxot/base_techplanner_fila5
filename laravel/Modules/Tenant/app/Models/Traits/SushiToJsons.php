<?php

declare(strict_types=1);
/**
 * @see https://dev.to/hasanmn/automatically-update-createdby-and-updatedby-in-laravel-using-bootable-traits-28g9.
 */

namespace Modules\Tenant\Models\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
<<<<<<< .merge_file_yt3Rm3
use Illuminate\Support\Str;
use Modules\Tenant\Actions\Config\GetTenantFilePathAction;
use ReflectionObject;
=======
use InvalidArgumentException;
use Modules\Tenant\Services\TenantService;
<<<<<<< HEAD
>>>>>>> .merge_file_SPKzNU
use Sushi\Sushi;
use Symfony\Component\Finder\SplFileInfo;
use Webmozart\Assert\Assert;

use function Safe\json_encode;
use function Safe\unlink;
=======
use function Safe\json_encode;
use function Safe\unlink;
use Sushi\Sushi;
>>>>>>> 6ed19256f (.)

trait SushiToJsons
{
    use Sushi;
    use SushiConnectionByName;

    /**
     * @return array<int, array<string, mixed>>
     *
     * @phpstan-return array<int, array<string, mixed>>
     */
    public function getRows(): array
    {
<<<<<<< .merge_file_yt3Rm3
        return $this->getSushiRows();
    }
=======
        $tbl = $this->getTable();
        $path = TenantService::filePath('database/content/'.$tbl);
<<<<<<< HEAD

=======
        
>>>>>>> 6ed19256f (.)
        $files = File::glob($path.'/*.json');

        /** @var array<int, array<string, mixed>> $rows */
        $rows = [];

        foreach ($files as $id => $file) {
            if (! is_string($file)) {
                continue;
            }

            $json = File::json($file);

            /** @var array<string, mixed> $item */
            $item = [];

            // Ensure schema is an array
<<<<<<< HEAD
            $schema = $this->resolveSchema();
=======
            $schema = $this->schema ?? [];
>>>>>>> 6ed19256f (.)

            /** @var array<string, mixed> $schema */
            foreach ($schema as $name => $type) {
                $value = $json[$name] ?? null;
                if (is_array($value)) {
                    $value = json_encode($value, JSON_PRETTY_PRINT);
                }
                $item[$name] = $value;
            }
            $rows[] = $item;
        }
>>>>>>> .merge_file_SPKzNU

    /**
     * @return array<int, array<string, mixed>>
     *
     * @phpstan-return array<int, array<string, mixed>>
     */
    public function getSushiRows(): array
    {
        return $this->collectRowsFromJsonFiles($this->getTable());
    }

    public function getJsonFile(): string
    {
        $tbl = $this->getTable();
        $id = $this->getKey();

        $stringId = is_string($id) || is_numeric($id) ? (string) $id : 'unknown';
        $stringTbl = is_string($tbl) ? $tbl : 'unknown';

        return app(GetTenantFilePathAction::class)->execute('database/content/'.$stringTbl.'/'.$stringId.'.json');
    }

    protected static function bootSushiToJsons(): void
    {
        static::creating(static function (Model $model): void {
            Assert::isInstanceOf($model, static::class);
            self::handleJsonCreating($model);
        });

        static::updating(static function (Model $model): void {
            Assert::isInstanceOf($model, static::class);
            self::handleJsonUpdating($model);
        });

        static::deleting(static function (Model $model): void {
            Assert::isInstanceOf($model, static::class);
            self::handleJsonDeleting($model);
        });
    }

<<<<<<< .merge_file_yt3Rm3
    /**
     * @return array<string, mixed>
     *
     * @phpstan-return array<string, mixed>
     */
    protected function resolveSchema(): array
=======
<<<<<<< HEAD
    public function getConnectionName(): ?string
=======
    /**
     * @return ?string
     */
    public function getConnectionName()
>>>>>>> 6ed19256f (.)
>>>>>>> .merge_file_SPKzNU
    {
        $reflection = new ReflectionObject($this);
        if (! $reflection->hasProperty('schema')) {
            return [];
        }

        $property = $reflection->getProperty('schema');
        $property->setAccessible(true);
        $schemaValue = $property->getValue($this);

        if (! is_array($schemaValue)) {
            return [];
        }

        /** @var array<string, mixed> $schemaValue */
        return $schemaValue;
    }

    /**
     * Legge ogni `database/content/<tabella>/**.json` come una riga.
     *
     * @return array<int, array<string, mixed>>
     */
    private function collectRowsFromJsonFiles(string $tbl): array
    {
        $rows = [];
        $relativePath = 'database/content/'.$tbl;
        $path = app(GetTenantFilePathAction::class)->execute($relativePath);
        if (! File::isDirectory($path)) {
            return $rows;
        }

<<<<<<< .merge_file_yt3Rm3
        $slugOwners = [];

        foreach (File::allFiles($path) as $file) {
            $row = $this->getRowFromJsonFile($file);
            if ($row === null) {
                continue;
            }

            $relativePathname = $file->getRelativePathname();
            if (Str::contains($relativePathname, '/')) {
                $row = $this->prefixRowKeys($row, Str::of($relativePathname)->beforeLast('/')->replace('/', '.')->toString());
=======
            // PHPStan Level 10: Type-safe max() call
            $maxId = $model->max('id');
            $newId = is_numeric($maxId) ? (int) $maxId + 1 : 1;

            // PHPStan Level 10: Use setAttribute for type safety
            $model->setAttribute('id', $newId);
            $model->setAttribute('updated_at', now());
            $model->setAttribute('updated_by', authId());
            $model->setAttribute('created_at', now());
            $model->setAttribute('created_by', authId());

            /** @var array<string, mixed> $data */
            $data = $model->toArray();
            $item = [];

            // PHPStan Level 10: Type-safe schema access
<<<<<<< HEAD
            $schema = $model->resolveSchema();
            if ($schema === []) {
                throw new Exception('Schema property must be iterable');
            }
=======
            if (! isset($model->schema) || ! is_iterable($model->schema)) {
                throw new Exception('Schema property must be iterable');
            }

            /** @var iterable<string, mixed> $schema */
            $schema = $model->schema;
>>>>>>> 6ed19256f (.)
            foreach ($schema as $name => $type) {
                $value = $data[$name] ?? null;
                $item[$name] = $value;
>>>>>>> .merge_file_SPKzNU
            }

            // Due file con lo stesso slug nella STESSA cartella restano due righe: e' un errore vero e `findUniqueBySlug` lo segnala.
            $slug = $row['slug'] ?? null;
            if (is_string($slug) && $slug !== '' && ($slugOwners[$slug] ??= $path) !== $path) {
                continue;
            }

            $rows[] = $row;
        }

        return $rows;
    }

    /**
     * @return array<string, mixed>|null
     */
    private function getRowFromJsonFile(SplFileInfo $file): ?array
    {
        if ($file->getExtension() !== 'json') {
            return null;
        }

        return $this->mapJsonFileToRow($file->getPathname());
    }

    /**
     * Una riga in sottocartella (`a/b/1.json`) espone id e slug come `a.b.<valore>`.
     *
     * @param  array<string, mixed>  $row
     * @return array<string, mixed>
     */
    private function prefixRowKeys(array $row, string $prefix): array
    {
        foreach (['id', 'slug'] as $key) {
            $value = $row[$key] ?? null;
            if (is_string($value) || is_int($value)) {
                $row[$key] = $prefix.'.'.$value;
            }
        }

        return $row;
    }

    /**
     * @return array<string, mixed>|null
     */
    private function mapJsonFileToRow(string $file): ?array
    {
        $json = File::json($file);
        if (! is_array($json)) {
            return null;
        }

        $schema = $this->resolveSchema();
        if ($schema === []) {
            return null;
        }

        /** @var array<string, mixed> $json */
        return $this->buildRowFromSchema($schema, $json);
    }

<<<<<<< HEAD
    /**
     * @param  array<string, mixed>  $schema
     * @param  array<string, mixed>  $json
     * @return array<string, mixed>
     */
    private function buildRowFromSchema(array $schema, array $json): array
    {
        /** @var array<string, mixed> $item */
        $item = [];

        foreach (array_keys($schema) as $name) {
            $value = $json[$name] ?? null;
            if (is_array($value)) {
                $value = json_encode($value, JSON_PRETTY_PRINT);
            }
            $item[$name] = $value;
        }

        return $item;
    }

    private static function handleJsonCreating(self $model): void
    {
        self::assignCreatingMetadata($model);
        self::writeCreatingJsonFile($model);
    }

    private static function assignCreatingMetadata(self $model): void
    {
        $maxId = $model->max('id');
        $newId = is_numeric($maxId) ? (int) $maxId + 1 : 1;

        $model->setAttribute('id', $newId);
        $model->setAttribute('updated_at', now());
        $model->setAttribute('updated_by', authId());
        $model->setAttribute('created_at', now());
        $model->setAttribute('created_by', authId());
    }

    private static function writeCreatingJsonFile(self $model): void
    {
        /** @var array<string, mixed> $data */
        $data = $model->toArray();
        $schema = $model->resolveSchema();
        if ($schema === []) {
            throw new Exception('Schema property must be iterable');
        }

        $item = [];
        foreach (array_keys($schema) as $name) {
            $item[$name] = $data[$name] ?? null;
        }

        $file = $model->getJsonFile();
        $dir = \dirname($file);

        if (! File::exists($dir)) {
            File::makeDirectory($dir, 0o755, true, true);
        }

        File::put($file, json_encode($item, JSON_PRETTY_PRINT));
    }

<<<<<<< .merge_file_yt3Rm3
    private static function handleJsonUpdating(self $model): void
    {
        $model->setAttribute('updated_at', now());
        $model->setAttribute('updated_by', authId());

        File::put($model->getJsonFile(), $model->toJson(JSON_PRETTY_PRINT));
    }
=======
=======
>>>>>>> 6ed19256f (.)
    // end function boot
}
>>>>>>> .merge_file_SPKzNU

    private static function handleJsonDeleting(self $model): void
    {
        unlink($model->getJsonFile());
    }
}
