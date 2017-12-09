@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Your loans</h2>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                        </tr>
                        @foreach($loans as $loan)
                            @if($loan->returned_date == date('Y-m-d', strtotime(time())))
                            <tr>
                            <th>{{$loan->book->book_name}}</th>
                            <td>Due on: {{$loan->due_date}}</td>
                            <td>{!! Form::open(['action' => ['BookController@update', $loan->book->id], 'method' => 'POST']) !!}
                                {{Form::hidden('shelf_id', $loan->book->shelf_id)}}
                                {{Form::hidden('book_name', $loan->book->book_name)}}
                                {{Form::hidden('author_name', $loan->book->author)}}
                                {{Form::hidden('availability', 1)}}
                                {{Form::hidden('updateLoan', $loan->id)}}
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Return Book', ['class' => 'btn btn-primary'])}}
                            {!! Form::close() !!}</td>
                            {{--<td><a href="/books/{{$loan->book->id}}/returnBook" class="btn btn-primary">Return Book</a></td>--}}
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="jumbotron text-center">
        @if(auth()->user())
            @if(auth()->user()->is_librarian == 1)
                {!! Form::open(['action' => ['loanController@index'], 'method' => 'GET']) !!}
                    {{Form::submit('Loans', ['class' => 'btn btn-primary'])}}
                {!! Form::close() !!}      
                <a href="/books/create" class="btn btn-primary"> Add new book</a>          
            @endif
        @else
            <p><a class="btn btn-primary" href="/login" role="button">Login Page</a></p>
        @endif
        {!! Form::open(['action' => ['BookController@index'], 'method' => 'GET']) !!}
            {{Form::submit('Shelves', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
