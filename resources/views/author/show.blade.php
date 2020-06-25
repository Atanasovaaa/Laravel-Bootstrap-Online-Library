@extends('layouts.app')

@section('content')

<div class="container">
    <div class="author-books text-center">
        <h3>AUTHOR BOOKS</h3>
    </div>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <th scope="col">№</th>
                <th scope="col">Book Name</th>
                <th scope="col">Description</th>
                <th scope="col">Genre</th>
            </thead>
            <tbody>
                <?php 
                $i = 1;
            ?>
                @foreach($books as $book)
                <tr>
                    <td>{{$i++}}</td>
                    <td scope="row" class="book-name">
                        <a href="{{ route('books.show', ['book' => $book]) }}">{{$book->name}}</a>
                    </td>
                    <td>{{$book->description}}</td>
                    <td class="genre-name">
                        <a href="{{ route('genres.show', ['genre' => $book->genre->slug])}}"> {{$book->genre->name}}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection

@section('hero-author-books')
<div class="jumbotron jumbotron-fluid hero-books">
    <div class="container">
        <h2 class="display-4">{{$author->name}}
        </h2>
        <hr>
        <p class="lead">{{$author->bio}}</p>
    </div>
</div>
@endsection
