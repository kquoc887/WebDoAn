<?php

use Illuminate\Database\Seeder;

class abc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['USER'=>'Dat','EMAIL'=>'abc@gmail.com','PASSWORD'=>bcrypt('123456'), 'ISADMIN'=>1]);
    }
}
