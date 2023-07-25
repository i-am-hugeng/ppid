<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('category');
            $table->timestamps();
        });

        //Set Foreign Key di kolom parent_id pada tabel other_information_lists
        Schema::table('other_information_lists', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('other_information')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom parent_id di tabel other_information_lists
        Schema::table('other_information_lists', function (Blueprint $table) {
            $table->dropForeign('other_information_lists_parent_id_foreign');
        });

        Schema::dropIfExists('other_information');
    }
}
