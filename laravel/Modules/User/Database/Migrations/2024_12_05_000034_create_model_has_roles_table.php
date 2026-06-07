<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;
use Modules\Xot\Datas\XotData;

/*
 * Class CreateModelHasRolesTable.
 */
return new class extends XotBaseMigration {
<<<<<<< HEAD
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $team_class = XotData::make()->getTeamClass();
            $table->id();
            // $table->foreignIdFor(Role::class, 'role_id')->nullable();
=======
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table) {
            $team_class = XotData::make()->getTeamClass();
            $table->id();
>>>>>>> dev
            $table->integer('role_id')->index()->nullable();
            $table->uuidMorphs('model');
            $table->foreignIdFor($team_class, 'team_id')->nullable();
        });
<<<<<<< HEAD
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
=======

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table) {
>>>>>>> dev
            $team_class = XotData::make()->getTeamClass();
            if (! $this->hasColumn('team_id')) {
                $table->foreignIdFor($team_class, 'team_id')->nullable();
            }
            if ('uuid' === $this->getColumnType('model_id')) {
                $table->string('model_id', 36)->index()->change();
            }
            if ('uuid' === $this->getColumnType('role_id')) {
                $table->integer('role_id')->index()->change();
            }
<<<<<<< HEAD
            // $this->updateUser($table);
=======
>>>>>>> dev
            $this->updateTimestamps($table);
        });
    }
};
