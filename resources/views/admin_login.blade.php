@extends('layout')

@section('title','Login | E-Shopper')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('backend/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
@endpush

@section('content')
    <div class="content" style="background: #0b3251; margin-bottom: 20px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <div class="card" style="margin-top: 50px">
                        <p class="alert-danger">
                            @include('pages.msg')
                        </p>
                        <div   >
                            <h2 class="card-title pull-center" ><b style="color:  red">Your Login Form</b></h2>
                            <h2 class="btn btn-info btn-sm pull-right" style="color: red">
                                <i class="fa fa-user"></i> login</h2>
                        </div>
                        <div class="card-body" style="margin-top: 70px" >
                            <form method="POST" action="{{url('admin_dashboard')}}" class="dl-horizontal" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" style="color:  red">Admin Email:</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{old('email')}}" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 50px">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="bmd-label-floating" style="color:  red">Admin Password:</label>
                                            <input type="password" class="form-control" name="password" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right" style="margin-bottom: 40px">
                                     <button type="submit" class="btn btn-info">Login</button>
                                    <a href="{{route('/')}}" class="btn btn-danger">Back</a>
                                    {{--<a href="{{url('/')}}" class="btn btn-danger">Back</a>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('backend/js/material-dashboard.min.js?v=2.1.0')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
@endpush

