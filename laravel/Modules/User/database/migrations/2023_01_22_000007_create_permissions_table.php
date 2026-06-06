<?php

declare(strict_types=1);

use Illuminate\Contracts\Cache\Factory;
use Illuminate\Database\Schema\Blueprint;
// ---- models ---
<<<<<<< HEAD
use Modules\Xot\Database\Migrations\XotBaseMigration;
=======
use Illuminate\Support\Facades\Schema;
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;
>>>>>>> origin/dev

/*
 * Class CreatePermissionsTable.
 */
<<<<<<< HEAD
return new class extends XotBaseMigration {
=======
return new class() extends XotBaseMigration
{
>>>>>>> origin/dev
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CACHE --
        try {
            if (app()->bound(Factory::class)) {
                $cache = app(Factory::class);
                $cache_store = config('permission.cache.store');
                $cache_key = config('permission.cache.key');
                /** @var string|null $store */
<<<<<<< HEAD
                $store = 'default' !== $cache_store ? $cache_store : null;
=======
                $store = $cache_store !== 'default' ? $cache_store : null;
>>>>>>> origin/dev
                /** @var string $cache_key */
                if (is_string($cache_key)) {
                    $cache->store($store)->forget($cache_key);
                }
            }
        } catch (Exception $e) {
        }

        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('guard_name');
            $table->unique(['name', 'guard_name']);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // Usa Schema::hasColumn direttamente per verificare esistenza
            $tableName = 'permissions';
            if (
<<<<<<< HEAD
                ! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'created_at')
                && ! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'updated_at')
=======
                ! Schema::connection('user')->hasColumn($tableName, 'created_at')
                && ! Schema::connection('user')->hasColumn($tableName, 'updated_at')
>>>>>>> origin/dev
            ) {
                $this->updateTimestamps($table);
            } else {
                // Se i timestamp esistono già, aggiungi solo i campi user se mancanti
<<<<<<< HEAD
                $xot = Modules\Xot\Datas\XotData::make();
                $userClass = $xot->getUserClass();
                if (! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'updated_by')) {
                    $table->foreignIdFor($userClass, 'updated_by')->nullable();
                }
                if (! Illuminate\Support\Facades\Schema::connection('user')->hasColumn($tableName, 'created_by')) {
=======
                $xot = XotData::make();
                $userClass = $xot->getUserClass();
                if (! Schema::connection('user')->hasColumn($tableName, 'updated_by')) {
                    $table->foreignIdFor($userClass, 'updated_by')->nullable();
                }
                if (! Schema::connection('user')->hasColumn($tableName, 'created_by')) {
>>>>>>> origin/dev
                    $table->foreignIdFor($userClass, 'created_by')->nullable();
                }
            }
        });
    }
};
