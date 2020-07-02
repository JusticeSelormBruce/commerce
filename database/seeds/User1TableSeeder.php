<?php

use App\User1;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User1::create(
           [
               'phone'=>Hash::make('0248284049'),
               'email'=>Hash::make('ewave80@gmail.com'),
               'user_id'=>1
           ]
       );
    }
}
