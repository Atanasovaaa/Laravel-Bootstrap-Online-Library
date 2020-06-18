@extends('layouts.app')

@section('content')

<div class="container">
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
                <td scope="row">
                    <a href="{{ route('books.show', ['book' => $book]) }}">{{$book->name}}</a>
                </td>
                <td>{{$book->description}}</td>
                <td>
                    <a href="{{ route('authors.show', ['author' => $book->author]) }}">{{$book->author->name}}</a>
                </td>
                <td>
                    {{$book->genre->name}}
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
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
