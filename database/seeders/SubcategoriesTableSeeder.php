<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            $name = $faker->unique()->name;
            Subcategory::create([
                'user_id' => 1,
                'category_id'=> rand(1,10),
                'name' => $name,
                'slug' => str_replace(' ', '-', $name),
                'status' => array_rand(['active' => 'active', 'inactive' => 'inactive']),
            ]);
        }
    }
}
