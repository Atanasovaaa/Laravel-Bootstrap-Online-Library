<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $books = Book::with('genres')->get();

        // $books = Book::all()->random(10);
        // dd($books);
        return view('book.show', compact('books'));
        // return view('blog', [
        //     'zelenchuk' => $books
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('book.create', [
            'genres' => $genres,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input('genres'));
        $book = new Book();
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->author_id = 1;
        $book->save();
        $book->genres()->attach($request->input('genres'));


        return redirect()->back()->with('success', 'The Book was create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view("book.index", [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
