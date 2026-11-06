<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateTicketDatasTable.
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
            $blueprint->string('field_name')->nullable();
            $blueprint->string('field_value', 500)->nullable();
            $blueprint->integer('ticket_id')->nullable();
            $blueprint->string('created_by')->nullable();
            $blueprint->string('updated_by')->nullable();
            $blueprint->string('deleted_by')->nullable();
            $blueprint->timestamps();
        });
        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $blueprint): void {
            if (! $this->hasColumn('ticket_id')) {
                $blueprint->integer('ticket_id')->nullable();
            }
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
