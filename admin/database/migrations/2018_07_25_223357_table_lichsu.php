<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableLichsu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tạo bảng có tên là lichsu trong database.
        Schema::create('lichsu', function ($table) {
            $table->integer('id')->unsigned();//tạo cột id là khóa ngoại để kham chiếu đến khóa chinh bên bảng user.
            $table->string('MADATCHO', 50);//tạo cột MADATCHO là khóa ngoại có kiểu là varchar độ dài là 50
            $table->primary(['MADATCHO', 'id']);//tạo khóa chính cho bảng với 2 cột MADATCHO và id.
            $table->foreign('MADATCHO')->references('MADATCHO')->on('reserve')->onDelete('cascade');//tạo khóa ngoại MADATCHO tham chiếu đến khóa chính MADATCHO ben bang resever.
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');//tạo khóa ngoại id tham chiếu đến khóa chinh id bên bảng users.
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
        Schema::drop('lichsu');
    }
}
