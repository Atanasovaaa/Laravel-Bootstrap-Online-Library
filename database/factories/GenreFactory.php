<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Genre;
use Faker\Generator as Faker;

$factory->define(Genre::class, function (Faker $faker) {

    return [
        'name' => $faker->unique()->randomElement([
            'Biography',
            'Fantasy',
            'Fiction',
            'Historical Fiction',
            'Humor and Comedy',
            'Mystery',
            'Novels',
            'Thirller'
        ])
    ];
});
