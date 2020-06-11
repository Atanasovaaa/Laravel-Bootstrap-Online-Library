@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table">
        <thead>
            <th scope="col">Book Name</th>
            <th scope="col">Description</th>
            <th scope="col">Author Name</th>
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
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection

@section('title', 'Online Library')
