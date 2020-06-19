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
    <livewire:dashboard-table />
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
    });

</script>
@endsection
