@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
        @foreach($books as $book)
        <div class="col mb-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters h-100">
                    <div class="col-md-4">
                        <img src="{{ asset('images/throne=of-glass.jpg') }}" class="card-img" alt="...">
                        <div class="btn-fav">
                            <i aria-data="{{$book->id}}" class="fa fa-heart{{ in_array($book->id, $user->favouriteBooks()) ? '' : '-o'}} fa-2x"></i>
                        </div>
                    </div>
                    <div class="col-md-8 d-block">
                        <div class="card-body">
                            <a href="{{ route('books.show', ['book' => $book]) }}">
                                <h5 class="card-title">{{$book->name}}</h5>
                            </a>
                            <p class="card-text">{{$book->description}}</p>
                        </div>

                    </div>
                </div>
                <div class="card-footer  align-bottom">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('hero-books')
<div class="jumbotron jumbotron-fluid hero-books">
    <div class="container">
        <h2 class="display-4">Books in {{$genre}} genre
        </h2>
        <hr>
        <p class="lead">“Books are a uniquely portable magic.” – Stephen King</p>
    </div>
</div>
@endsection

@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-fav i').hover(function() {
            $(this).toggleClass("fa-heart fa-heart-o");
        });

        $('.btn-fav i').click(function() {


            var payload = {
                id: $(this).attr("aria-data")
            };

            var data = new FormData();
            data.append("data", JSON.stringify(payload));

            fetch('/book/favouriteToggle', {
                    method: "POST"
                    , body: data
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then(function(res) {
                    location.reload();
                })
                .then(function(data) {})
        });
    });

</script>
@endsection
