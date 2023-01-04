<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

//Faker
use Faker\Factory as Faker;
//use Faker\Provider\en_US\Person;
use Faker\Provider\en_US\Addres;
use Faker\Provider\en_US\PhoneNumber;
use Faker\Provider\en_US\Internet;
use Faker\Provider\en_US\DateTime;

use App\Models\Category;
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

        $category = Category::factory()->count(6)->create();
    }
}
