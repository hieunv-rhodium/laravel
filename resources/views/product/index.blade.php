@extends('layouts.master')

@section('title')

    <title>Products</title>

@endsection

@section('content')

    <ol class='breadcrumb'>

        <li><a href="/">Home</a></li>
        <li class="active">Products</li>

    </ol>

    <h2>List Products</h2>

    <hr/>

    @if($products->count() > 0)

        <table class="table table-hover table-bordered table-striped">
            <thead>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Price</th>
                 <th>Category</th>
                 <th>Date Created</th>
             </thead>

             <tbody>

                @foreach($products as $product)

                   <?php $category = DB::table('categories')->where('id', $product->cat_id)->first(); ?>

                    <tr>

                        <td>{{ $product->id  }}</td>
                        <td><a href="/product/{{ $product->id }}-{{ $product->slug }}">{{ $product->name }}</a></td>
                        <td>{{ $product->price }}</td>
                        <td><a href="/categories/{{ $category->id }}-{{ $category->slug }}">{{ $category->name }}</a></td>
                        <td>{{ $product->created_at }}</td>

                    </tr>

                @endforeach

             </tbody>

         </table>
    @else

    Sorry, no Products

    @endif

    {{ $products->links() }}

    <div>
        <a href="/product/create">
            <button type="button" class="btn btn-lg btn-primary">
                Create New
            </button>
        </a>
    </div>

@endsection