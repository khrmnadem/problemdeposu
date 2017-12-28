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
            $table->integer('ders_id');
            $table->integer('unite_id');
            $table->integer('konu_id');
            $table->string('senaryo_baslik');
            $table->text('senaryo_icerik');
            $table->string('benzer');
            $table->string('bilgi_kaynak');
            $table->text('bilissel_araclar');
            $table->integer('ogretmen_rol_id');
            $table->text('iletisim_isbirligi_araclar');
            $table->text('destek_kanal');
            $table->integer('onay_say');
            $table->text('keywords');
            $table->string('resim_yolu');
            $table->text('link');
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
