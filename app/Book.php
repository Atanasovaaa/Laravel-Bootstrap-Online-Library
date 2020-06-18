<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public $fillable = ['name', 'description', 'image_url', 'user_id', 'author_id', 'genre_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favs()
    {
        return $this->belongsToMany(User::class, 'book_favourites');
    }
}
