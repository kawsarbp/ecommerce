<?php

namespace Database\Seeders;

use App\Models\Slider;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 5) as $index) {
            Slider::create([
                'user_id' => 1,
                'title' => $faker->unique()->title,
                'sub_title' => $faker->unique()->paragraph,
                'photo' => $faker->imageUrl,
                'url' => $faker->url,
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'status' => array_rand(['active' => 'active', 'inactive' => 'inactive']),
            ]);
        }
    }
}
