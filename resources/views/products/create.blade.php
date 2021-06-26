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
    <h3 class="card-title">Create Product</h3>
</div>

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="nameProduct">Name</label>
            <input type="text" class="form-control" id="nameProduct" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label for="priceProduct">Price</label>
            <input type="text" class="form-control" id="priceProduct" placeholder="Enter price" name="price">
        </div>
        <!-- <div class="form-group">
            <label for="image">Choose image</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                </div>
            </div>
        </div> -->
        <div class="checkbox">
            <label for="imageProduct">Status</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" id="optionsRadios1" value="1">
                    Còn hàng
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" id="optionsRadios2" value="2">
                    Hết hàng
                </label>
            </div>
        </div>  
        <main class="main_full">
            <div class="">
                <div class="panel">
                    <div class="button_outer">
                        <div class="btn_upload">
                            <input type="file" id="upload_file" name="image">
                            Upload Image
                        </div>
                        <div class="processing_bar"></div>
                        <!-- <div class="success_box"></div> -->
                    </div>
                </div>
                <div class="error_msg"></div>
                <div class="uploaded_file_view" id="uploaded_view">
                    <span class="file_remove">X</span>
                </div>
            </div>
        </main>
            
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection