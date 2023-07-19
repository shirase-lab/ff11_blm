<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enemies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('remarks')->default('');
            $table->integer('eint');
            $table->integer('barrier');
            $table->integer('fire');
            $table->integer('earth');
            $table->integer('water');
            $table->integer('aero');
            $table->integer('ice');
            $table->integer('thunder');
            $table->integer('light');
            $table->integer('dark');
            $table->integer('geo');
            $table->boolean('impact')->default(false);
            $table->boolean('burn')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enemies');
    }
};
