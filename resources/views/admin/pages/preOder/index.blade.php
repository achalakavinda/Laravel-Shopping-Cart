@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pre Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('app/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('app/admin/pre-order') }}">Pre Order</a></li>
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
                <div class="col-12">
                    @include('layouts.status')
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pre-Order</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                    <th>Customer Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Remarks</th>
                                    <th>Items</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($PurchaseOrder as $oder)
                                <tr>
                                    <td>{{ $oder->created_at->toDateString() }}</td>
                                    <td>
                                        @if ($oder->status == "Delivered")
                                        <p class="text-success">{{ $oder->status }}</p>
                                        @else
                                        <p>{{ $oder->status }}</p>
                                        @endif
                                    </td>
                                    <td>{{ $oder->customer_name }}</td>
                                    <td>{{ $oder->contact }}</td>
                                    <td>{{ $oder->email }}</td>
                                    <td>{{ $oder->delivery_address }}</td>
                                    <td>{{ $oder->remarks }}</td>
                                    <td>
                                        <ul class="list-group">
                                            @foreach ($oder->purchaseOrderItem as $item)
                                            <li class="list-group-item">{{$item->itemCode->name}} <br><small
                                                    class="text-muted">{{$item->itemCodeColor->color}}/{{$item->itemCodeSize->size}}</small>
                                                <br><small class="text-muted">Quantity:
                                                    {{$item->qty}}</small>
                                                <br><small class="text-muted">Price:
                                                    {{$item->selling_price}}</small>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>@if ($oder->status == "Processing")
                                        <a href="{{ url('app/admin/pre-order') }}/{{ $oder->id }}"
                                            class="btn btn-sm btn-block btn-outline-secondary">Edit</a>
                                        <form action="{{ url('app/admin/deliver') }}/{{ $oder->id }}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit"
                                                class="btn btn-sm btn-block btn-outline-primary">Deliver</button>
                                        </form>
                                        @endif
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