<?php

use Faker\Generator as Faker;

$factory->define(App\MedicineDetail::class, function (Faker $faker) {
    return [
        'ingredients'      => $faker->text,
        'objects_used'     => $faker->text,
        'dosage_and_usage' => $faker->text,
        'preservation'     => $faker->text,
        'careful'          => $faker->text,
    ];
});
