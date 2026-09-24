<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
<<<<<<< HEAD
return new class extends Migration
=======
return new class() extends Migration
>>>>>>> c34c6d1 (.)
=======
return new class() extends Migration
>>>>>>> laraxot/dev
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
<<<<<<< HEAD
<<<<<<< HEAD


=======
>>>>>>> c34c6d1 (.)
=======
>>>>>>> laraxot/dev
