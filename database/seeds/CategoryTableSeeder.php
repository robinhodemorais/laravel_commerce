<?php

/**
 * Created by PhpStorm.
 * User: Robinho
 * Date: 01/07/2016
 * Time: 12:59
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        //DB::table('categories')->truncate();

        factory('CodeCommerce\Category',10)->create();
    }
}