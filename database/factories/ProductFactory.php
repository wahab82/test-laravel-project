<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image_url' => Str::random(20),
    ];
});