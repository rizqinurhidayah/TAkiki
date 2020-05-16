<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTargetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_target', function (Blueprint $table) {
            $table->Increments('id_target');
            $table->integer('id_surah')->unsigned()->index();
            $table->string('ayat');
            $table->timestamps();
        });
        // Schema::table('tb_hafalan', function (Blueprint $table){
        //     $table->foreign('id_target')->references('id_target')->on('tb_target')->onDelete('cascade')->onUpdate('cascade');
        // });
        Schema::table('tb_target', function (Blueprint $table){
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
        Schema::dropIfExists('tb_target');
    }
}
