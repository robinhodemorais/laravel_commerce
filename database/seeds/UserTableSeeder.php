<?php

/**
 * Created by PhpStorm.
 * User: Robinho
 * Date: 01/07/2016
 * Time: 12:59
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
       // DB::table('users')->truncate();

        factory('CodeCommerce\User')->create([
            'name' => 'robinho',
            'email' => 'robinhodemorais@gmail.com',
            'password' => Hash::make(123456)
        ]);

        factory('CodeCommerce\User',10)->create();
    }
}