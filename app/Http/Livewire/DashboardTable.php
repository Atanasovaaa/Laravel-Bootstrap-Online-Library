<?php

namespace App\Http\Livewire;

use App\Book;
use Livewire\Component;
use Livewire\WithPagination;


class DashboardTable extends Component
{

    use WithPagination;

    public $pagination = 10;
    public $search = '';

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
