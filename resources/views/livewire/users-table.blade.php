<div>
    <h2 class="text-center">Search</h2>
    <div class="col-12 search d-sm-block d-md-inline-flex d-lg-inline-flex d-xl-inline-flex text-center pb-5">
        <div class="col-lg-8 col-md-8 col-sm-12 my-2">
            <input type="text" class="form-control" placeholder="Search Book By Name" wire:model='search'>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 my-2">
            <button class="btn btn-danger w-100" wire:click='clearSearch'>Clear</button>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 my-4 my-md-2"><select class="custom-select" wire:model='pagination' id="">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
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
    <div class="col-12 d-sm-block d-md-block d-lg-inline-flex d-xl-inline-flex py-4">
        <div class="col-lg-4 col-md-12 col-sm-12 "></div>
        <div class="col-lg-4 col-md-12 col-sm-12 pagination-blocks">
            {{ $books->links() }}
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 text-center pt-1">
            Showing {{ $books->firstItem() }} to {{ $books->lastItem() }} out of {{ $books->total() }}
        </div>
    </div>
</div>
