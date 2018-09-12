<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableDatchovaghe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tạo bảng tên là datchovaghe trong database
        Schema::create('datchovaghe',function ($table){
            $table->string('MADATCHO',50);//Tạo cột MADATCHO là khóa ngoại
            $table->string('GHE',5);//Tạo cột GHE kiêu varchar có độ dài
            $table->primary(['MADATCHO','GHE']);//tạo khóa chỉnh cho bảng với 2 cột MADATCHO,GHE
            $table->foreign('MADATCHO')->references('MADATCHO')->on('reserve')->onDelete('cascade');//Tạo khóa ngoại MADAT tham chiếu dến khóa chinh MADATCHO bên bảng resever.
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
        Schema::drop('datchovaghe');
    }
}
