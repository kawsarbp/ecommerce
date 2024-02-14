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
        foreach (range(1, 10) as $index) {
            Slider::create([
                'user_id' => 1,
                'title' => $faker->unique()->name,
                'sub_title' => $faker->unique()->paragraph,
                'photo' => $faker->imageUrl,
                'url' => $faker->url,
                'start_date' => date('Y-m-d'),
                'end_date' => date('Y-m-d',strtotime('+1 month')),
                'status' => 'active',
            ]);
        }
    }
}
