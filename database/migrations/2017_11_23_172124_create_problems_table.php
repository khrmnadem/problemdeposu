<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('senaryo');
            $table->string('benzer');
            $table->string('kaynak');
            $table->text('malzeme');
            $table->text('iletisim_kaynak');
            $table->text('destek');
            $table->integer('onay_say');
            $table->text('keywords');
            $table->string('resim_yolu');
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
        Schema::dropIfExists('problems');
    }
}
