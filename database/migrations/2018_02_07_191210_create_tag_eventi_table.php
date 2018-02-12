<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagEventiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_eventi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer("id_evento")->unsigned();
            $table->foreign("id_evento")->references("id")->on("eventi")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_eventi');
    }
}
