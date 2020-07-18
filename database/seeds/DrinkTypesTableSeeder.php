<?php

use Illuminate\Database\Seeder;

class DrinkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\DrinkType::create([
            'drink_type_name' => 'Coffee'
        ]);
        \App\DrinkType::create([
            'drink_type_name' => 'Tea'
        ]);
        \App\DrinkType::create([
            'drink_type_name' => 'Milk Tea'
        ]);
        \App\DrinkType::create([
            'drink_type_name' => 'Chocolate'
        ]);
    }
}
