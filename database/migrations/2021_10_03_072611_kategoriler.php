<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kategoriler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoriler', function (Blueprint $table) {
            $table->id();
            $table->string("baslik",255);
            $table->string("seflink",255);
            $table->string("tablo",255)->nullable();
            $table->string("anahtar",255)->nullable();
            $table->string("description",255)->nullable();
            $table->enum("durum",[1,2])->default(1);
            $table->integer("sirano")->nullable();
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
        Schema::dropIfExists('kategoriler');
    }
}
