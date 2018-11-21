<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ManufactureController extends Controller
{
    public function add_manufacture(){
        $this->AdminAuth();
        return view('admin.add_manufacture');
    }

    public function save_manufacture(Request $request){
        $this->validate($request,[
            'manufacture_name'=>'required',
            'manufacture_description'=>'required',
        ]);
        $data=array();
        $data['manufacture_name']= $request->manufacture_name;
        $data['manufacture_description']= $request->manufacture_description;
        $data['publication_status']=$request->publication_status;

        $result=DB::table('tbl_manufacture')->insert($data);
        if ($result){
            return redirect()->route('add_manufacture')->with('successMsg','Manufacture Added Successful');
        }else{
            return Redirect::to('/add_manufacture');
        }
    }
    public function all_manufacture(){
        $this->AdminAuth();
        $all_manufacture_info=DB::table('tbl_manufacture')->get();
        $manage_manufacture=view("admin.all_manufacture")
            ->with('all_manufacture_info',$all_manufacture_info);
        return view('admin_layout')
            ->with('admin.all_manufacture',$manage_manufacture);
    }
    public function unactive_manufacture($manufacture_id){
        $result=DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status'=>0]);
        if ($result){
            return redirect()->route('all_manufacture')
                ->with('successMsg',"Manufacture UnActive Successfully");
        }else{
            return route('all_manufacture');
        }
    }
    public function active_manufacture($manufacture_id){
        $result=DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update(['publication_status'=>1]);
        if ($result){
            return redirect()->route('all_manufacture')
                ->with('successMsg','Publication Status Active Successfully');
        }else{
            return redirect()-route('all_category');
        }
    }
    public function edit_manufacture($manufacture_id){
        $manufacture_info=DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->first();
        $manage_manufacture=view('admin.edit_manufacture')
            ->with('manufacture_info',$manufacture_info);
        return view('admin_layout')
            ->with('admin.edit_manufacture',$manage_manufacture);
    }
    public function update_manufacture(Request $request, $manufacture_id){
        $this->validate($request,[
            'manufacture_name'=>'required',
            'manufacture_description'=>'required',
        ]);

        $data=array();
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;

        $result=DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->update($data);
        if ($request){
            return redirect()->route('all_manufacture')
                ->with('successMsg','Manufacture Update SuccessFully');
        }else{
            return redirect()->route('all_manufacture')
                ->with('failedMsg','Manufacture Updated Failed');
        }
    }
    public function delete_manufacture($manufacture_id){
        $result=DB::table('tbl_manufacture')
            ->where('manufacture_id',$manufacture_id)
            ->delete();
        if ($result){
            return redirect()->route('all_manufacture')
                ->with('successMsg','Manufacture Delete SuccessFully');
        }else{
            return redirect()->route('all_manufacture')
                ->with('failedMsg','Manufacture Deletion Failed');
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
