@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand | List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('app/admin/brand') }}">Brand</a></li>
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
                            <h3 class="card-title">Brands / Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#No</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($Brands as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img style="width: 100px" src="{{ $item->img_url }}">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="{{ url('app/admin/brand') }}/{{ $item->id }}" class="btn btn-sm btn-block btn-outline-primary">View</a>
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
