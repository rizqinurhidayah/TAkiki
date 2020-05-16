<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbOrtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ortu', function (Blueprint $table) {
            $table->Increments('id_ortu');
            $table->integer('id_santri')->unsigned()->index();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ortu');
            $table->string('alamat_ortu');
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
        Schema::dropIfExists('tb_ortu');
    }
}
