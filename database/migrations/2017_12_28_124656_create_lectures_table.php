<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->increments('id')->unsigned();
//            $table->integer('unite_id')->unsigned();
//            $table->integer('konu_id')->unsigned();
            $table->string('name');
            $table->timestamps();

            // Foreign Keys
//            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('cascade');
//            $table->foreign('konu_id')->references('id')->on('topics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
