@extends('layouts.app')

@section('content')

@if (\Session::has('success'))
<div class="alert alert-success text-center">
    <ul class="list-group" style="list-style:none;">
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

<div class="container">
    <div class="row pb-4 pl-3">
        <a href="/books/create">
            <button type="button" class="btn btn-success">Create New Book <i class="fa fa-plus" aria-hidden="true"></i></button></a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Book Name</th>
                <th scope="col">Description</th>
                <th scope="col">Author Name</th>
                <th scope="col">Genre</th>
                <th scope="col">Actions</th>
            </tr>
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
                    <a href="{{ route('genres.show', ['genre'=> $book->genre]) }}">{{$book->genre->name}}</a>
                </td>
                <td class="btn-actions">
                    <a href="{{route('books.edit', ['book' => $book])}}">
                        <button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                    {{-- <button type="button" class="btn btn-warning"><i aria-data="{{$book->id}}" class="fa fa-pencil"></i></button> --}}
                    <button type="button" class="btn btn-danger"><i aria-data="{{$book->id}}" class="fa fa-trash"></i></button>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection


@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('.btn-danger i').click(function() {


            var payload = {
                id: $(this).attr("aria-data")
            };

            var data = new FormData();
            data.append("data", JSON.stringify(payload));
            console.log(payload);
            fetch('/books/' + $(this).attr("aria-data"), {
                    method: "DELETE"
                    , body: data
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(function(res) {
                    location.reload()
                })
                .then(function(data) {})
        });
        $('.btn-warning i').click(function() {


            var payload = {
                id: $(this).attr("aria-data")
            };

            var data = new FormData();
            data.append("data", JSON.stringify(payload));
            console.log(payload);
            fetch('/books/' + $(this).attr("aria-data") + '/edit', {
                    method: "GET"

                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(function(res) {
                    location.reload()
                })
                .then(function(data) {})
        });
    });

</script>
@endsection
