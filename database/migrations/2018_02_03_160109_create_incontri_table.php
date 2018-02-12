<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncontriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incontri', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titolo");
            $table->time("inizio");
            $table->time("fine");
            $table->integer("id_chiesa")->unsigned();
            $table->enum("giorno",["lu","ma","me","gi","ve","sa","do"]);
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
        Schema::dropIfExists('incontri');
    }
}
