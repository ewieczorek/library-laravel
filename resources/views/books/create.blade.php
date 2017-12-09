@extends('layouts.app')

@section('content')
    <h1>Create Book</h1>
    {!! Form::open(['action' => 'BookController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('bookName', 'Book Name')}}
            {{Form::text('book_name', '', ['class' => 'form-control', 'placeholder' => 'Book Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('authorName', 'Author Name')}}
            {{Form::text('author_name', '', ['class' => 'form-control', 'placeholder' => 'Author Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('shelfID', 'Shelf')}}
            {{Form::select('shelf_id', ['1' => 'Art', '2' => 'Science', '3' => 'Sport', '4' => 'Literature'], '1')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}   
@endsection