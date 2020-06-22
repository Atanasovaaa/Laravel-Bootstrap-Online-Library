<div class="container footer-menu d-flex pt-5">
    <div class="row no-gutters">
        <div class="col-lg-4 col-md-6 text-center">
            <h3>Categories</h3>
            <hr>
            <div class="genre-wrapper">
                @foreach($genres as $genre )
                <a class="dropdown-item" href="{{ route('genres.show', ['genre' => $genre])}}">{{$genre->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-md-6 text-center">
            <h3>Latest Books</h3>
            <hr>
            <div class="books-wrapper">
                @foreach($latestBooks as $book )
                <a class="dropdown-item" href="{{ route('books.show', ['book' => $book])}}">{{$book->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4 col-md-12 text-center">
            <h3>Social Media</h3>
            <hr>
            <div class="social-wrapper text-center">
                <a href="#"><i class="fa fa-facebook-square fa-4x mr-1" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube-square fa-4x mr-1" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-pinterest-square fa-4x mr-1" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-snapchat-square fa-4x mr-1" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-twitter-square fa-4x mr-1" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
