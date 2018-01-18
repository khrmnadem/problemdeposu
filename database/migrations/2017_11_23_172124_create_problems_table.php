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
            $table->increments('id')->unsinged();
            $table->integer('user_id')->nullable();
//            $table->integer('ders_id')->unsigned();
//            $table->integer('unite_id')->unsigned();
//            $table->integer('konu_id')->unsigned();
            $table->string('senaryo_baslik');
            $table->text('senaryo_icerik');
            $table->string('benzer');
            $table->string('bilgi_kaynak');
            $table->text('bilissel_araclar');
            $table->integer('ogretmen_rol_id')->nullable();
            $table->text('iletisim_isbirligi_araclar');
            $table->text('destek_kanal');
            $table->integer('onay_say');
            $table->text('keywords');
            $table->string('resim_yolu');
            $table->text('link');
            $table->timestamps();


            // Foreign Keys
//            $table->foreign('ders_id')->references('id')->on('lectures')->onDelete('cascade');
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
        Schema::dropIfExists('problems');
    }
}
