@extends('layouts.master')

@section('title')

    <title>Edit product</title>

@endsection

@section('content')


    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/product'>Product</a></li>
        <li><a href='/product/{{ $product->id }}'>{{ $product->name }}</a></li>
        <li class='active'>Edit</li>
    </ol>

    <h1>Edit product</h1>

    <hr/>


    <form autocomplete="off" class="form" role="form" method="POST" action="{{ url('/product/'. $product->id) }}">
        
        {{ method_field('PATCH') }}
    
        {{ csrf_field() }}

        <div class="form-inline row">

            <div class="form-group col-md-4">
                <div class=" {{ $errors->has('name') ? 'has_error' : ''}}">
                    <label class="control-label col-md-4 pl0">Product Name</label>
                    <input type="text" class="form-control input-sm col-md-7" name="name" value="{{ $product->name }}" />

                    @if( $errors->has('name') )

                        <span class="has-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>

                    @endif
                </div>
            </div>

            <div class="form-group col-md-4">
                <label class="control-label col-md-5 pl0">Categories</label>
                {!! Form::select('cat_id', $cat , $product->cat_id , ['class' => 'form-control input-sm']) !!}
            </div>

            <div class="form-group col-md-4">
                <label class="control-label col-md-5 pl0">Price</label>
                <input type="text" class="form-control input-sm" name="price" value="{{ $product->price }}" />
            </div>

        </div>

        <div class="form-inline row mt_20">

            <div class="form-group col-md-4">
                <label class="control-label col-md-4 pl0">Title Seo</label>
                <input type="text" class="form-control input-sm" name="title_seo" value="{{ $product->title_seo }}" />
            </div>

            <div class="form-group col-md-4">
                <label class="control-label col-md-5 pl0">Meta desrciption</label>
                <input type="text" class="form-control input-sm" name="meta_description" value="{{ $product->meta_description }}" />
            </div>

            <div class="form-group col-md-4">
                <label class="control-label col-md-5 pl0">Meta keyword</label>
                <input type="text" class="form-control input-sm" name="meta_keyword" value="{{ $product->meta_keyword }}" />
            </div>

        </div>

        <div class="form-group col-md-12 mt_20 row">
            <label class="control-label col-md-4 pl0">Content</label>
            <input type="text" class="form-control input-sm" name="content" value="{{ $product->content }}" />
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm">
                Edit
            </button>
        </div>

    </form>


@endsection