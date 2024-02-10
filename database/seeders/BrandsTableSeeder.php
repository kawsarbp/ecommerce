<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'kawsar ahmed',
            'email'=>'kawsargaming100@gmail.com',
            'password'=> Hash::make(12123123)
        ]);
        $faker = Factory::create();
        foreach (range(1,10) as $index){
            Brand::create([
                'brand_name'=>$faker->unique()->name,
                'brand_slug'=>str_replace(' ','-', $faker->unique()->name),
                'status'=> array_rand(['active'=>'active','inactive'=>'inactive']),
            ]);
        }
    }
}
