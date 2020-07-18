<?php

use Illuminate\Database\Seeder;

class SizeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\SizeType::create([
            'size_type_name' => 'Small',
            'price_extra' => 0
        ]);
        \App\SizeType::create([
            'size_type_name' => 'Medium',
            'price_extra' => 4000
        ]);
        \App\SizeType::create([
            'size_type_name' => 'Large',
            'price_extra' => 9000
        ]);
    }
}
