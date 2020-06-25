@extends('layouts.app')

@section('content')

<div class="container">
    <livewire:authors-table />
</div>
@endsection

@section('hero-authors')
<div class="jumbotron jumbotron-fluid hero-books">
    <div class="container">
        <h2 class="display-4">ALL AUTHORS
        </h2>
        <hr>
        <p class="lead">“Books are a uniquely portable magic.” – Stephen King</p>
    </div>
</div>
@endsection
