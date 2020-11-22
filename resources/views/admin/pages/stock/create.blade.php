@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add a new Stock / Stock</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/stock') }}">Stocks</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/stock/create') }}">Create</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form style="width: 100%" method="post" action="{{ url('app/admin/stock') }}">
            @csrf()
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
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label>Product</label>
                                <select class="form-control" name="item_code_id" id="item_code_id">
                                    @foreach($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Color</label>
                                <select class="form-control" name="item_code_color_id" id="item_code_color_id">
                                    @foreach($colors as $color)
                                    <option value="{{ $color->id }}">
                                        {{ $color->color }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Size</label>
                                <select class="form-control" name="item_code_size_id" id="item_code_size_id">
                                    @foreach($sizes as $size)
                                    <option value="{{ $size->id }}">
                                        {{ $size->size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" id="open_qty" name="open_qty" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="number" class="form-control" id="cost" name="cost" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input type="number" class="form-control" id="selling_price" name="selling_price"
                                    placeholder="">
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
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>


    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection