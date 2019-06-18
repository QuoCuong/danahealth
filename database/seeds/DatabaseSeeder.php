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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            AdminsTableSeeder::class,
            MedicineGroupsTableSeeder::class,
            SuppliersTableSeeder::class,
            MedicinesTableSeeder::class,
            CitiesTableSeeder::class,
            DistrictsTableSeeder::class,
        ]);
    }
}
