<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        $author = new Author($request->all());
    
        if ($author->save()) {
            Session::flash('message', __("A new Author has been created successfully!"));
            Session::flash('alert-class', 'alert-success');
            return redirect('/authors');
        } else {
            return redirect('/authors/create')->withErrors([__("An error occurred while creating the author")]);
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
        $author = Author::findOrFail($id);
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, $id)
    {
       
        $author = Author::findOrFail($id);
        $author->update($request->all());
    
        if ($author) {
            Session::flash('message', __("Author updated successfully!"));
            Session::flash('alert-class', 'alert-success');
            return redirect('/authors');
        } else {
            return redirect('/authors/edit')->withErrors([__("An error occurred while editting the Author")]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);        
        $author->delete();

        return redirect('/authors')->with('message', __("Author deleted successfully!"));
    }
}
