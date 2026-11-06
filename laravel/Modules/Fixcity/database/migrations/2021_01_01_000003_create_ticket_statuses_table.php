<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateTicketStatusesTable.
 */
return new class extends XotBaseMigration {
    /**
     * db up.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(function (Blueprint $blueprint): void {
            $blueprint->increments('id');
            $blueprint->nullableMorphs('model');
            $blueprint->string('name', 100)->nullable();
            $blueprint->string('description', 500)->nullable();
            $blueprint->string('color', 20)->nullable();
            $blueprint->integer('order')->default(0);
            $blueprint->string('created_by')->nullable();
            $blueprint->string('updated_by')->nullable();
            $blueprint->string('deleted_by')->nullable();
            $blueprint->timestamps();
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $blueprint): void {
            if (! $this->hasColumn('created_by')) {
                $blueprint->string('created_by')->nullable();
            }
            if (! $this->hasColumn('updated_by')) {
                $blueprint->string('updated_by')->nullable();
            }
            if (! $this->hasColumn('deleted_by')) {
                $blueprint->string('deleted_by')->nullable();
            }
        });
    }
};
