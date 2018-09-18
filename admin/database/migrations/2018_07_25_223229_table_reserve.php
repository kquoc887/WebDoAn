<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableReserve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tạo bảng tên là reserve trong database
        Schema::create('reserve', function ($table) {
            $table->string('MADATCHO', 50);//Tạo cột MADATCHO CÓ KIEUR LÀ VARCHAR DỘ DÀI LÀ 50.
            $table->string('EMAIL', 100);//Tạo cột EMAIL CÓ KIEUR LÀ VARCHAR DỘ DÀI LÀ 100.
            $table->integer('MAPHIM')->unsigned();//TẠO CỘT MAPHIM là khóa ngoại có kiểu là int
            $table->integer('MARAP')->unsigned();//Tạo cột MARAP LÀ KHÓA NGOẠI CÓ KIỂU LÀ INT.
            $table->string('NGAYDAT', 10);//Tạo cột MADATCHO CÓ KIEUR LÀ VARCHAR DỘ DÀI LÀ 50.
            $table->string('GIODAT', 5);//Tạo cột MADATCHO CÓ KIEUR LÀ VARCHAR DỘ DÀI LÀ 50.
            $table->integer('MACOMBO')->unsigned();//TAO CỘT MACOMBO LÀ NGOẠI CÓ KIỂU INT.
            $table->integer('SOLUONG');//Tạo cột MADATCHO CÓ KIEUR LÀ VARCHAR DỘ DÀI LÀ 50.
            $table->primary('MADATCHO');//Tạo khóa chính là CỘT MADATCHO
            $table->foreign('MAPHIM')->references('MAPHIM')->on('movie')->onDelete('cascade');//tạo cột khóa ngoai MAPHIM tham chiếu đến khóa chinh MAPHIM bên bảng movie
            $table->foreign('MARAP')->references('MARAP')->on('rap')->onDelete('cascade');//tạo cột khóa ngoai MARAP tham chiếu đến khóa chinh MARAP bên bảng rap.
            $table->foreign('MACOMBO')->references('MACOMBO')->on('combo')->onDelete('cascade');///tạo cột khóa ngoai MACOMBO tham chiếu đến khóa chinh MACOMBO bên bảng combo.
            $table->timestamps();
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
        Schema::drop('reserve');
    }
}
