<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use function Sodium\add;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
        $qty=$request->qty;
        $product_id=$request->product_id;
        $product_info=DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->first();
        $data['qty']=$qty;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;

        $data['options']['image']=$product_info->product_image;


        /*Cart::add(455, 'Sample Item', 100.99, 2, array());*/
        Cart::add($data);


        return Redirect::to('/show_cart');
        /* echo "<pre>";
         print_r($product_by_details);
         echo "</pre>";
         return view("pages.add_to_cart");*/
    }
    public function show_cart(){
        $all_published_category=DB::table('tbl_category')
            ->where('publication_status',1)
            ->get();
        $manage_published_category=view("pages.add_to_cart")
            ->with('all_published_category',$all_published_category);
        return view('layout')
            ->with('pages.add_to_cart',$manage_published_category);
    }
    public function delete_to_cart($rowId){
        /* echo "$rowId";*/
        Cart::update($rowId,0);

        return Redirect::to('/show_cart');
    }
    public function update_cart(Request $request,$rowId){
        $qty=$request->qty;
        Cart::update($rowId,$qty);

        /*echo "<pre>";
        print_r($rowId);
        echo "</pre>";*/
        return Redirect::to('/show_cart');
    }
}
