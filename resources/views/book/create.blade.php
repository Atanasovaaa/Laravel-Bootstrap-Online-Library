@extends('layouts.app')

@section('content')

{{-- @dd($authors) --}}


@if (\Session::has('success'))
<div class="alert alert-success text-center">
    <ul class="list-group" style="list-style:none;">
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

<div class=" container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Book') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('books.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Book Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="email"></textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <select multiple="multiple" name="genres[]" id="genres">
                            @foreach($genres as $key => $genre)

                            <option value="{{$key+1}}">{{$genre->name}}</option>

                            @endforeach
                        </select>

                        {{-- <select multiple="multiple" name="genres[]" id="genres">
                            @foreach($genres as $key => $genre)
                            @foreach($book->genres as $currentBookKey => $currentBook)
                            <option value="{{$key}}" @if($key==$cuurentBookKey)selected="selected" @endif>{{$genre->name}}</option>
                        @endforeach
                        @endforeach
                        </select> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>












{{-- <div class="container">
    <form>
        <div class="form-group">
            <label for="bookName">Book Name</label>
            <input type="text" class="form-control" id="bookName" placeholder="Book Name ">
        </div>
    </form>
</div> --}}

@endsection
