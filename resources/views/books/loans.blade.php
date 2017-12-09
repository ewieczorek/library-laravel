@extends('layouts.app')

@section('content')

    <h1>All loans</h1>
    @if(count($loans) > 0)
        @foreach($loans as $loan)
            {{--{{$book = Book::find($loan->book_id)}}--}}
            <div class="well">
                <h3><a href="/shelves/{{$loan->id}}">{{$loan->book_id}}</a></h3>
                <p>Book name: {{$loan->book->book_name}}</p>
                <p>Borrowed by: {{$loan->user->username}}</p>
                <p>Due on: {{$loan->due_date}}</p>
                <p>Returned on: {{$loan->returned_date}}</p>
            </div>
        @endforeach
    @else
        <p>No loans found</p>
    @endif
@endsection