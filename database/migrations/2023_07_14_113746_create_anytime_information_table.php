<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnytimeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anytime_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('category');
            $table->timestamps();
        });

        //Set Foreign Key di kolom parent_id pada tabel anytime_information_lists
        Schema::table('anytime_information_lists', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('anytime_information')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom parent_id di tabel anytime_information_lists
        Schema::table('anytime_information_lists', function (Blueprint $table) {
            $table->dropForeign('anytime_information_lists_parent_id_foreign');
        });

        Schema::dropIfExists('anytime_information');
    }
}
