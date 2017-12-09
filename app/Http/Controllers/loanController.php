<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\loan;
use App\shelves;

class loanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = loan::all();
        $title = 'All loans';
        $books = Book::get();
        return view('books.loans')->with('loans', $loans)->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'book_name' => 'required',
        // ]);

        //Create Post request
        
        $post = new loan;
        $post->book_id = $request->input('book_id');
        $post->user_id = auth()->user()->id;
        $post->due_date = $request->input('due_date');
        $post->returned_date = date('Y-m-d', strtotime(time()));
        $post->save();

        $bookPost = Book::find($request->input('book_id'));
        $bookPost->availability = 0;
        $bookPost->save();
        return redirect('/shelves')->with('success', 'Book borrowed');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
