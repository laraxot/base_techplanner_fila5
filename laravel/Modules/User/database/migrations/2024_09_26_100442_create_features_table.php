<?php

declare(strict_types=1);

/**
 * @see https://laravel.com/docs/11.x/pennant
 */

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
=======
        // -- CREATE --
>>>>>>> 6ed19256f (.)
        $this->tableCreate(static function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('scope');
            $table->text('value');
<<<<<<< HEAD
            $table->unique(['name', 'scope']);
            $table->timestamps();
            $table->softDeletes();
=======

            $table->unique(['name', 'scope']);
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
>>>>>>> 6ed19256f (.)
        });
    }
};
