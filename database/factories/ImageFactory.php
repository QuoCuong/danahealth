<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(App\Image::class, function (Faker $faker) {
    $images = Storage::disk('web')->allFiles('images/product');

    return [
        'path' => $images[rand(0, count($images) - 1)],
    ];
});
