@extends('admin_layout')

@section('title','Admin|Add_Product')

@push('css')
@endpush

@section('admin_content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{URL::to('/add_product')}}" class="btn btn-info">Add NEW Product</a>
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Product</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                                    {{--for Bootstrap-4
                                    <table id="table"class="table table-striped table-bordered" style="width:100%">--}}
                                    <thead class="text-primary">
                                    <th>Product ID</th>
                                    <th>Product-Name</th>
                                    <th>Product-Description</th>
                                    <th>Product-Image</th>
                                    <th>Product Price</th>
                                    <th>Category-Name</th>
                                    <th>Manufacture-Name</th>
                                    <th>Publication-Status</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($all_product_info as $key=>$product)
                                        <tr>
                                            <td>{{ $product->product_id }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_short_description }}</td>
                                            <td><img src="{{URL::to($product->product_image)}}" style="height: 80px;width: 80px"></td>
                                            <td>{{ $product->product_price}}</td>
                                            <td>{{ $product->category_name}}</td>
                                            <td>{{ $product->manufacture_name }}</td>
                                            <td>
                                                @if($product->publication_status==1)
                                                    <span class="btn btn-success">Active</span>
                                                    <a class="btn btn-danger"   href="{{URL::to('/unactive_product/'.$product->product_id)}}">
                                                        <span >

                                                            <i class="material-icons">thumb_down</i>
                                                        </span>
                                                    </a>
                                                @else
                                                    <span class="btn  btn-danger">UnActive</span>
                                                    <a class="btn btn-success" href="{{URL::to('/active_product/'.$product->product_id)}}">
                                                        <span >
                                                            <i class="material-icons">thumb_up</i>
                                                        </span>
                                                    </a>
                                                @endif
                                            </td>

                                            <td class="center"><a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>
                                                <form method="GET" id="delete-form-{{$product->product_id}}" action="{{URL::to('/delete-product/'.$product->product_id)}}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if (confirm('Are you Sure? you want delete this? ')){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$product->product_id}}').submit();
                                                        }else{
                                                        event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button>
                                            </td>
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
    </div>
@endsection

@push('scripts')
@endpush

