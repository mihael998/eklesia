<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagPredicheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_prediche', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer("id_predica")->unsigned();
            $table->foreign("id_predica")->references("id")->on("prediche")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_prediche');
    }
}
