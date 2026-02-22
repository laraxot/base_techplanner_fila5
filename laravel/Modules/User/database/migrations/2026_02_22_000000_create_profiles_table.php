<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\User\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    protected ?string $model_class = Profile::class;

    /**
     * Run the migrations.
     * Unica migrazione per profiles: tableCreate + tableUpdate + conversione id uuid→bigint se necessario.
     */
    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid')->unique()->after('id');
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
        });

        $this->tableUpdate(function (Blueprint $table): void {
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
                $table->string('status')->nullable()->after('preferences');
            }
        });

        $this->convertFromUuidIdIfNeeded();
    }

    /**
     * Converte id da UUID a bigint se la tabella ha id uuid (installazioni legacy).
     */
    protected function convertFromUuidIdIfNeeded(): void
    {
        $table = $this->getTable();

        if (! $this->tableExists()) {
            return;
        }

        $idType = $this->getColumnType('id');
        if (! $this->isUuidType($idType)) {
            $this->backfillUuidIfNeeded();

            return;
        }

        $this->convertFromUuidId($table);
    }


    protected function isUuidType(string $type): bool
    {
        return in_array(strtolower($type), ['char', 'varchar'], true);
    }

    protected function backfillUuidIfNeeded(): void
    {
        if (! $this->hasColumn('uuid')) {
            return;
        }

        $table = $this->getTable();
        $conn = DB::connection($this->model->getConnectionName());

        $conn->table($table)->orderBy('id')->chunk(100, function ($rows) use ($table, $conn): void {
            foreach ($rows as $row) {
                $row = (object) $row;
                if (! empty($row->uuid)) {
                    continue;
                }
                $conn->table($table)->where('id', $row->id)->update(['uuid' => (string) Str::uuid()]);
            }
        });
    }

    protected function convertFromUuidId(string $table): void
    {
        $conn = DB::connection($this->model->getConnectionName());

        if (! $this->hasColumn('uuid')) {
            $this->tableUpdate(function (Blueprint $blueprint): void {
                $blueprint->uuid('uuid')->nullable()->after('id');
            }, $table);
            $conn->table($table)->update(['uuid' => DB::raw('id')]);
            if ($conn->getDriverName() === 'mysql') {
                $conn->statement('ALTER TABLE '.$table.' MODIFY uuid CHAR(36) NOT NULL');
            }
        }

        $tmpTable = $table.'_new';
        $this->createNewProfilesTable($tmpTable);
        $this->copyDataToNewTable($table, $tmpTable);
        $this->updateProfileTeam($table);
        $this->dropTableIfExists($table);
        $this->renameTable($tmpTable, $table);
    }

    protected function createNewProfilesTable(string $tmpTable): void
    {
        $this->getConn()->create($tmpTable, function (Blueprint $table): void {
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
        });
    }

    /** @var array<string, int> */
    protected array $idMapping = [];

    protected function copyDataToNewTable(string $oldTable, string $newTable): void
    {
        $conn = DB::connection($this->model->getConnectionName());
        $rows = $conn->table($oldTable)->orderBy('id')->get();
        $newId = 1;

        $cols = ['user_id', 'type', 'first_name', 'last_name', 'user_name', 'email', 'phone', 'address',
            'birth_date', 'gender', 'bio', 'avatar', 'timezone', 'locale', 'preferences', 'status',
            'is_active', 'extra', 'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'];

        foreach ($rows as $row) {
            $row = (object) $row;
            $data = ['id' => $newId, 'uuid' => $row->uuid ?? (string) Str::uuid()];
            foreach ($cols as $c) {
                if (isset($row->{$c})) {
                    $data[$c] = $row->{$c};
                }
            }
            $this->idMapping[(string) $row->id] = $newId;
            $conn->table($newTable)->insert($data);
            $newId++;
        }
    }

    protected function updateProfileTeam(string $oldTable): void
    {
        if (! $this->hasTable('profile_team')) {
            return;
        }

        $conn = DB::connection($this->model->getConnectionName());
        $profiles = $conn->table($oldTable)->get(['id', 'uuid']);

        foreach ($profiles as $p) {
            $p = (object) $p;
            $newId = $this->idMapping[(string) $p->id] ?? null;
            if ($newId !== null) {
                $conn->table('profile_team')
                    ->where('profile_id', $p->id)
                    ->update(['profile_id' => (string) $newId]);
            }
        }

        if (DB::connection($this->model->getConnectionName())->getDriverName() === 'mysql') {
            $db = $conn->getDatabaseName();
            $constraint = $conn->selectOne(
                "SELECT CONSTRAINT_NAME FROM information_schema.TABLE_CONSTRAINTS 
                 WHERE TABLE_SCHEMA = ? AND TABLE_NAME = 'profile_team' 
                 AND CONSTRAINT_TYPE = 'UNIQUE' AND CONSTRAINT_NAME LIKE '%profile_id%' LIMIT 1",
                [$db]
            );
            $constraintName = is_object($constraint) && isset($constraint->CONSTRAINT_NAME)
                ? (string) $constraint->CONSTRAINT_NAME
                : null;
            if ($constraintName !== null) {
                $conn->statement('ALTER TABLE profile_team DROP INDEX '.$constraintName);
            }
            $conn->statement('ALTER TABLE profile_team MODIFY profile_id BIGINT UNSIGNED NULL');
            $conn->statement('ALTER TABLE profile_team ADD UNIQUE profile_team_profile_id_team_id_unique (profile_id, team_id)');
        }
    }
};
