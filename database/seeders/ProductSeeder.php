<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            $name = $faker->unique()->sentence;
            Product::create([
                'user_id' => 1,
                'category_id' => rand(1,10),
                'subcategory_id' => rand(1,10),
                'brand_id' => rand(1,10),
                'name' => $name,
                'slug' => str_replace(' ','-',$name),
                'model' => $faker->name,
                'buying_price' => rand(700,900),
                'selling_price' => rand(1000,1200),
                'special_price' => rand(500,600),
                'special_start' => $faker->date,
                'special_end' => $faker->date,
                'quantity' => rand(10,30),
                'video_url' => '',
                'warranty' => 0,
                'warranty_duration' => $faker->date,
                'warranty_conditions' => $faker->date,
                'thumbnail' => $faker->imageUrl,
                'gallery' => $faker->imageUrl,
                'description' => $faker->sentence,
                'long_description' => $faker->text,
                'status' => array_rand(['active' => 'active', 'inactive' => 'inactive']),
            ]);
        }
    }
}
