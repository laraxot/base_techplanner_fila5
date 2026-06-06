<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

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
        // -- CREATE --
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('uuid', 36)->nullable()->index();
            $table->string('email')->index();
            $table->string('token');
<<<<<<< HEAD
            // $table->timestamp('created_at')->nullable();
            $this->timestamps($table);
=======
            $table->timestamp('created_at')->nullable();
>>>>>>> origin/dev
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email'))
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
<<<<<<< HEAD
            if ('uuid' === $this->getColumnType('id')) {
=======
            if ($this->getColumnType('id') === 'uuid') {
>>>>>>> origin/dev
                $table->dropColumn('id');
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
