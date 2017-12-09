@extends('layouts.app')

@section('content')
    <h1>{{$shelf->shelf_name}}</h1>
    @foreach($books as $Book)
        <div class="well">
            <h3><a href="/books/{{$Book->id}}">{{$Book->book_name}}</a></h3>
        </div>
    @endforeach
@endsection