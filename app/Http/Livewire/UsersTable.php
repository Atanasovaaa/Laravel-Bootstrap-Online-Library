<?php

namespace App\Http\Livewire;

use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $pagination = 12;
    public $search = '';
    public $genre;


    public function mount($genre = null)
    {
        $this->genre = $genre;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = User::with('favs')->find(Auth::user()->id);
        $query = Book::orderBy('created_at', 'desc')->where('name', 'like',  "%$this->search%");
        if ($this->genre != null) {
            $query->where('genre_id', $this->genre->id);
        }

        return view('livewire.users-table', [
            'books' => $query->paginate($this->pagination),
            'user' => $user
        ]);
    }

    public function clearSearch()
    {
        $this->search = '';
    }
}
