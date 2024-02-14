<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            $name = $faker->unique()->name;
            Category::create([
                'user_id' => 1,
                'name' => $name,
                'slug' => str_replace(' ', '-', $name),
                'status' => 'active',
            ]);
        }
    }
}
