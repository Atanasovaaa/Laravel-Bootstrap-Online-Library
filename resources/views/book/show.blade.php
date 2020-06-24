@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center pb-3">{{$book->name}}</h2>
    <div class="card">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img src="{{ asset('images/throne=of-glass.jpg') }}" class="img-fluid w-100" alt="">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 d-lg-flex d-md-flex d-sm-inline-block p-4">
                <div class="col-lg-6 col-md-6 col-sm-12 card-block">
                    <h3 class="pt-3 pb-1 font-italic">Description</h3>
                    <p class="card-text ">{{$book->description}}</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 card-block">
                    <h3 class="pt-3 pb-1 font-italic">Author</h3>
                    <p>{{$book->author->name}}</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 card-block">
                    <h3 class="pt-3 pb-1 font-italic">Genre</h3>
                    <p>{{$book->genre->name}}</p>
                </div>
            </div>
        </div>
        <div class="card-footer w-100 text-muted">
            Last updated 3 mins ago
        </div>
    </div>
</div>

@endsection
