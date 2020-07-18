<?php

use Illuminate\Database\Seeder;

class SugarTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\SugarType::create([
            'sugar_type_name' => 'None'
        ]);
        \App\SugarType::create([
            'sugar_type_name' => 'Less'
        ]);
        \App\SugarType::create([
            'sugar_type_name' => 'Normal'
        ]);
        \App\SugarType::create([
            'sugar_type_name' => 'Extra'
        ]);
    }
}
