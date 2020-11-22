@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock | List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/stock') }}">Stocks</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Stock / Stock Items</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Product Name</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Opened Quantity</th>
                                    <th>Remaining Quantity</th>
                                    <th>Cost</th>
                                    <th>Selling Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($stockItem as $item)
                                <tr>
                                    <td>{{ $item->stock->code }}</td>
                                    <td>{{ $item->itemCode->name }}</td>
                                    <td>{{ $item->itemCodeColor->color }}</td>
                                    <td>{{ $item->itemCodeSize->size }}</td>
                                    <td>{{ $item->open_qty }}</td>
                                    <td>{{ $item->remain_qty }}</td>
                                    <td>{{ $item->cost }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection