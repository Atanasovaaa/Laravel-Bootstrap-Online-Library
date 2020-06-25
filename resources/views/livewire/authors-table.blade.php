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
                <option value="5">5</option>
                <option value="10">10</option>
            </select>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Author Name</th>
                    <th scope="col">Bio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                <tr>
                    <td scope="row" class="author-name">
                        <a href="{{ route('authors.show', ['author' => $author]) }}">{{$author->name}}</a>
                    </td>
                    <td>{{$author->bio}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="col-12 d-sm-block d-md-block d-lg-inline-flex d-xl-inline-flex py-4">
            <div class="col-lg-4 col-md-12 col-sm-12 "></div>
            <div class="col-lg-4 col-md-12 col-sm-12 pagination-blocks">
                {{ $authors->links() }}
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 text-center pt-1">
                Showing {{ $authors->firstItem() }} to {{ $authors->lastItem() }} out of {{ $authors->total() }}
            </div>
        </div>
    </div>
</div>
