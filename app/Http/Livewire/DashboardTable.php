<?php

namespace App\Http\Livewire;

use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class DashboardTable extends Component
{

    use WithPagination;

    public $pagination = 12;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.dashboard-table', [
            'books' => Book::orderBy('created_at', 'desc')->where('name', 'like',  "%$this->search%")->paginate($this->pagination)
        ]);
    }

    public function clearSearch()
    {
        $this->search = '';
    }
}
