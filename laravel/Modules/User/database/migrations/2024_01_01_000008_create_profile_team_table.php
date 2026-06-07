<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Nome della tabella gestita dalla migrazione.
     */
    protected string $table_name = 'profile_team';

    /**
     * Esegue la migrazione.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
<<<<<<< HEAD
<<<<<<< HEAD
            $table->unsignedBigInteger('profile_id')->nullable()->index();
=======
            $table->uuid('profile_id')->nullable()->index();
>>>>>>> 4b6b99016 (first commit)
=======
            $table->uuid('profile_id')->nullable()->index();
>>>>>>> dev
            $table->foreignId('team_id');
            $table->string('role')->nullable();
            $table->text('permissions')->nullable();

<<<<<<< HEAD
<<<<<<< HEAD
=======
            // Indice univoco per evitare duplicati profile_id + team_id
>>>>>>> 4b6b99016 (first commit)
=======
            // Indice univoco per evitare duplicati profile_id + team_id
>>>>>>> dev
            $table->unique(['profile_id', 'team_id']);
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // Aggiorniamo i timestamp e soft deletes
<<<<<<< HEAD
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
=======
            $this->updateTimestamps(table: $table, hasSoftDeletes: true);
>>>>>>> dev
        });
    }
};
