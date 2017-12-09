<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\loan;
use App\shelves;


class BookController extends Controller
{
    public function returnBook($id)
    {
        $bookPost = Book::find($id);
        $bookPost->availability = 1;
        $bookPost->save();

        return redirect('/shelves')->with('success', 'Book updated');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelves = shelves::all();
        $title = 'All book shelves';
        //return view('pages.index', compact('title'));
        return view('books.index')->with('bookShelves', $shelves);
    }

    public function loginPage()
    {
        return view('pages.login');
    }

    public function booksCreate()
    {
        $data = array(
            'title' => 'Book Page',
            'username' => 'none'
        );
        return view('pages.booksCreate')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'book_name' => 'required',
            'author_name' => 'required'
        ]);

        //Create Post request
        $post = new Book;
        $post->book_name = $request->input('book_name');
        $post->author = $request->input('author_name');
        $post->shelf_id = $request->input('shelf_id');
        $post->save();

        return redirect('/shelves')->with('success', 'Book created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.showBook')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.editBook')->with('book', $book);
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
        $this->validate($request, [
            'book_name' => 'required',
            'author_name' => 'required'
        ]);

        //Create Post request
        $post = Book::find($id);
        $post->book_name = $request->input('book_name');
        $post->author = $request->input('author_name');
        $post->shelf_id = $request->input('shelf_id');
        if($request->input('availability')){
            $post->availability = $request->input('availability');
        }
        $post->save();

        if($request->input('updateLoan')){
            $loanPost = Loan::find($request->input('updateLoan'));
            $loanPost->returned_date =  date('Y-m-d');
            $loanPost->save();
        }

        return redirect('/shelves')->with('success', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Book::find($id);
        $post->delete();
        return redirect('/shelves')->with('success', 'Book removed');
    }
}
