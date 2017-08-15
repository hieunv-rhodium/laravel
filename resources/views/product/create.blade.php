@extends('layouts.master')

@section('title')
    <title>Create a category</title>
@endsection

@section('content')

    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="/product">Product</a></li>
        <li class="active">Create</li>
    </ol>

    <h2>Create a New Product</h2>

    <hr/>

    <form class="form" role="form" action="{{url('/product')}}" method="POST">

    {{ csrf_field() }}

            <div class="form-inline row">

                <div class="form-group col-md-4">
                    <div class=" {{ $errors->has('name') ? 'has_error' : ''}}">
                        <label class="control-label col-md-4 pl0">Product Name</label>
                        <input type="text" class="form-control input-sm col-md-7" name="name" value="" />

                        @if( $errors->has('name') )

                            <span class="has-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>

                        @endif
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label class="control-label col-md-5 pl0">Categories</label>
                    {!! Form::select('cat_id', $cat , null , ['class' => 'form-control input-sm']) !!}
                </div>

                <div class="form-group col-md-4">
                    <label class="control-label col-md-5 pl0">Price</label>
                    <input type="text" class="form-control input-sm" name="price" value="" />
                </div>

            </div>

            <div class="form-inline row mt_20">

                <div class="form-group col-md-4">
                    <label class="control-label col-md-4 pl0">Title Seo</label>
                    <input type="text" class="form-control input-sm" name="title_seo" value="" />
                </div>

                <div class="form-group col-md-4">
                    <label class="control-label col-md-5 pl0">Meta desrciption</label>
                    <input type="text" class="form-control input-sm" name="meta_description" value="" />
                </div>

                <div class="form-group col-md-4">
                    <label class="control-label col-md-5 pl0">Meta keyword</label>
                    <input type="text" class="form-control input-sm" name="meta_keyword" value="" />
                </div>

            </div>

            <div class="form-group col-md-12 mt_20 row">
                <label class="control-label col-md-4 pl0">Content</label>
                <input type="text" class="form-control input-sm" name="content" value="" />
            </div>


        <div class="form-group mt_20">

            <button type="submit" class="btn btn-primary btn-sm">
                Create
            </button>

        </div>

    </form>

@endsection