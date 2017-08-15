@extends('layouts.master')

@section('title')

    <title>Edit categories</title>

@endsection

@section('content')


    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/categories'>Categories</a></li>
        <li><a href='/categories/{{ $categories->id }}'>{{ $categories->name }}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h1>Edit categories</h1>

    <hr/>


    <form class="form" role="form" method="POST" action="{{ url('/categories/'. $categories->id) }}">
        
        {{ method_field('PATCH') }}
    
        {{ csrf_field() }}

    <!-- categories_name Form Input -->
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label">Categories Name</label>

            <input type="text" class="form-control" name="name" value="{{ $categories->name }}">

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg">
                Edit
            </button>
        </div>

    </form>


@endsection