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
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker::create();

        User::create([
            'name' => 'robinho',
            'email' => 'robinhodemorais@gmail.com',
            'password' => Hash::make(123456)
        ]);

        foreach (range(1,5) as $i) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word)
            ]);
        }
    }
}