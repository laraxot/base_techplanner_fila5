<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateTicketsTable.
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
            $blueprint->string('title')->nullable();
            $blueprint->text('description')->nullable();
            $blueprint->string('status', 50)->default('open');
            $blueprint->string('priority', 50)->default('medium');
            $blueprint->string('category', 50)->nullable();
            $blueprint->date('due_date')->nullable();
            $blueprint->integer('assignee_id')->nullable();
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
