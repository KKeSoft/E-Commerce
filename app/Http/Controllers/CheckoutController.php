<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function login_check(){
        return view('pages.customer_login');
    }
    public function customer_login(Request $request){
        $customer_email=$request->customer_email;
        $password=md5($request->password);

        $result=DB::table('tbl_customer')
            ->where('customer_email',$customer_email)
            ->where('password',$password)
            ->first();

        if ($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return redirect()->route('checkout')->with('successMsg','Customer Login Successful');
        }else{
            return Redirect::to('/login_check');
        }
    }
    public function customer_logout(){
        Session::flush();
        return Redirect::to('/');
    }
    public function customer_registration(Request $request){
        $data=array();
        $customer_name=$request->customer_name;
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['password']=md5($request->password);
        $data['mobile_number']=$request->mobile_number;

        $customer_id=DB::table('tbl_customer')
            ->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$customer_name);

        return Redirect::to('/checkout');
    }
    public function checkout(){
        $this->AdminAuth();
        return view('pages.checkout');
    }
    public function save_shipping_details(Request $request){
        $data=array();
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_mobile_number']=$request->shipping_mobile_number;
        $data['shipping_city']=$request->shipping_city;

        $shipping_id=DB::table('tbl_shipping')
            ->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
    }
    public function payment(){
        $this->SuperAdminAuth();
        return view('pages.payment');
    }

    public function order_place(Request $request){
        $payment_gateway=$request->payment_gateway;

        $pdata=array();
        $pdata['payment_method']=$payment_gateway;
        $pdata['payment_status']='pending';

        $payment_id=DB::table('tbl_payment')
            ->insertGetId($pdata);

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::total();
        $odata['order_status']='pending';

        $order_id=DB::table('tbl_order')
            ->insertGetId($odata);
        $contents=Cart::content();
        $oddata=array();
        foreach ($contents as $v_content){
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$v_content->id;
            $oddata['product_name']=$v_content->name;
            $oddata['product_price']=$v_content->price;
            $oddata['product_sales_quantity']=$v_content->qty;

            DB::table('tbl_order_details')
                ->insert($oddata);
        }
        if ($payment_gateway=="handcash"){
            Cart::destroy();
            return redirect()->route('handcash')->with('successMsg',
                    'Successfully done By Hand Cash');
        }elseif ($payment_gateway=="paypal"){
            Cart::destroy();
            return redirect()->route('handcash')->with('successMsg',
                'Successfully done By paypal');
        }elseif ($payment_gateway=="bkash"){
            Cart::destroy();
            return redirect()->route('handcash')->with('successMsg',
                'Successfully done By Bkash');
        }elseif ($payment_gateway=="payza"){
            Cart::destroy();
            return redirect()->route('handcash')->with('successMsg',
                'Successfully done By payza');
        }elseif ($payment_gateway=="neteller"){
            Cart::destroy();
            return redirect()->route('handcash')->with('successMsg',
                'Successfully done By neteller');
        }
        /*$contents=Cart::content();
        echo $contents;*/
        /*$shipping_id=Session::get('shipping_id');
        $customer_id=Session::get('customer_id');
        echo "Payment = ".$payment_gateway;
        echo "Shipping Id= ".$shipping_id;
        echo "customer Id= ".$customer_id;*/
    }
    public function handcash(){
        return view('pages.handcash');
    }
    public function AdminAuth(){
        $customer_id=Session::get('customer_id');
        if ($customer_id){
            return;
        }else{
            return Redirect::to('/login_check')->send();
        }
    }
    public function SuperAdminAuth(){
        $customer_id=Session::get('customer_id');
        $shipping_id=Session::get('shipping_id');

        if ($customer_id && $shipping_id ){
            return;
        }else{
            return Redirect::to('/checkout')->send();
        }
    }
}
