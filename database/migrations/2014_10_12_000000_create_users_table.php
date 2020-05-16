<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hafalan', function (Blueprint $table) {
            $table->Increments('id_hafalan');
            $table->datetime('waktu_hafalan');
            $table->integer('id_user')->unsigned()->index();
            $table->integer('id_santri')->unsigned()->index();
            $table->integer('id_surah')->unsigned()->index();
            $table->integer('id_target')->unsigned()->index();
            $table->enum('tajwid',['Sangat Baik','Baik','Cukup','null']);
            $table->enum('ket_hafalan',['Pekan Pertama','Pekan Kedua','Pekan Ketiga','Pekan Keempat','null']);
            $table->enum('status_hafalan',['Tercapai','Belum Tercapai']);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id_user');
            $table->string('name');
            $table->string('email');
            $table->integer('level')->unsigned()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles',function (Blueprint $table){
            $table->Increments('id');
            $table->string('namaRule');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('level')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('tb_hafalan', function (Blueprint $table){
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hafalan');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
