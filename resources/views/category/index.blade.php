@extends('layouts.master')

@section('title')

    <title>Categories</title>

@endsection

@section('content')

    <ol class='breadcrumb'>

        <li><a href="/">Home</a></li>
        <li class="active">Categories</li>

    </ol>

    <h2>Categories</h2>

    <hr/>

    @if($categories->count() > 0)

        <table class="table table-hover table-bordered table-striped">
            <thead>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Date Created</th>
             </thead>

             <tbody>

                @foreach($categories as $category)

                    <tr>

                        <td>{{ $category->id  }}</td>
                        <td><a href="/categories/{{ $category->id }}-{{ $category->slug }}">{{ $category->name }}</a></td>
                        <td>{{ $category->created_at }}</td>

                    </tr>

                @endforeach

             </tbody>

         </table>
    @else

    Sorry, no Categories

    @endif

    {{ $categories->links() }}

    <div>
        <a href="/categories/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button>
        </a>
    </div>

@endsection