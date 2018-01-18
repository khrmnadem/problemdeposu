<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unites', function (Blueprint $table) {
            $table->increments('id')->unsigned();
//            $table->integer('konu_id')->unsigned();
//            $table->integer('ders_id')->unsigned();
            $table->string('name');
            $table->timestamps();


            // Foreign Keys
//            $table->foreign('ders_id')->references('id')->on('lectures')->onDelete('cascade');
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
        Schema::dropIfExists('unites');
    }
}
