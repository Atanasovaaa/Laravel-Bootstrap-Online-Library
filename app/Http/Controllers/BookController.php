<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Genre;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use function GuzzleHttp\Promise\all;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin', ['only' => ['create', 'destroy']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = User::with('favs')->find(Auth::user()->id);
        $books = Book::with('genre')->get();

        return view('book.show', compact('books', 'user'));
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
        // dd($request->all());

        $book = new Book();
        $book->name = $request->input('name');
        $book->description = $request->input('description');
        $book->isFavourite = false;
        $book->genre_id = $request->input('genre');
        $book->author_id = $request->input('author');
        $book->save();

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
        $tempBook = Book::with('favs')->find($book->id);
        $tempBook->favs()->detach();
        $tempBook->delete();

        return response('200');
    }


    public function favourites()
    {
        $user = User::with('favs')->find(Auth::user()->id);

        $favBooks = $user->favs;


        return view('book.favourites', [
            'books' => $favBooks,
            'user' => $user
        ]);
    }

    public function toggleFavourites(Request $request)
    {
        if ($request->has('data')) {
            $data = json_decode($request->input('data'));

            $user = User::find(Auth::user()->id);
            if (in_array($data->id, $user->favouriteBooks())) {
                $user->favs()->detach($data->id);
            } else {
                $user->favs()->attach($data->id);
            }

            $user->save();

            // $book = Book::find($data->id);
            // $book->isFavourite = !$book->isFavourite;
            // $book->save();

            return response('200');
        }
        return response('404');
    }
}
