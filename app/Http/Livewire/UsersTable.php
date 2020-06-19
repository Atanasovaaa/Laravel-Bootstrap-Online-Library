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

    public $pagination = 10;
    public $search = '';

    public function render()
    {
        $user = User::with('favs')->find(Auth::user()->id);

        return view('livewire.users-table', [
            'books' => Book::orderBy('created_at', 'desc')->where('name', 'like',  "%$this->search%")->paginate($this->pagination),
            'user' => $user
        ]);
    }

    public function clearSearch()
    {
        $this->search = '';
    }
}
