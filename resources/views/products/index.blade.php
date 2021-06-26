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
    <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
            </div>
        </div>
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name Item</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $value)
                    <tr>
                        <td>&nbsp;<img class="img-thumbnail" src="{{ asset($value->image) }}" width="100" height="100"></td>
                        <td>&nbsp;{{ $value->name }}</td>
                        <td>{{ $value->price }}</td>
                        <td>{{ $value->status == 1 ? "Còn hàng" : "Hết hàng" }}</td>
                        <td>
                            <a href="{{ route('product.show',$value->id) }}">
                                <i class="fa fa-eye" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i>
                            </a>
                            
                        </td>
                        <td>
                            <a href="{{ route('product.edit',$value->id) }}">
                            <i class="fa fa-edit" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('product.destroy',$value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background-color: #fff">
                                    <i class="fa fa-trash-o" style="width: 18px;font-size: 20px;color: rgb(133,136,150);"></i>
                                </button>
                            </form>  
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr></tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection