<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tạo bảng users trong database.
        Schema::create('users', function ($table) {
            $table->increments('id');//Tạo cột id là khóa chính và tự động tăng
            $table->string('USER');//Tạo cột USER có kiểu là varchar
            $table->string('EMAIL')->unique();//Tạo cột EMAIL có kiểu là varchar.
            $table->string('password');//Tạo cột password có kiểu là varchar
            $table->integer('ISADMIN');//tạo cột ISADMIN có kiểu integer.
            $table->rememberToken();//tạo cột remenber_token
            $table->timestamps();// tạo ra 2 cột update và delete.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('users');
    }
}
