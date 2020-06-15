@extends('layouts.app')

@section('content')
<div class="row px-3 no-gutters justify-content-around">
    <div class="col-lg-3 col-md-12 author-img">
        <img src="{{ asset('images/Hard-Cash-Valley.jpg') }}" alt="">
        <div class=" author-info text-center py-4">
            <p class="m-0 font-weight-bold">{{$author->name}}</p>
            <p class="m-0">{{$author->bio}}</p>
        </div>
    </div>
    <div class="col-12 d-lg-none d-sm-block bg-dark text-white mb-4">
        <h3 class="text-center pt-4">Books</h3>
        <hr style="margin-top: 0; width: 30%; background-color: #fff;">
    </div>
    <div class="col-lg-9 col-md-12 pl-lg-4">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3">
            @foreach($author->books as $book)
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


</div>
@endsection
