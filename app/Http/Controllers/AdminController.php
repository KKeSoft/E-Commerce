<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    public function dashboard(Request $request){

    }
    public function admin_dashboard(Request $request){
        $admin_email=$request->email;
        $admin_password=md5($request->password);

        $result=DB::table('tbl_admin')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();

        if ($result){
            session::put('admin_name',$result->admin_name);
            session::put('admin_id',$result->admin_id);
            return redirect()->route('dashboard')->with('successMsg','Admin Login  Successful');
            //return Redirect::to('/dashboard');
        }else{
            session::put('messege','Email or Password Invalid');
            return Redirect::to('/admin');
        }
    }
}
