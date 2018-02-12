<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChieseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chiese', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("nome");
            $table->string("indirizzo");
            $table->string("telefono")->nullable();
            $table->string("sito")->nullable();
            $table->string("email")->nullable();
            $table->boolean("abilitato");
            $table->integer("id_admin")->unsigned();
            $table->integer("id_comune")->unsigned();
            $table->integer("id_congregazione")->unsigned()->nullable();
            $table->string("foto")->nullable();
            $table->foreign("id_admin")->references("id")->on("admin")->onDelete("cascade");
            $table->foreign("id_comune")->references("id")->on("comuni")->onDelete("cascade");
            $table->foreign("id_congregazione")->references("id")->on("congregazioni")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chiese');
    }
}
