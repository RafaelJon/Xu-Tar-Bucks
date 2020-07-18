<?php

use Illuminate\Database\Seeder;

class IceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\IceType::create([
            'ice_type_name' => 'None'
        ]);
        \App\IceType::create([
            'ice_type_name' => 'Normal'
        ]);
        \App\IceType::create([
            'ice_type_name' => 'Super'
        ]);
    }
}
