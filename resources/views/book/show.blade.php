@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
        @foreach($books as $book)
        <div class="col mb-4">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('images/throne=of-glass.jpg') }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$book->name}}</h5>
                            <p class="card-text">{{$book->description}}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
