<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::orderBy('id','DESC')->paginate(8);
        return view('book.index',\compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required'
        ]);

        if($request->file) $file=\docStatement('book',$request->file);
        else $file=NULL;

        if($request->picture) $picture=\imagesConvert('book',$request->picture);
        else $picture=NULL;

        $data['picture']=$picture;
        $data['file']=$file;
        $data['slug']=\slug('Bo');

        Book::create($data);

        return \redirect()->back()->with('success','Ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return \view('book.show', \compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('book.edit',\compact('book'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required'
        ]);

        if($request->file) $file=\docStatement('book',$request->file);
        else $file=$request->fileOld;

        if($request->picture) $picture=\imagesConvert('book',$request->picture);
        else $picture=$request->pictureOld;

        $data['picture']=$picture;
        $data['file']=$file;

        $book->update($data);

        return \redirect()->back()->with('success','Modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return \redirect()->back()->with('success','Supprimé');
    }
}
