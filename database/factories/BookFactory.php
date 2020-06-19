<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Book::class, function (Faker $faker) {
    $bookName = $faker->name();
    return [
        'name' => $bookName,
        'slug' => Str::slug($bookName, '-'),
        'description' => $faker->realText($faker->numberBetween(50, 100)),
        'image_url' => $faker->imageUrl(150, 80),
        'author_id' => $faker->randomDigitNotNull(),
        'genre_id' => rand(1, 8),
        'user_id' =>  rand(1, 5)
    ];
});
