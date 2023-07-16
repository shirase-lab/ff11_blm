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
        Schema::create('augments', function (Blueprint $table) {
            $table->id();
            $table->integer('equip_id');
            $table->integer('rank')->default('0');
            $table->string('type')->default('');
            $table->string('status')->default('');
            $table->string('hide_status')->default('');
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
        Schema::dropIfExists('augments');
    }
};
