<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Migrazione unica per profiles (main_module).
 *
 * Profile è strettamente dipendente dal main_module: la migration vive in TechPlanner.
 * CREATE: id bigint auto-increment, uuid, campi profilo.
 * UPDATE: aggiunge colonne mancanti; converte id da UUID a bigint se necessario (XotBaseMigration).
 */
return new class extends XotBaseMigration {
    protected ?string $model_class = Profile::class;

    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->uuid('uuid')->unique()->nullable()->after('id');
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
            $table->string('fiscal_code')->nullable()->index();
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $idType = $this->getColumnType('id');

            if (in_array($idType, ['string', 'guid', 'char', 'varchar'], true)) {
                $this->convertUuidPrimaryKeyToBigintWithUuidColumn(
                    $this->getProfilesNewTableColumns(),
                    $this->getProfilesInsertColumns(),
                    [['table' => 'profile_team', 'fk_column' => 'profile_id', 'unique_with' => ['profile_id', 'team_id']]]
                );
            } else {
                if (! $this->hasColumn('uuid')) {
                    $table->uuid('uuid')->unique()->nullable()->after('id');
                }
            }

            if (! $this->hasColumn('user_id')) {
                $table->string('user_id', 36)->index()->nullable()->after('id');
            }
            if (! $this->hasColumn('email')) {
                $table->string('email')->nullable()->after('last_name');
            }
            if (! $this->hasColumn('phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (! $this->hasColumn('avatar')) {
                $table->string('avatar')->nullable();
            }
            if (! $this->hasColumn('timezone')) {
                $table->string('timezone')->nullable();
            }
            if (! $this->hasColumn('locale')) {
                $table->string('locale')->nullable();
            }
            if (! $this->hasColumn('preferences')) {
                $table->json('preferences')->nullable();
            }
            if (! $this->hasColumn('status')) {
                $table->string('status')->nullable();
            }
            if (! $this->hasColumn('fiscal_code')) {
                $table->string('fiscal_code')->nullable()->index();
            }
            if (! $this->hasColumn('notes')) {
                $table->text('notes')->nullable();
            }
        });
    }

    protected function getProfilesNewTableColumns(): string
    {
        return 'uuid CHAR(36) NULL UNIQUE,
            user_id VARCHAR(36) NULL,
            type VARCHAR(255) NULL,
            first_name VARCHAR(255) NULL,
            last_name VARCHAR(255) NULL,
            user_name VARCHAR(255) NULL,
            email VARCHAR(255) NULL,
            phone VARCHAR(255) NULL,
            address VARCHAR(255) NULL,
            birth_date DATE NULL,
            gender VARCHAR(1) NULL,
            bio TEXT NULL,
            avatar VARCHAR(255) NULL,
            timezone VARCHAR(255) NULL,
            locale VARCHAR(255) NULL,
            preferences JSON NULL,
            status VARCHAR(255) NULL,
            is_active TINYINT(1) DEFAULT 1,
            extra JSON NULL,
            created_at TIMESTAMP NULL,
            updated_at TIMESTAMP NULL,
            deleted_at TIMESTAMP NULL,
            created_by VARCHAR(255) NULL,
            updated_by VARCHAR(255) NULL,
            deleted_by VARCHAR(255) NULL,
            INDEX (user_id),
            INDEX (type)';
    }

    /**
     * @return array<int, string>
     */
    protected function getProfilesInsertColumns(): array
    {
        return [
            'user_id', 'type', 'first_name', 'last_name', 'user_name', 'email', 'phone',
            'address', 'birth_date', 'gender', 'bio', 'avatar', 'timezone', 'locale', 'preferences',
            'status', 'is_active', 'extra', 'created_at', 'updated_at', 'deleted_at',
            'created_by', 'updated_by', 'deleted_by',
        ];
    }
};
