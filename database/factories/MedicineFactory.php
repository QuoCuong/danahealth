<?php

use App\Supplier;
use App\MedicineGroup;
use Faker\Generator as Faker;

$factory->define(App\Medicine::class, function (Faker $faker) {
    $medicineGroupIds = MedicineGroup::where('parent_id', '!=', 0)->pluck('id');
    $supplierIds      = Supplier::pluck('id');

    return [
        'name'              => $faker->name,
        'description'       => $faker->text,
        'unit'              => $faker->randomElement(array('Hộp', 'Viên')),
        'quantity'          => $faker->numberBetween(10, 500),
        'price'             => $faker->randomNumber(6, false),
        'exp'               => $faker->dateTimeBetween('now', '+1 years'),
        'medicine_group_id' => $faker->randomElement($medicineGroupIds),
        'supplier_id'       => $faker->randomElement($supplierIds),
    ];
});
