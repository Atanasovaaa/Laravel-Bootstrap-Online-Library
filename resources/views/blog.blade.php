@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <th scope="col">Book Name</th>
                <th scope="col">Description</th>
                <th scope="col">Author Name</th>
                <th scope="col">Genre</th>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td scope="row" class="book-name">
                        <a href="{{ route('books.show', ['book' => $book]) }}">{{$book->name}}</a>
                    </td>
                    <td>{{$book->description}}</td>
                    <td class="author-name">
                        <a href="{{ route('authors.show', ['author' => $book->author]) }}">{{$book->author->name}}</a>
                    </td>
                    <td class="genre-name">
                        <a href="{{route('genres.show', ['genre' => $book->genre->slug])}}">{{$book->genre->name}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <div class="col-12 d-sm-block d-md-block d-lg-inline-flex d-xl-inline-flex py-4">
        <div class="col-lg-4 col-md-12 col-sm-12 "></div>
        <div class="col-lg-4 col-md-12 col-sm-12 pagination-blocks">
            {{ $books->links() }}
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 text-center pt-1">
            Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} out of {{ $books->total() }}
        </div>
    </div>
</div>

@endsection

@section('hero')
<div class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h2 class="display-4">A BOOK IS A DREAM THAT YOU HOLD IN YOUR HAND.
        </h2>
        <hr>
        <p class="lead">“The books that the world calls immoral are books that show the world its own shame.” – Oscar Wilde</p>
    </div>
</div>
@endsection

@section('title', 'Online Library')
