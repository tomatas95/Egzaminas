<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Session;

class BookController extends Controller

{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterBook = $request->session()->get('filterBook', (object)['name' => null, 'author_id' => null]);

        $books = Book::with('author')
            ->filter($filterBook)
            ->orderBy('title')
            ->get();

        return view('books.index', [
            'books' => $books,
            'filterBook' => $filterBook,
        ]);
        // return view('books.index', compact('books'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = new Book($request->all());
    
        if ($book->save()) {
            Session::flash('message', __("A new Book has been created successfully!"));
            Session::flash('alert-class', 'alert-success');

            return redirect('/books');
        } else {
            return redirect('/books/create')->withErrors([__("An error occurred while creating the Book Listing")]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $authors = Author::all();    
        $book = Book::findOrFail($id);

        return view('books.edit', ['book' => $book], compact('authors'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        Session::flash('message', __("Book Listing deleted successfully!"));
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('books.index');
    }

    public function search(Request $request)
    {
        $filterBook = new \stdClass;
    
        if ($request->filled('name')) {
            $filterBook->name = $request->name;
        }
    
        if ($request->has('author_id')) {
            $filterBook->author_id = $request->author_id;
        }
    
        $request->session()->put('filterBook', $filterBook);
    
        return redirect()->route('books.index');
    }
}
