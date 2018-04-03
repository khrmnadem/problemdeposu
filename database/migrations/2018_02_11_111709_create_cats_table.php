<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });
        Schema::create('cat_problem', function (Blueprint $table) {
            $table->integer('cat_id');
            $table->integer('problem_id');
            $table->primary(['cat_id', 'problem_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats');
        Schema::dropIfExists('cat_problem');
    }
}
