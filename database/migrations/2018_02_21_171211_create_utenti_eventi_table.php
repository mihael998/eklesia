<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtentiEventiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti_eventi', function (Blueprint $table) {
            $table->integer("id_utente")->unsigned();
            $table->integer("id_evento")->unsigned();
            $table->primary(['id_utente', 'id_evento']);
            $table->foreign('id_utente')->references('id')->on('utenti')->onDelete('cascade');
            $table->foreign('id_evento')->references('id')->on('eventi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti_eventi');
    }
}
