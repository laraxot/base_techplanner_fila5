<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> dev
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Unica migrazione per profiles (main_module).
 * Profile è strettamente dipendente da TechPlanner.
<<<<<<< HEAD
 * 
 * Schema: id (auto-increment), uuid (unique), user_id, e altri campi.
 * UUID è per compatibilità con Android/Postgres.
 * 
=======
 *
 * Schema: id (auto-increment), uuid (unique), user_id, e altri campi.
 * UUID è per compatibilità con Android/Postgres.
 *
>>>>>>> dev
 * Regole Laraxot:
 * - Una sola migrazione per modello
 * - Estende XotBaseMigration
 * - Nome: data_create_tabella_table.php
 */
class CreateProfilesTable extends XotBaseMigration
{
    protected ?string $model_class = Profile::class;

    public function up(): void
    {
        $tableName = $this->getTable();
        $idType = $this->getColumnType('id');

        // Se la tabella non esiste, crea con bigint auto_increment
        if (! $this->tableExists($tableName)) {
<<<<<<< HEAD
            $this->tableCreate(function (Blueprint $table) use ($tableName): void {
=======
            $this->tableCreate(function (Blueprint $table): void {
>>>>>>> dev
                $this->profilesSchema($table);
            });

            return;
        }

        // Tabella esiste - gestisci conversione UUID -> bigint
        $this->handleExistingTable($tableName, $idType);
    }

    protected function handleExistingTable(string $tableName, string $idType): void
    {
        // Aggiungi colonne mancanti
<<<<<<< HEAD
        $this->tableUpdate(function (Blueprint $table) use ($tableName): void {
=======
        $this->tableUpdate(function (Blueprint $table): void {
>>>>>>> dev
            $this->addMissingColumns($table);
        });

        // Se id è UUID (non bigint), converti
        if ($this->isUuidColumnType($idType)) {
            $this->convertUuidToBigint($tableName);
        } else {
            // Assicurati che uuid esista
<<<<<<< HEAD
            $this->ensureUuidColumn($tableName);
=======
            $this->ensureUuidColumn();
>>>>>>> dev
        }
    }

    protected function isUuidColumnType(string $type): bool
    {
        return in_array(strtolower($type), ['char', 'varchar', 'string'], true);
    }

<<<<<<< HEAD
    protected function ensureUuidColumn(string $tableName): void
    {
        $columns = Schema::getColumnListing($tableName);
        if (! in_array('uuid', $columns, true)) {
            $this->tableUpdate(function (Blueprint $table) use ($tableName): void {
=======
    protected function ensureUuidColumn(): void
    {
        if (! $this->hasColumn('uuid')) {
            $this->tableUpdate(function (Blueprint $table): void {
>>>>>>> dev
                $table->uuid('uuid')->unique()->nullable()->after('id');
            });
        }
    }

    protected function convertUuidToBigint(string $tableName): void
    {
        $conn = DB::connection($this->getConnection());

        // Backup dati esistenti
<<<<<<< HEAD
        $existingData = $conn->table($tableName)->get(['id', 'uuid'])->map(function ($row) {
            return [
                'old_id' => $row->id,
                'uuid' => $row->uuid ?? (string) \Illuminate\Support\Str::uuid(),
            ];
        })->toArray();

        if (empty($existingData)) {
            $this->ensureUuidColumn($tableName);
=======
        /** @var list<array{old_id: string|int, uuid: string}> $existingData */
        $existingData = $conn->table($tableName)->get(['id', 'uuid'])->map(function (stdClass $row): array {
            return [
                'old_id' => $row->id,
                'uuid' => isset($row->uuid) ? (string) $row->uuid : (string) Str::uuid(),
            ];
        })->all();

        if (empty($existingData)) {
            $this->ensureUuidColumn();
>>>>>>> dev
            $this->changeIdToBigint($tableName);

            return;
        }

        // Crea nuova tabella con bigint id
        $tmpTable = $tableName.'_new';
        $this->getConn()->create($tmpTable, function (Blueprint $table): void {
            $this->profilesSchema($table);
        });

        // Copia dati con nuovo id
        $newId = 1;
        foreach ($existingData as $row) {
            $data = ['id' => $newId, 'uuid' => $row['uuid']];
<<<<<<< HEAD
            $conn->table($tableName)->where('id', $row['old_id'])->first();
            $original = $conn->table($tableName)->where('id', $row['old_id'])->first();
            if ($original) {
=======
            $original = $conn->table($tableName)->where('id', $row['old_id'])->first();
            if ($original instanceof stdClass) {
>>>>>>> dev
                foreach ($this->getDataColumns() as $col) {
                    if (isset($original->{$col})) {
                        $data[$col] = $original->{$col};
                    }
                }
            }
            $conn->table($tmpTable)->insert($data);
            $newId++;
        }

        // Aggiorna tabelle pivot
<<<<<<< HEAD
        $this->updatePivotTables($tableName, $tableName);
=======
        $this->updatePivotTables();
>>>>>>> dev

        // Sostituisci tabella
        $this->dropTableIfExists($tableName);
        $this->renameTable($tmpTable, $tableName);
    }

    protected function changeIdToBigint(string $tableName): void
    {
        $conn = DB::connection($this->getConnection());
        if ($conn->getDriverName() === 'mysql') {
            $conn->statement('ALTER TABLE '.$tableName.' MODIFY id BIGINT UNSIGNED AUTO_INCREMENT');
        }
    }

<<<<<<< HEAD
    protected function updatePivotTables(string $oldTable, string $newTable): void
=======
    protected function updatePivotTables(): void
>>>>>>> dev
    {
        $pivotTables = ['profile_team'];

        foreach ($pivotTables as $pivotTable) {
            if (! $this->hasTable($pivotTable)) {
                continue;
            }

<<<<<<< HEAD
            $columns = Schema::getColumnListing($pivotTable);

            // Aggiorna foreign keys che referenziano profile
            if (in_array('profile_id', $columns, true)) {
                $conn = DB::connection($this->getConnection());
=======
            $conn = DB::connection($this->getConnection());
            $columns = Schema::connection($this->getConnection())->getColumnListing($pivotTable);

            // Aggiorna foreign keys che referenziano profile
            if (in_array('profile_id', $columns, true)) {
>>>>>>> dev
                if ($conn->getDriverName() === 'mysql') {
                    $conn->statement('ALTER TABLE '.$pivotTable.' MODIFY profile_id BIGINT UNSIGNED NULL');
                }
            }
        }
    }

<<<<<<< HEAD
=======
    /**
     * @return list<string>
     */
>>>>>>> dev
    protected function getDataColumns(): array
    {
        return [
            'user_id', 'type', 'first_name', 'last_name', 'user_name', 'email', 'phone',
            'address', 'birth_date', 'gender', 'bio', 'avatar', 'timezone', 'locale',
            'preferences', 'status', 'is_active', 'extra', 'created_at', 'updated_at',
            'deleted_at', 'created_by', 'updated_by', 'deleted_by',
        ];
    }

    protected function addMissingColumns(Blueprint $table): void
    {
<<<<<<< HEAD
        $tableName = $table->getTable();
        $columns = Schema::getColumnListing($tableName);

        if (! in_array('uuid', $columns, true)) {
            $table->uuid('uuid')->unique()->nullable()->after('id');
        }
        if (! in_array('user_id', $columns, true)) {
            $table->string('user_id', 36)->index()->nullable()->after('uuid');
        }
        if (! in_array('email', $columns, true)) {
            $table->string('email')->nullable()->after('last_name');
        }
        if (! in_array('phone', $columns, true)) {
            $table->string('phone')->nullable()->after('email');
        }
        if (! in_array('avatar', $columns, true)) {
            $table->string('avatar')->nullable()->after('bio');
        }
        if (! in_array('timezone', $columns, true)) {
            $table->string('timezone')->nullable()->after('avatar');
        }
        if (! in_array('locale', $columns, true)) {
            $table->string('locale')->nullable()->after('timezone');
        }
        if (! in_array('preferences', $columns, true)) {
            $table->json('preferences')->nullable()->after('locale');
        }
        if (! in_array('status', $columns, true)) {
=======
        if (! $this->hasColumn('uuid')) {
            $table->uuid('uuid')->unique()->nullable()->after('id');
        }
        if (! $this->hasColumn('user_id')) {
            $table->string('user_id', 36)->index()->nullable()->after('uuid');
        }
        if (! $this->hasColumn('email')) {
            $table->string('email')->nullable()->after('last_name');
        }
        if (! $this->hasColumn('phone')) {
            $table->string('phone')->nullable()->after('email');
        }
        if (! $this->hasColumn('avatar')) {
            $table->string('avatar')->nullable()->after('bio');
        }
        if (! $this->hasColumn('timezone')) {
            $table->string('timezone')->nullable()->after('avatar');
        }
        if (! $this->hasColumn('locale')) {
            $table->string('locale')->nullable()->after('timezone');
        }
        if (! $this->hasColumn('preferences')) {
            $table->json('preferences')->nullable()->after('locale');
        }
        if (! $this->hasColumn('status')) {
>>>>>>> dev
            $table->string('status')->nullable()->after('preferences');
        }
    }

    protected function profilesSchema(Blueprint $table): void
    {
        $table->id();
        $table->uuid('uuid')->unique();
        $table->string('user_id', 36)->index()->nullable();
        $table->string('type')->index()->nullable();
        $table->string('first_name')->nullable();
        $table->string('last_name')->nullable();
        $table->string('user_name')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->date('birth_date')->nullable();
        $table->string('gender', 1)->nullable();
        $table->text('bio')->nullable();
        $table->string('avatar')->nullable();
        $table->string('timezone')->nullable();
        $table->string('locale')->nullable();
        $table->json('preferences')->nullable();
        $table->string('status')->nullable();
        $table->boolean('is_active')->default(true);
        $table->json('extra')->nullable();
        $table->timestamps();
        $table->softDeletes();
        $table->string('created_by')->nullable();
        $table->string('updated_by')->nullable();
        $table->string('deleted_by')->nullable();
    }
}

return new CreateProfilesTable();
