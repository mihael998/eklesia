<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUtentiChieseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti_chiese', function (Blueprint $table) {
            $table->integer("id_utente")->unsigned();
            $table->integer("id_chiesa")->unsigned();
            $table->primary(['id_utente', 'id_chiesa']);
            $table->foreign('id_utente')->references('id')->on('utenti')->onDelete('cascade');
            $table->foreign('id_chiesa')->references('id')->on('chiese')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti_chiese');
    }
}
