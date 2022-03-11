<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroceriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            "category_name" => "Bakery"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Beverages"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Canned goods"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Dairy"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Dry/baking goods"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Frozen foods"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Meat"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Produce"
        ]);

        DB::table("categories")->insert([
            "category_name" => "Other"
        ]);
    }
}
