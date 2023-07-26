<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmediatelyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immediately_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('category');
            $table->timestamps();
        });

        //Set Foreign Key di kolom parent_id pada tabel immediately_information_lists
        Schema::table('immediately_information_lists', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('immediately_information')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom parent_id di tabel immediately_information_lists
        Schema::table('immediately_information_lists', function (Blueprint $table) {
            $table->dropForeign('immediately_information_lists_parent_id_foreign');
        });

        Schema::dropIfExists('immediately_information');
    }
}
