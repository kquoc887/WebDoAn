<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableMovie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tạo bảng movie trong database
        Schema::create('movie', function ($table) {
           $table->increments('MAPHIM');//Tạo cột MAPHIM là khóa chính và tự động tăng
           $table->string('TENPHIM', 100);//Tạo cột TENPHIM có kiểu là varchar với độ dài là 100.
           $table->string('THOILUONG', 200);//Tạo cột THOILUONG có kiểu là varchar với độ dài là 200.
           $table->string('DAODIEN', 100);//Tạo cột DAODIEN có kiểu là varchar với độ dài là 100.
           $table->string('DIENVIEN', 100);//Tạo cột DIENVIEN có kiểu là varchar với độ dài là 100.
           $table->integer('MALOAIPHIM')->unsigned();//Tạo cột MALOAIPHIM là khóa ngoại để tham chiếu đến bảng category.
           $table->string('NUOC', 100);//Tạo cột TENPHIM có kiểu là varchar với độ dài là 200.
           $table->string('MIEUTA', 100)->collate('utf8_unicode_ci');//Tạo cột MIEUTA có kiểu là varchar với độ dài là 100.
           $table->string('NGAYBDCHIEU', 10);//Tạo cột NGAYBDCHIEU có kiểu là varchar
           $table->string('URL', 100);//Tạo cột URL có kiểu là varchar
           $table->text('IMAGE');// tao cột IMAGE có kiểu là TEXT
           $table->tinyInteger('ISSLIDE');
           $table->foreign('MALOAIPHIM')->references('MALOAIPHIM')->on('category')->onDelete('cascade');//Tạo khóa ngoại MALOAIPHIM để than chiếu đến khóa chinh là MALOAIPHIM bên bảng category.
            //onDelete('cascade')->dùng để bắt khi xóa khóa chính thì những phim có khóa ngoại kham chiếu đến khóa chính đó nó cũng sẽ tự xóa.
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
        Schema::dropIfExists('moive');
    }
}
