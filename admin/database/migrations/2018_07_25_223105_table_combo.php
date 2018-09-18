<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableCombo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tạo bảng có tên là combo trong database.
        Schema::create('combo', function ($table) {
            $table->increments('MACOMBO');//Tạo cột MACOMBO là khóa chinh và tự động tăng
            $table->string('TENCOMBO', 200);//Tạo cột TENCOMBO có kiểu là varchar độ dài là 200
            $table->integer('GIACOMBO');//Tạo cột GIACOMBO có kiểu là int
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
        //
        Schema::drop('combo');
    }
}
