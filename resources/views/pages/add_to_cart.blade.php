@extends('layout')

@section('title','Add_cart | E-Shopper')


@push('css')
@endpush

@section('content')
    <section id="cart_items">
        <div class="container">

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive cart_info">
                    <?php
                    $content=Cart::content();
                    /*echo "<pre>";
                    print_r($content);
                    echo "</pre>";*/
                    ?>

                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Name</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($content as $v_content)
                            <tr>

                                <td class="cart_product">
                                    <a href=""><img src="{{URL::to($v_content->options->image)}}" style="height: 100px; width: 80px " alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$v_content->name}}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <h4>{{$v_content->price}} TK</h4>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form  method="POST" action="{{URL::to('/update_cart/'.$v_content->rowId)}}">
                                            @csrf
                                            <a class="cart_quantity_up" href=""> + </a>
                                            <input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                            <a class="cart_quantity_down" href=""> - </a>

                                            <input type="submit" value="Update" class="btn btn-sm btn-default">
                                        </form>


                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{$v_content->total}}</p>
                                </td>
                                <td class="cart_delete">
                                    <form method="GET" id="delete_form-{{$v_content->rowId}}" action="{{URL::to('/delete_to_cart/'.$v_content->rowId)}}" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" class="btn btn-default "
                                            onclick="if (confirm('Are you Sure? you want delete this from Cart? ')){
                                            event.preventDefault();
                                            document.getElementById('delete_form-{{$v_content->rowId}}').submit();
                                            }else{
                                            event.preventDefault();
                                            }">
                                        <a><i class="fa fa-times"></i></a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <?php
                        $customer_id=Session::get('customer_id');
                        ?>
                        @if($customer_id != NULL)
                            <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"> Checkout</i> </a>
                        @else
                            <a class="btn btn-default check_out" href="{{URL::to('/login_check')}}">Check Out</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection

@push('scripts')
@endpush

