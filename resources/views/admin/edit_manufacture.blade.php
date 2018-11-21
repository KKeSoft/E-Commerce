@extends('admin_layout')

@section('title','Edit-Manufacture')

@push('css')
@endpush

@section('admin_content')
    <div class="content" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="card" >

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Manufacture</h4>
                        </div>
                        <div class="card-body" style="margin-top: 70px" >
                            <p class="alert-success">
                                @include('pages.msg')
                            </p>
                            <form method="POST" action="{{url('/update_manufacture',$manufacture_info->manufacture_id)}}" class="dl-horizontal" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Manufacture Name:</label>
                                            <input type="text" class="form-control" name="manufacture_name"
                                                   value="{{$manufacture_info->manufacture_name}}" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Manufacture Description</label>
                                            <h4><textarea  name="manufacture_description" rows="3" cols="90">
                                                {{$manufacture_info->manufacture_description}}
                                            </textarea></h4>
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-info">Update</button>
                                <a href="{{URL::to('/all_manufacture')}}" class="btn btn-danger">Back</a>
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

