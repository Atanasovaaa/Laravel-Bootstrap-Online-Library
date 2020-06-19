<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Genre;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Genre::class, function (Faker $faker) {

    $genre = $faker->unique()->randomElement([
        'Biography',
        'Fantasy',
        'Fiction',
        'Historical Fiction',
        'Humor and Comedy',
        'Mystery',
        'Novels',
        'Thirller'
    ]);

    return [
        'name' => $genre,
        'slug' => Str::slug($genre, '-'),
    ];
});
