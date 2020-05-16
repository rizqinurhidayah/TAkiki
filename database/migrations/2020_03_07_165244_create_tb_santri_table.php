<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_santri', function (Blueprint $table) {
            $table->Increments('id_santri');
            $table->string('nidn_santri')->unique();
            $table->string('nama_santri');
            $table->string('tempat_lahir_santri');
            $table->date('tanggal_lahir_santri');
            $table->enum('jenis_kelamin_santri',['P','L']);
            $table->string('alamat_santri');
            $table->string('kelas_santri');
            $table->string('foto');
            $table->enum('status_santri',['Aktif','Tidak Aktif']);
            $table->timestamps();
        });
        Schema::table('tb_hafalan', function (Blueprint $table){
            $table->foreign('id_santri')->references('id_santri')->on('tb_santri')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('tb_ortu', function (Blueprint $table){
            $table->foreign('id_santri')->references('id_santri')->on('tb_santri')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_santri');
    }
}
