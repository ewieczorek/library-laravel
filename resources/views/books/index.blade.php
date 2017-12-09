@extends('layouts.app')

@section('content')

    <h1>All shelves</h1>
    @if(count($bookShelves) > 0)
        @foreach($bookShelves as $shelves)
            <div class="well">
                <h3><a href="/shelves/{{$shelves->id}}">{{$shelves->shelf_name}}</a></h3>
                <small>Updated on {{$shelves->updated_at}}</small>
            </div>
        @endforeach
    @else
        <p>No shelves found</p>
    @endif
    @if(auth()->user())
        @if(auth()->user()->id == 1)
            <a href="/books/create" class="btn btn-primary"> Add new book</a>
        @endif
    @endif
@endsection