<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinumanTable extends Migration
{
    public function up()
    {
        Schema::create('minuman', function (Blueprint $table) {
            $table->id();
            $table->string('minumanNama');
            $table->text('minumanDesc');
            $table->integer('minumanHarga');
            $table->integer('minumanStok');
            $table->string('minumanJenis');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('minuman');
    }
}