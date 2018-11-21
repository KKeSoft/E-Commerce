@extends('layout')

@section('title','User-Login | E-Shopper')

@push('css')
@endpush

@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="{{url('/customer_login')}}" method="post">
                            @csrf
                            <input type="email" required="required" placeholder="Email Address" name="customer_email" />
                            <input type="password" placeholder="PassWord" name="password" />
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{url('/customer_registration')}}" method="post">
                            @csrf
                            <input type="text" placeholder="Name" name="customer_name" required="required"/>
                            <input type="email" placeholder="Email Address" name="customer_email" required="required"/>
                            <input type="password" placeholder="Password" name="password" required="required"/>
                            <input type="text" placeholder="Phone No" name="mobile_number" required="required"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection

@push('scripts')
@endpush

