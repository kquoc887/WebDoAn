<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tạo bảng category trong database
        Schema::create('category',function ($table){
           $table->increments('MALOAIPHIM');//Tạo cột MALOAIPHIM là khóa chính và tự động tăng
           $table->string('TENLOAIPHIM',200);//Tạo cột TEENLOAIPHIM có kiểu là varchar với lenght 200.
           $table->timestamps();//Tạo ra 2 cột update và delete.
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
        Schema::dropIfExists('category');
    }
}
