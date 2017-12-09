@extends('layouts.app')

@section('content')
    <h1>{{$book->book_name}}</h1>
    <div class="well">
        <h3>Author: {{$book->author}}</h3>
        <p>Availability: {{$book->availability}}</p>
        
    </div>
    @if(auth()->user())
        @if(auth()->user() ->id == 1)
            <a href="/books/{{$book->id}}/edit" class="btn btn-default">Edit Book</a>
            {!! Form::open(['action' => ['BookController@destroy', $book->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete Book', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif

        @if($book->availability == 1 && (auth()->user()->is_librarian == 0))
            {{--<a href="/loans/store" class="btn btn-default"> Borrow book</a>
            <a href="{{action('loanController@store')}}">Borrow Book</a>
            $data = 

            
            {{$data = array(
                'user_id' => '0',
                'book_id' => $book->id,
                'due_date' => date('Y-m-d'),
                'returned_date' => date('Y-m-d', $date)
            )}}
            {{$date = strtotime("+7 day", time())}}
            --}}
 
            {!! Form::open(['action' => ['loanController@store'], 'method' => 'POST']) !!}
                {{Form::hidden('_method', 'POST')}}
                {{Form::hidden('book_id', $book->id)}}
                {{Form::hidden('due_date', date('Y-m-d', strtotime("+7 day", time())))}}
                {{Form::submit('Borrow Book', ['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}   

        @endif
    @endif

@endsection