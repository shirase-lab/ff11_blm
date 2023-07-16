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
            $table->integer('eint');
            $table->integer('barrier');
            $table->integer('m_cut');
            $table->integer('fire');
            $table->integer('earth');
            $table->integer('water');
            $table->integer('aero');
            $table->integer('thunder');
            $table->integer('light');
            $table->integer('dark');
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
