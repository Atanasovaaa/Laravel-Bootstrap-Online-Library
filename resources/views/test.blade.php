@extends('layouts/app')

@section('graph-me')
<meta name="description" content="somecont">
@endsection


@section('content')

<h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia, ab.</h3>
@if ($name == 'jeff')
<h2>Lorem, ipsum dolor. <?= $name ?></h2>
@endif

@endsection
