@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center pb-3">{{$book->name}}</h2>
    <div class="card">
        <div class="row no-gutters">
            <div class="col-auto">
                <img src="{{ asset('images/throne=of-glass.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col d-flex  p-4">
                <div class="col-8 card-block">
                    <h3>Description</h3>
                    <p class="card-text ">{{$book->description}}</p>
                </div>
                <div class="col-4 card-block">
                    <h3>Author</h3>
                    <p>{{$book->author->name}}</p>
                </div>
            </div>
        </div>
        <div class="card-footer w-100 text-muted">
            Last updated 3 mins ago
        </div>
    </div>
</div>

@endsection
