<div>
    <h2 class="text-center p-4">ADMIN DASHBOARD</h2>
    <div class="row p-lg-4 p-md-4 p-sm-0">
        <div class="col-12 create-action d-sm-block d-md-inline-flex d-lg-inline-flex d-xl-inline-flex text-center p-md-0">
            <div class="col-lg-5 col-md-4 col-sm-12 my-2">
                <input type="text" class="form-control" placeholder="Search Book By Name" wire:model='search'>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 my-2">
                <button class="btn btn-danger w-100" wire:click='clearSearch'>Clear</button>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 my-4 my-md-2"><a href="/books/create">
                    <button type="button" class="btn btn-success w-100">Create New Book
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </a>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 my-4 my-md-2"><select class="custom-select" wire:model='pagination' id="">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Book Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td scope="row">
                        <a href="{{ route('books.show', ['book' => $book]) }}">{{$book->name}}</a>
                    </td>
                    <td>{{$book->description}}</td>
                    <td>
                        <a href="{{ route('authors.show', ['author' => $book->author]) }}">{{$book->author->name}}</a>
                    </td>
                    <td>
                        <a href="{{ route('genres.show', ['genre'=> $book->genre]) }}">{{$book->genre->name}}</a>
                    </td>
                    <td class="btn-actions">
                        <a href="{{route('books.edit', ['book' => $book])}}">
                            <button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                        <button type="button" class="btn btn-danger"><i aria-data="{{$book->id}}" class="fa fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
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
</div>
