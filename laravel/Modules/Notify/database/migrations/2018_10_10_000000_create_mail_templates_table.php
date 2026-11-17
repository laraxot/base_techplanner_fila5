<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ----- bases ----
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
/**
 * Class CreateMailTemplatesTable.
 *
 * Consolidated migration for mail_templates table following "1 Table = 1 Migration File" rule.
 */
return new class extends XotBaseMigration
{
=======
/*
 * Class CreateThemesTable.
 */
return new class extends XotBaseMigration
{
    // use XotBaseMigrationTrait;
>>>>>>> 6ed19256f (.)
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
<<<<<<< HEAD
        if (! $this->tableExists()) {
            $this->getConn()->create($this->getTable(), function (Blueprint $table): void {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('mailable')->nullable();
                $table->string('slug')->unique()->nullable();
                $table->json('subject')->nullable();
                $table->json('html_template')->nullable();
                $table->json('text_template')->nullable();
                $table->string('version')->default('1.0.0');
            });
        }

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
            if (! $this->hasColumn('name')) {
                $table->string('name')->nullable();
            }
            if (! $this->hasColumn('slug')) {
                $table->string('slug')->unique()->nullable();
            }
            if (! $this->hasColumn('params')) {
                $table->text('params')->nullable();
            }
            if (! $this->hasColumn('sms_template')) {
                $table->json('sms_template')->nullable();
            }
            if (! $this->hasColumn('counter')) {
                $table->integer('counter')->default(0);
            }
            if (! $this->hasColumn('html_layout_path')) {
                $table->string('html_layout_path')->nullable();
            }
            if (! $this->hasColumn('version')) {
                $table->string('version')->default('1.0.0');
            }

=======
        $this->tableCreate(function (Blueprint $table): void {
            $table->increments('id');
            $table->string('mailable');
            $table->text('subject')->nullable();
            $table->longText('html_template');
            $table->longText('text_template')->nullable();
        });

        // -- UPDATE --
        $this->tableUpdate(function (Blueprint $table): void {
>>>>>>> 6ed19256f (.)
            $this->updateTimestamps(
                table: $table,
                hasSoftDeletes: true,
            );
        });
    }
};
