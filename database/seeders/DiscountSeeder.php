<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hardcoded discounts
        DB::table('discounts')->insert([
            'discount' => '5'
        ]);
        DB::table('discounts')->insert([
            'discount' => '10'
        ]);
        DB::table('discounts')->insert([
            'discount' => '15'
        ]);
        DB::table('discounts')->insert([
            'discount' => '20'
        ]);
        DB::table('discounts')->insert([
            'discount' => '25'
        ]);
        DB::table('discounts')->insert([
            'discount' => '30'
        ]);
        DB::table('discounts')->insert([
            'discount' => '35'
        ]);
        DB::table('discounts')->insert([
            'discount' => '40'
        ]);
        DB::table('discounts')->insert([
            'discount' => '45'
        ]);
        DB::table('discounts')->insert([
            'discount' => '50'
        ]);
    }
}
