<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('regulation_id');
            $table->string('regulation_number');
            $table->text('regulation_about');
            $table->string('regulation_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_lists');
    }
}
