<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(categorySeeder::class);
        //$this->call(movieSeeder::class);
        $this->call(abc::class);
    }

}

class categorySeeder extends Seeder
{
    public function run()
    {
        DB::table('category')->insert([
            ['TENLOAIPHIM' => "Phim hành động"],
            ['TENLOAIPHIM' => "Phim hài"],
            ['TENLOAIPHIM' => "Phim hoạt hình"], 
            ['TENLOAIPHIM' => "Phim cảm động"]
        ]);
    }

}

class movieSeeder extends Seeder
{
    public function run()
    {
        DB::table('movie')->insert([
            ['TENPHIM' => "Phim 1", 
            'THOILUONG' => '100', 
            'DAODIEM' => 'Đạo Diễn 1', 
            'DIENVIEN' => 'Diễn Viên 1', 
            'FK_MALOAIPHIM' => 1, 
            'NUOC' => 'Việt Nam', 
            'MIEUTA' => 'Phim 1 là phim hành dộng', 
            'NGAYCHIEU' => '30/6/2018', 
            'URL' => '#',
            ], [
            'TENPHIM' => "Phim 2", 
            'THOILUONG' => '100', 
            'DAODIEM' => 'Đạo Diễn 2', 
            'DIENVIEN' => 'Diễn Viên 2', 
            'FK_MALOAIPHIM' => 2, 
            'NUOC' => 'Mỹ', 
            'MIEUTA' => 'Phim 2 là phim hài', 
            'NGAYCHIEU' => '30/6/2018', 
            'URL' => '#',
            ],
        ]);
    }

}
