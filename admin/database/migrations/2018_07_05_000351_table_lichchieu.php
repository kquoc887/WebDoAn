<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLichchieu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('schedule', function ($table) {
            $table->integer('MAPHIM')->unsigned();//Tạo cột MAPHIM là khóa ngoại
            $table->string('NGAYCHIEU', 100);//TẠO cột NGAYCHIEU có kiểu là varchar
            $table->string('GIOCHIEU');//Tạo cột GIOCHIEU có kiểu là varchar.
            $table->integer('MARAP')->unsigned();//TẠO cột MARAP là khóa ngoại
            $table->integer('PRICE');//Tạo cột PRICE có kiểu là integer.
            $table ->primary (['MAPHIM', 'GIOCHIEU', 'MARAP']);//Tạo khóa chỉnh cho bảng gồm 3 cột MAPHIM,GIOCHIEU,MARAP
            $table->timestamps();//tao ra 2 cột update và delete
            $table->foreign('MAPHIM')->references('MAPHIM')->on('movie')->onDelete('cascade');//tạo khóa ngoại MAPHIM tham chiếu đến khóa chinh MAPIHM bên bảng movie
            $table->foreign('MARAP')->references('MARAP')->on('rap')->onDelete('cascade');// tạo khóa ngoại MARAP tham chiếu đến khóa chinh MARAP bên bảng rap.
            //onDelete('cascade')->dùng để bắt khi xóa khóa chính thì những phim có khóa ngoại kham chiếu đến khóa chính đó nó cũng sẽ tự xóa.
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
        Schema::dropIfExists('schedule');
    }
}
