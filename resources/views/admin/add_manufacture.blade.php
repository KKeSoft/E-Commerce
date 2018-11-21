@extends('admin_layout')

@section('title','Admin|Add_Manufacture')

@push('css')
@endpush

@section('admin_content')
    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card" >

                        <div class="card-header card-header-primary">
                            <h2 class="card-title ">Add Manufacture</h2>
                        </div>
                        <div class="card-body" style="margin-top: 70px" >
                            <p class="alert-success">
                               @include('pages.msg')
                            </p>
                            <form method="POST" action="{{url('/save_manufacture')}}" class="dl-horizontal" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Manufacture Name:</label>
                                            <input type="text" class="form-control" name="manufacture_name"
                                                   value="{{old('manufacture_name')}}" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Manufacture Description</label>
                                            <h2><textarea class="controls" name="manufacture_description" rows="3" cols="80">
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
                                <button type="submit" class="btn btn-info">Add Manufacture</button>
                                <a href="{{route('dashboard')}}" class="btn btn-danger">Back</a>
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

