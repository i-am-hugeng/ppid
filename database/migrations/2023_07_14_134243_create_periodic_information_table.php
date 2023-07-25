<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodic_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('category');
            $table->timestamps();
        });

        //Set Foreign Key di kolom parent_id pada tabel periodic_information_lists
        Schema::table('periodic_information_lists', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('periodic_information')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Foreign Key di kolom parent_id di tabel periodic_information_lists
        Schema::table('periodic_information_lists', function (Blueprint $table) {
            $table->dropForeign('periodic_information_lists_parent_id_foreign');
        });

        Schema::dropIfExists('periodic_information');
    }
}
