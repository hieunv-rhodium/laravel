@extends('layouts.master')

@section('title')

    <title>Users</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Users</li>
    </ol>

    <h2>Users</h2>

    <hr/>

    <user-grid></user-grid>

@endsection