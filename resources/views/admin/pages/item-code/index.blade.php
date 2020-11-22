@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product | List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/item-code') }}">Products</a></li>
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
                        <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Unit Price (Rs.)</th>
                                    <th>Selling Price (Rs.)</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($ItemsCodes as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <img style="width: 100px" src="{{$item->thumbnail_url}}">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td><?php echo $item->brand ?  $item->brand->name:''; ?></td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->unit_cost }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>
                                        <a href="{{ url('app/admin/item-code') }}/{{ $item->id }}"
                                            class="btn btn-sm btn-block btn-outline-primary">View</a>
                                    </td>
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