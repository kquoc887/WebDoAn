<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableRap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tạo bảng có tên là rap trong database
        Schema::create('rap', function ($table) {
           $table->increments('MARAP');//Tạo cột MARAP là khóa chính và tự động tăng.
           $table->string('TENRAP', 100);//tạo cột TENRAP có kiểu là varchar
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
        Schema::dropIfExists('rap');
    }
}
