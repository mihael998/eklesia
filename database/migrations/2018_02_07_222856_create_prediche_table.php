<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredicheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediche', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titolo");
            $table->text("contenuto")->nullable();
            $table->string("audio")->nullable();
            $table->date("data");
            $table->string("autore");
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
        Schema::dropIfExists('prediche');
    }
}
