@extends('admin_layout')

@section('title','Add-Category')

@push('css')
@endpush

@section('admin_content')
    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-md-offset-1">

                    <div class="card" >

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Update Category</h4>
                        </div>
                        <div class="card-body" style="margin-top: 70px" >
                            <p>
                               @include('pages.msg')
                            </p>
                            <form method="POST" action="{{url('/update_category',$category_info->category_id)}}" class="dl-horizontal" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category Name:</label>
                                            <input type="text" class="form-control" name="category_name"
                                                   value="{{$category_info->category_name}}" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Category Description</label>
                                            <textarea class="controls" name="category_description" rows="3" cols="90">
                                                {{$category_info->category_description}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{URL::to('/all-category')}}" class="btn btn-danger">Back</a>
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

