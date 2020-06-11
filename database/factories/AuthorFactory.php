<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'bio' => $faker->realText($faker->numberBetween(10, 50)),
        'image_url' => $faker->imageUrl(640, 480)
    ];
});
