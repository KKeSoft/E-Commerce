@extends('admin_layout')

@section('title','Admin|Add_Product')

@push('css')
@endpush

@section('admin_content')
    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card" >

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add Product</h4>
                        </div>
                        <div class="card-body" style="margin-top: 70px" >
                            <p class="alert-success">
                                @include('pages.msg')
                            </p>

                            <form method="POST" action="{{url('/save_product')}}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Product Name:</label>
                                            <input type="text" class="form-control" name="product_name"
                                                   value="{{old('product_name')}}" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control">Product Category:</label>
                                            <label class="" >
                                                <select id="" name="category_id" style="width: 300px; height: 40px">
                                                    <option>Seletct Category</option>
                                                    <?php $all_category=DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();
                                                    foreach ($all_category as $all_category){
                                                    ?>
                                                    <option value="{{$all_category->category_id}}">
                                                        {{$all_category->category_name}}
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control">Manufacture Name:</label>
                                            <label class="">
                                                <select id="" class="dropdown-menus" name="manufacture_id" style="width: 300px; height: 40px";>
                                                    <option>Seletct Manufacture</option>
                                                    <?php $all_manufacture=DB::table('tbl_manufacture')
                                                        ->whereIn('publication_status', [1,'on'])
                                                        ->get();
                                                    foreach ($all_manufacture as $all_manufacture){
                                                    ?>
                                                    <option value="{{$all_manufacture->manufacture_id}}">
                                                        {{$all_manufacture->manufacture_name}}
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Product Short Description</label>
                                            <textarea class="form-control" name="product_short_description" rows="2" cols="90">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="">Product Long Description</label>
                                            <textarea class="form-control" name="product_long_description" rows="5" cols="90">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Price:</label>
                                            <input type="text" class="form-control" name="product_price"
                                                   value="{{old('product_price')}}" required="required">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="">Product Image:</label>
                                        <input  class="form-control" type="file" name="product_image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label >Product Size:</label>
                                        <input class="form-control" type="text" name="product_size">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label >Product Color:</label>
                                            <input type="text" class="form-control" name="product_color"
                                                   value="{{old('product_color')}}" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 20px">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="control-label">Publication Status:</label>
                                            <input type="checkbox" style="height: 30px;width: 30px;margin-left: 30px" class="form-control" name="publication_status"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Add Product</button>
                                <a href="" class="btn btn-danger">Back</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush