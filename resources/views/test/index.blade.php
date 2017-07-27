@extends('layouts.master')

@section('title')
Tieu de trang
@endsection
@section('content')
    @parent
    <h1>This is my test page</h1>
    
    @if(count($beatles) > 0)
        @foreach($beatles as $beatle)
         {{$beatle}} <br />
        @endforeach
    @else 
        <h1>Sorry, Nothing to show...</h1>
    @endif
@endsection