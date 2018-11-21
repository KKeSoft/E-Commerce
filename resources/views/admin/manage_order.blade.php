@extends('admin_layout')

@section('title','Admin|Manage_Order')

@push('css')

@endpush

@section('admin_content')

    <div class="container-fluid">
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
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Customer-Name</th>
                                <th>Order-Total</th>
                                <th>Order-Status</th>

                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach($all_order_info as $key=>$order)
                                    <tr>
                                        <td >{{ $key + 1 }}</td>
                                        <td ><h4>{{ $order->order_id }}</h4></td>
                                        <td ><h4>{{ $order->customer_name }}</h4></td>
                                        <td ><h4>{{ $order->order_total }}</h4></td>
                                        <td >
                                            @if($order->order_status==1)
                                                <span class="btn btn-success">{{ $order->order_status }}</span>
                                                <a class="btn btn-danger"   href="{{URL::to('/unactive_order/'.$order->order_id)}}">
                                                        <span >
                                                            <i class="material-icons">thumb_down</i>
                                                        </span>
                                                </a>
                                            @else
                                                <span class="btn  btn-danger">{{ $order->order_status }}</span>
                                                <a class="btn btn-success" href="{{URL::to('/active_order/'.$order->order_id)}}">
                                                        <span >
                                                            <i class="material-icons">thumb_up</i>
                                                        </span>
                                                </a>
                                            @endif
                                        </td>

                                        <td class="center"><h4><a href="{{URL::to('/view_order/'.$order->order_id)}}" class="btn btn-info "><i class="material-icons">mode_edit</i></a>
                                                <form method="GET" id="delete_form-{{$order->order_id}}" action="{{URL::to('/delete_order/'.$order->order_id)}}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger " onclick="if (confirm('Are you Sure? you want delete this? ')){
                                                        event.preventDefault();
                                                        document.getElementById('delete_form-{{$order->order_id}}').submit();
                                                        }else{
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </h4> </td>
                                    </tr>
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

