<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComunicazioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicazioni', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titolo");
            $table->text("descrizione");
            $table->dateTime("data")->nullable();
            $table->boolean("prioritario")->default(0);
            $table->boolean("privato")->default(1);
            $table->integer("id_chiesa")->unsigned();
            $table->foreign("id_chiesa")->references("id")->on("chiese")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunicazioni');
    }
}
