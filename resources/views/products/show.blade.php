@extends('products.layout')
 
@section('content')
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 font-weight-bold">
            Name Merchant
            <a href="{{ URL::to('product/create') }}">
                <button class="btn btn-primary" type="button" style="padding: 6px;margin: 0px;margin-left: 50px;">Add new item</button>
            </a>
            </p>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ URL::to('product') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <img src="{{ asset($product->image) }}" alt="" width="100" height="100" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $product->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        {{ $product->price }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        {{ $product->status == 1 ? "Còn hàng" : "Hết hàng" }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection