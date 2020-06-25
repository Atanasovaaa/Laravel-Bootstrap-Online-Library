<?php

namespace App\Http\Livewire;

use App\Author;
use Livewire\Component;
use Livewire\WithPagination;


class AuthorsTable extends Component
{
    use WithPagination;

    public $pagination = 5;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.authors-table', [
            'authors' => Author::orderBy('name', 'asc')->where('name', 'like',  "%$this->search%")->paginate($this->pagination)
        ]);
    }
    public function clearSearch()
    {
        $this->search = '';
    }
}
