<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('category');
            $table->timestamps();
        });

        //Set Foreign Key di kolom regulation_id pada tabel regulation_lists
        Schema::table('regulation_lists', function (Blueprint $table) {
            $table->foreign('regulation_id')->references('id')->on('regulations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom pi_id di tabel pi_lists
        Schema::table('regulation_lists', function (Blueprint $table) {
            $table->dropForeign('regulation_lists_regulation_id_foreign');
        });

        Schema::dropIfExists('regulations');
    }
}
