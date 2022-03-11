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
            "name" => "Bakery"
        ]);

        DB::table("categories")->insert([
            "name" => "Beverages"
        ]);

        DB::table("categories")->insert([
            "name" => "Canned goods"
        ]);

        DB::table("categories")->insert([
            "name" => "Dairy"
        ]);

        DB::table("categories")->insert([
            "name" => "Dry/baking goods"
        ]);

        DB::table("categories")->insert([
            "name" => "Frozen foods"
        ]);

        DB::table("categories")->insert([
            "name" => "Meat"
        ]);

        DB::table("categories")->insert([
            "name" => "Produce"
        ]);

        DB::table("categories")->insert([
            "name" => "Other"
        ]);
    }
}
