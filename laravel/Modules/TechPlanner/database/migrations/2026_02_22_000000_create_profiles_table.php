<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\TechPlanner\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Unica migrazione per profiles (main_module).
 * Profile è strettamente dipendente da TechPlanner.
 * 
 * Schema: id (auto-increment), uuid (unique), user_id, e altri campi.
 * UUID è per compatibilità con Android/Postgres.
 */
class CreateProfilesTable extends XotBaseMigration
{
    protected ?string $model_class = Profile::class;

    public function up(): void
    {
        $this->tableCreate(static function (Blueprint $table): void {
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

        $this->tableUpdate(static function (Blueprint $table): void {
            if (! $table->hasColumn('uuid')) {
                $table->uuid('uuid')->unique()->nullable()->after('id');
            }
            if (! $table->hasColumn('user_id')) {
                $table->string('user_id', 36)->index()->nullable()->after('uuid');
            }
            if (! $table->hasColumn('email')) {
                $table->string('email')->nullable()->after('last_name');
            }
            if (! $table->hasColumn('phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (! $table->hasColumn('avatar')) {
                $table->string('avatar')->nullable()->after('bio');
            }
            if (! $table->hasColumn('timezone')) {
                $table->string('timezone')->nullable()->after('avatar');
            }
            if (! $table->hasColumn('locale')) {
                $table->string('locale')->nullable()->after('timezone');
            }
            if (! $table->hasColumn('preferences')) {
                $table->json('preferences')->nullable()->after('locale');
            }
            if (! $table->hasColumn('status')) {
                $table->string('status')->nullable()->after('preferences');
            }
        });
    }
}

return new CreateProfilesTable();
