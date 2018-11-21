@extends('layout')

@section('title','Check-Out')

@push('css')

@endpush

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-12 ">
                        <div class="bill-to">
                            <p>Shipping Details</p>
                            <div class="form-two">
                                <form action="{{URL::to('/save_shipping_details')}}" method="post">
                                    @csrf
                                    <input type="email" name="shipping_email" placeholder="Email*" required>
                                    <input type="text" name="shipping_first_name" placeholder="First Name" required>
                                    <input type="text" name="shipping_last_name" placeholder="Last Name *" required>
                                    <input type="text" name="shipping_address" placeholder="Address  *" required>
                                    <input type="text" name="shipping_mobile_number" placeholder="Mobile Number *" required>
                                    <input type="text" name="shipping_city" placeholder="City *" required>
                                    <input type="submit" class="btn btn-info" value="Done">
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection

@push('scripts')

@endpush

