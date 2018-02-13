<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cognome');
            $table->date("data_nascita");
            $table->boolean("sesso");
            $table->string('email')->unique();
            $table->string('pwd');
            $table->integer('id_chiesa')->unsigned()->nullable();
            $table->boolean('abilitato')->default(1);
            $table->string('foto')->nullable();
            $table->foreign("id_chiesa")->references("id")->on("chiese")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti');
    }
}
