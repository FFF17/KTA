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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jk');    
            $table->string('provinsi');    
            $table->string('kabupaten');    
            $table->string('kecamatan');    
            $table->string('kelurahan');    
            $table->string('alamat');    
            $table->string('status');    
            $table->string('telepon');    
            $table->string('email')->unique();
            $table->string('foto');
            $table->string('password');
            $table->string('generate_code');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
