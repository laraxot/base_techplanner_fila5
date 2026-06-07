<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Query;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use InvalidArgumentException;
use Spatie\QueueableAction\QueueableAction;
use Throwable;
=======
use Spatie\QueueableAction\QueueableAction;
>>>>>>> dev
use Webmozart\Assert\Assert;

final class GetFieldnamesByTablenameAction
{
    use QueueableAction;

    /**
     * Get column names from a table with specific database connection.
     *
<<<<<<< HEAD
     * @param  string  $table  Table name to get columns from
     * @param  string|null  $connectionName  Database connection name (optional)
     * @return list
     *
     * @throws InvalidArgumentException
=======
     * @param string      $table          Table name to get columns from
     * @param string|null $connectionName Database connection name (optional)
     *
     * @throws \InvalidArgumentException
     *
     * @return list
>>>>>>> dev
     */
    public function execute(string $table, ?string $connectionName = null): array
    {
        // Validate table name
        if (empty(trim($table))) {
<<<<<<< HEAD
            throw new InvalidArgumentException('Table name cannot be empty.');
=======
            throw new \InvalidArgumentException('Table name cannot be empty.');
>>>>>>> dev
        }

        // Use default connection if none is provided
        Assert::string($connectionName ??= config('database.default'));

        // Validate database connection
        if (! $this->isValidConnection($connectionName)) {
<<<<<<< HEAD
            throw new InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
=======
            throw new \InvalidArgumentException(sprintf('Invalid database connection: %s', $connectionName));
>>>>>>> dev
        }

        // Check if table exists in the database
        if (! Schema::connection($connectionName)->hasTable($table)) {
<<<<<<< HEAD
            throw new InvalidArgumentException(sprintf(
                'Table "%s" does not exist in connection "%s".',
                $table,
                $connectionName,
            ));
=======
            throw new \InvalidArgumentException(sprintf('Table "%s" does not exist in connection "%s".', $table, $connectionName));
>>>>>>> dev
        }

        // Get and return column listing
        try {
            $columns = Schema::connection($connectionName)->getColumnListing($table);

            return array_values($columns);
            // $columns = array_map('strval', $columns);
            // return array_values(array_map(static fn ($value): string => is_string($value) ? $value : (string) $value, $columns));
<<<<<<< HEAD
        } catch (Throwable $e) {
            throw new InvalidArgumentException(sprintf(
                'Error fetching columns from table "%s": %s',
                $table,
                $e->getMessage(),
            ));
=======
        } catch (\Throwable $e) {
            throw new \InvalidArgumentException(sprintf('Error fetching columns from table "%s": %s', $table, $e->getMessage()));
>>>>>>> dev
        }
    }

    /**
     * Check if a given database connection is valid.
     */
    private function isValidConnection(string $connectionName): bool
    {
        try {
            DB::connection($connectionName)->getPdo();

            return true;
<<<<<<< HEAD
        } catch (Throwable $e) {
=======
        } catch (\Throwable $e) {
>>>>>>> dev
            return false;
        }
    }
}
