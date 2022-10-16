<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $addCategory = new Category();
        $addCategory->category_name = 'T-shirt';
        $addCategory->save();

        $addCategory = new Category();
        $addCategory->category_name = 'sweater';
        $addCategory->save();

        $addCategory = new Category();
        $addCategory->category_name = 'jacket';
        $addCategory->save();

        $addCategory = new Category();
        $addCategory->category_name = 'coat';
        $addCategory->save();

        $addCategory = new Category();
        $addCategory->category_name = 'jeans';
        $addCategory->save();

        $addCategory = new Category();
        $addCategory->category_name = 'socks';
        $addCategory->save();

        $addCategory = new Category();
        $addCategory->category_name = 'shorts';
        $addCategory->save();

        $addCategory = new Category(); 
        $addCategory->category_name = 'tracksuit';
        $addCategory->save();
    }
}
