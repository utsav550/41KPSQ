<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminAuth;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
    
        }
        else{
            return view('admin.login');
        }
    
        return view('admin.login');
    }

   
   
    public function auth(Request $request)
    {
       $email=$request->post('email');
       $pass=$request->post('password');
      

       //$result=Admin::where(['email'=>$email, 'password'=>$pass])->get();
       $result=Admin::where(['email'=>$email])->first();
       if($result){
        if(Hash::check( $pass=$request->post('password'),$result->password)){
        $request->session()->put('ADMIN_LOGIN',true);
        $request->session()->put('ADMIN_ID',$result->id);
        return redirect('admin/dashboard');    
        }
        else{
            $request->session()->flash('error','Enter valid Password!');
            return redirect('admin');
        }
        
       }
       else{
        $request->session()->flash('error','Enter valid details!');
        return redirect('admin');
       }
               
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
   
    

}
    
