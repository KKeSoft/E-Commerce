@extends('admin_layout')

@section('title','Admin|Manage_Order')

@push('css')

@endpush

@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Customer Details Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="table"  class="table table-striped table-bordered" style="width:100%">
                                {{--for Bootstrap-4
                                <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                <thead class="text-primary">

                                <th>Customer-Name</th>
                                <th>Customer-Mobile</th>

                                </thead>
                                <tbody>
                                @foreach($order_by_id as $key=>$order)
                                    <tr>
                                        <td ><h4>{{ $order->customer_name }}</h4></td>
                                        <td ><h4>{{ $order->mobile_number }}</h4></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Shipping Details Table</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="table"  class="table table-striped table-bordered" style="width:100%">
                                {{--for Bootstrap-4
                                <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                <thead class="text-primary">

                                <th>Shipping-Name</th>
                                <th>Shipping-Address</th>
                                <th>Shipping-Mobile</th>
                                </thead>
                                <tbody>
                                @foreach($order_by_id as $key=>$order)
                                    <tr>
                                        <td ><h4>{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</h4></td>
                                        <td ><h4>{{ $order->shipping_address }}</h4></td>
                                        <td ><h4>{{ $order->shipping_mobile_number }}</h4></td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header card-header-primary">
                        <h2 class="card-title ">Order Details Table</h2>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" >
                            <table id="table"  class="table table-striped table-bordered" style="width:100%">
                                {{--for Bootstrap-4
                                <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                <thead class="text-primary">
                                <th>Product ID</th>
                                <th>Product-Name</th>
                                <th>Product-Price</th>
                                <th>Product-Sales-Quantity</th>
                                <th>Product-sub-Total</th>
                                </thead>
                                <tbody>
                                @foreach($order_by_id as $key=>$order)
                                    <tr>
                                        <td ><h4>{{ $order->product_id }}</h4></td>
                                        <td ><h4>{{ $order->product_name }}</h4></td>
                                        <td ><h4>{{ $order->product_price }}</h4></td>
                                        <td ><h4>{{ $order->product_sales_quantity }}</h4></td>
                                        <td ><h4>{{ $order->product_price*$order->product_sales_quantity }}</h4></td>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

