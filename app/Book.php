<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public $fillable = ['name', 'description', 'image_url', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_book');
    }
}
