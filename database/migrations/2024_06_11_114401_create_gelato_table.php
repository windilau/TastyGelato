<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGelatoTable extends Migration
{
    public function up()
    {
        Schema::create('gelato', function (Blueprint $table) {
            $table->id();
            $table->string('gelatoNama');
            $table->text('gelatoDesc');
            $table->integer('gelatoHarga');
            $table->integer('gelatoStok');
            $table->string('gelatoJenis');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gelato');
    }
}