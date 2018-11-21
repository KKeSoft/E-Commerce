@extends('admin_layout')

@section('title','Admin|Add_Category')

@push('css')
@endpush

@section('admin_content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add Category</h4>
                            <p class="card-category">Are you sure you want  to Update Category ? </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-upgrade">
                                <form method="POST" action="{{url('/save_category')}}" class="dl-horizontal" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Category Name:</label>
                                                <input type="text" class="form-control" name="category_name"
                                                       value="{{old('category_name')}}" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 50px">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="control-label">Category Description</label>
                                                <h2><textarea class="controls" name="category_description" rows="3" cols="80"  required="required" title="">
                                            </textarea></h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom: 20px">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label class="control-label">Publication Status:</label>
                                                <input type="checkbox" style="height: 30px;width: 30px;margin-left: 30px" class="form-group" name="publication_status"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info">Add Category</button>
                                    <a href="{{url('/all_category')}}" class="btn btn-danger">Back</a>
                                </form>
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