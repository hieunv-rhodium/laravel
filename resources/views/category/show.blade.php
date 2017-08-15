@extends('layouts.master')

@section('title')

    <title>{{ $categories->name }} categories</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/categories'>Categories</a></li>
        <li class="active">{{ $categories->name }}</li>
    </ol>

    <h1>{{ $categories->name }}</h1>

    <hr/>

    <div class="panel panel-default">

        <!-- Table -->
        <table class="table table-striped">

            <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Date Created</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{ $categories->id }} </td>
                <td> <a href="/categories/{{ $categories->id }}/edit">
                        {{ $categories->name }}</a></td>
                <td>{{ $categories->created_at }}</td>

                <td> <a href="/categories/{{ $categories->id }}/edit">

                        <button type="button" class="btn btn-default">Edit</button></a></td>

                <td>

                    <div class="form-group">

                        <form class="form" role="form" method="POST" action="{{ url('/categories/'. $categories->id) }}">
                            <input type="hidden" name="_method" value="delete">
                            {{ csrf_field() }}

                            <input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">

                        </form>
                    </div>
                </td>

            </tr>
            </tbody>

        </table>


    </div>

@endsection
@section('scripts')
    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x){
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection