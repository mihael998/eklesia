<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventi', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titolo");
            $table->text("descrizione");
            $table->dateTime("data_inizio");
            $table->dateTime("data_fine");
            $table->string("indirizzo")->nullable();
            $table->integer("id_comune")->unsigned()->nullable();
            $table->boolean("privato")->default(1);
            $table->integer("id_chiesa")->unsigned();
            $table->foreign("id_chiesa")->references("id")->on("chiese")->onDelete("cascade");
            $table->foreign("id_comune")->references("id")->on("comuni")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventi');
    }
}
