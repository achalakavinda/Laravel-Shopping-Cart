@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product | {{ $product->name }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/item-code') }}">Products</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/item-code') }}/{{ $product->id }}">Update</a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form style="width: 100%" method="POST" action="{{ url('app/admin/item-code') }}/{{ $product->id }}"
            enctype="multipart/form-data">
            @csrf()
            @method('PUT')
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Fill Required Fields</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="Name" name="name" placeholder=""
                                    value="{{ $product->name }}">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <img class="form-control" style="width: auto;min-height: 50vh"
                                    src="{{$product->thumbnail_url}}">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="">{{ $product->description }}</textarea>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Replace thumbnail image | URL : {{ $product->thumbnail_url }}</label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Unit Price</label>
                                <input type="text" class="form-control" id="unit_cost" name="unit_cost" placeholder=""
                                    value="{{ $product->unit_cost }}">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input type="text" class="form-control" id="selling_price" name="selling_price"
                                    placeholder="" value="{{ $product->selling_price }}">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-app">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </div>
        </form>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection