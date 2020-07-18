<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(DrinkTypesTableSeeder::class);
        $this->call(IceTypesTableSeeder::class);
        $this->call(SizeTypesTableSeeder::class);
        $this->call(SugarTypesTableSeeder::class);
    }
}
