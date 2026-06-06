<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class() extends XotBaseMigration
{
    /**
=======
return new class extends XotBaseMigration {    /**
>>>>>>> 8215f950 (.)
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
$table->timestamp('created_at')->nullable();
        });
=======
            // $table->timestamp('created_at')->nullable();
            $this->timestamps($table);        });
>>>>>>> 8215f950 (.)

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            // if (! $this->hasColumn('email'))
            //    $table->string('email')->nullable();
            // }
            // $this->updateUser($table);
<<<<<<< HEAD
if ($this->getColumnType('id') === 'uuid') {
                $table->dropColumn('id');
=======
            if ('uuid' === $this->getColumnType('id')) {                $table->dropColumn('id');
>>>>>>> 8215f950 (.)
            }
            if (! $this->hasColumn('id')) {
                $table->id();
            }
        });
    }
};
