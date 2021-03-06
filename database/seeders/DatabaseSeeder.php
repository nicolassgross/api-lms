<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->seed(1234);
        $factory = \Illuminate\Database\Eloquent\Factory::construct($faker);
        
        return $factory->of(\App\Models\Courses::class)->create(10);    
    }
}
