<?php

use App\Image;
use App\Medicine;
use App\MedicineDetail;
use Illuminate\Database\Seeder;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Medicine::class, 100)->create()->each(function ($medicine) {
            $medicine->medicineDetail()->save(factory(MedicineDetail::class)->make());
            $medicine->images()->save(factory(Image::class)->make());
            $medicine->images()->save(factory(Image::class)->make());
        });
    }
}
