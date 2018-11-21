<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function add_category(){
        $this->AdminAuth();
        return view('admin.add_category');
    }
    public function all_category(){
        $this->AdminAuth();
        $all_category_info=DB::table('tbl_category')->get();
        $manage_category=view("admin.all_category")
            ->with('all_category_info',$all_category_info);
        return view('admin_layout')
            ->with('admin.all_category',$manage_category);
    }
    public function save_category(Request $request){

        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
        ]);

        $data=array();

        $data['category_id']=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        $result=DB::table('tbl_category')->insert($data);
        if ($result){
            return redirect()->route('add_category')->with('successMsg','Category Added Successful');
        }else{
            return Redirect::to('/add_category');
        }
    }
    public function unactive_category($category_id){
        $result=DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status'=>0]);
        if ($result){
            return redirect()->route('all_category')->with('successMsg','Category Activated Successful');
        }else{
            return route('all_category');
        }
    }
    public function active_category($category_id){
        $result=DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update(['publication_status'=>1]);
        if ($result){
            return redirect()->route('all_category')->with('successMsg','Category UnActivated Successful');
        }else{
            return route('all_category');
        }
    }
    public function edit_category($category_id){
        $category_info=DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->first();
        $manage_category_info=view("admin.edit_category")
            ->with('category_info',$category_info);
        return view('admin_layout')
            ->with('admin.edit_category',$manage_category_info);
    }
    public function update_category(Request $request, $category_id){
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
        ]);

        $data=array();

        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        $result=DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);
        if ($result){
            return redirect()->route('all_category')->with('successMsg','Category Updated Successful');
        }else{
            return route('all_category');
        }
    }
    public function delete_category($category_id){
        $result=DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->delete();
        if ($result){
            return redirect()->route('all_category')->with('successMsg','Category Delete Successful');
        }else{
            return route('all_category');
        }
    }
    public function AdminAuth(){
        $admin_id=Session::get('admin_id');
        if ($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        }
    }
}
