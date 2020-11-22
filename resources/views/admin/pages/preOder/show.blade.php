@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pre Order | <small class="text-muted">Customer Name: {{ $order->customer_name }}</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/pre-order') }}">Pre Order</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/pre-order') }}/{{ $order->id }}">Update</a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form style="width: 100%" method="POST" action="{{ url('app/admin/pre-order') }}/{{ $order->id }}">
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
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                            <tr>
                                <td>{{ $item->itemCode->name }}</td>
                                <td><input type="hidden" value="{{$item->id}}" name="id[]">
                                    <select class="form-control" name="item_code_color_id[]" id="item_code_color_id[]">
                                        @foreach($colors as $color)
                                        <option value="{{ $color->id }}" @if ($item->itemCodeColor->id == $color->id)
                                            selected @endif>
                                            {{ $color->color }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control" name="item_code_size_id[]" id="item_code_size_id[]">
                                        @foreach($sizes as $size)
                                        <option value="{{ $size->id }}" @if ($item->itemCodeSize->id == $size->id)
                                            selected @endif>
                                            {{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" id="quantity[]" name="quantity[]"
                                        placeholder="" value="{{ $item->qty }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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