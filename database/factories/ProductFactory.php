<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image_url' => $faker->image(storage_path('images'),640,480, null, false),
    ];
});