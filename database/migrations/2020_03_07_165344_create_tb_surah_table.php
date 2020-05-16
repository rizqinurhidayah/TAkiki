<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSurahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_surah', function (Blueprint $table) {
            $table->Increments('id_surah');
            $table->string('nama_surah');
            $table->string('jmlh_ayat');
            $table->timestamps();
        });

        Schema::table('tb_hafalan', function (Blueprint $table){
            $table->foreign('id_surah')->references('id_surah')->on('tb_surah')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_surah');
    }
}
