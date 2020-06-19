<?php

use App\Author;
use App\Book;
use App\Genre;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();
        factory(Author::class, 10)->create();
        factory(Genre::class, 8)->create();
        factory(Book::class, 200)->create();
    }
}
