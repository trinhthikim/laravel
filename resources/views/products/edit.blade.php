@extends('products.layout')
 
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-header">
    <h3 class="card-title">Edit Product</h3>
</div>
<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="nameProduct">Name</label>
            <input type="text" class="form-control" id="nameProduct" placeholder="Enter name" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="priceProduct">Price</label>
            <input type="text" class="form-control" id="priceProduct" placeholder="Enter price" name="price" value="{{ $product->price }}">
        </div>
        <div class="checkbox">
            <label for="imageProduct">Status</label>
            <div class="radio">
                <label>
                    {!! Form ::radio('status','1',($product->status == '1' ? true : false)) !!}
                    Còn hàng
                </label>
            </div>
            <div class="radio">
                <label>
                    {!! Form ::radio('status','0',($product->status == '0' ? true : false)) !!}
                    Hết hàng
                </label>
            </div>
        </div>   
        <main class="main_full">
            <div class="">
                <div class="panel">
                    <div class="button_outer file_uploading">
                        <div class="btn_upload">
                            <input type="file" id="upload_file" name="image">
                            Upload Image
                        </div>
                        <div class="processing_bar "></div>
                    </div>
                </div>
                <div class="error_msg"></div>
                <div class="uploaded_file_view show" id="uploaded_view">
                    <img src="{{ asset($product->image) }}" alt="">
                    <span class="file_remove">X</span>
                </div>
            </div>
        </main>   
    </div>

    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection