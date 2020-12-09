<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PopulateTestingDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            [
               'name'=>'Thibault',
               'email'=>'prenat.thibault@gmail.com',
               'password'=>'123456'
            ]
            ]);

            $user_id=DB::table('users')->where('name', 'Thibault')->take(1)->value('id');

            for ($i=0; $i<5; $i++) {
                DB::table('post')->insert([
                   [
                      'title'=>'post testing '.$i,
                      'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed 
                                  do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                      'user_id'=>$user_id
                   ]
                ]);
             }
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user_id=DB::table('users')->where('name', 'Thibault')->take(1)->value('id');
        DB::table('post')->where('user_id', $user_id)->delete();
        DB::table('users')->where('name', '=', 'Thibault')->delete();
    }
}
