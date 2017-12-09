@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        @if(auth()->user())
            @if(auth()->user()->is_librarian == 1)
                {!! Form::open(['action' => ['loanController@index'], 'method' => 'GET']) !!}
                    {{Form::submit('Loans', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}                
            @endif
            <p><a class="btn btn-primary" href="/home" role="button">Dashboard</a></p>
        @else
            <p><a class="btn btn-primary" href="/login" role="button">Login Page</a></p>
        @endif
        {!! Form::open(['action' => ['BookController@index'], 'method' => 'GET']) !!}
            {{Form::submit('Shelves', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection('content')