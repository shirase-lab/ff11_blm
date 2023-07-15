<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('part_id');
            $table->integer('type_id');
            $table->boolean('rare')->default(false);
            $table->boolean('ex')->default(false);
            $table->string('status');
            $table->string('hide_status')->default('');
            $table->boolean('aug')->default(false);
            $table->string('a_status')->default('');
            $table->integer('quality')->default(0);
            $table->integer('level');
            $table->string('jobs');
            $table->string('image_url');
            $table->string('yougo_url');
            $table->timestamps();
            $table->unique(['name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equips');
    }
}
