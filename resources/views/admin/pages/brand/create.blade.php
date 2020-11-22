@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add new Brand / Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('app/admin/brand') }}">Brand</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('app/admin/brand/create') }}">Create</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form style="width: 100%" method="post" action="{{ url('app/admin/brand') }}" enctype="multipart/form-data">
                @csrf()
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Fill Required Fields</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="Name" name="name" placeholder="">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" id="Slug" name="slug" placeholder="">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea type="text" class="form-control" id="Description" name="description" placeholder=""></textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Choose a Thumbnail Image</label>
                                    <input type="file" name="file" class="form-control" id="Slug" name="slug" placeholder="">
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
