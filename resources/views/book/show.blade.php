@extends('layouts.app')

@section('content')

<div class="container">
    <livewire:users-table />
</div>
@endsection

@section('hero-books')
<div class="jumbotron jumbotron-fluid hero-books">
    <div class="container">
        <h2 class="display-4">ALL BOOKS
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
