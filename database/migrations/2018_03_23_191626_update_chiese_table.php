<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChieseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chiese', function (Blueprint $table) {
            $table->dropForeign('chiese_id_congregazione_foreign');
            $table->foreign("id_congregazione")->references("id")->on("congregazioni")->onDelete("set null")->change();
            $table->integer("id_denominazione")->unsigned()->nullable();
            $table->foreign("id_denominazione")->references("id")->on("denominazioni")->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
