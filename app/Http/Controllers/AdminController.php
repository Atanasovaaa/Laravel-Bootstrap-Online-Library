<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $books = Book::all();
        return view('admin.index', compact('books'));
    }
}
