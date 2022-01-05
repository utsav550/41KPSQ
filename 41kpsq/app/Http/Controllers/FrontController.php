<?php

namespace App\Http\Controllers;
use App\Models\villages;
use App\Models\front;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt as FacadesCrypt;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/member/userDash');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        $result['data']=villages::all();
        return view('/register', $result);
    }
    public function login(Request $request)
    {
        $result = [];
        return view('/loginuser', $result);
    }

    public function registration_proccess(Request $request)
    {
        $valid=Validator::make($request->all(),[
        "email"=>'email|unique:members,email',
        "mobile"=>'numeric|unique:members,mobile',
        "postcode"=>'numeric',
        "password"=>'confirmed:repassword'
        ]);

    if(!$valid->passes()){
        return response()->json(['status'=>'error',
        'error'=>$valid->errors()->toArray()]);
      }
    else{
        if($request->password == $request->password_confirmation)
        {
        $arr=[
            "fname"=>$request->fname,
            "lname"=>$request->lname,
            "email"=>$request->email,
            "mobile"=>$request->mobile,
            "dob"=>$request->dob,
            "gender"=>$request->gender,
            "village"=>$request->village,
            "address"=>$request->address,
            "suburb"=>$request->suburb,
            "state"=>"queensland",
            "postcode"=>$request->postcode,
            "privacy"=>$request->agree,
            "visa"=>$request->visa,
            "password"=>Crypt::encrypt($request->password),
            "created_at"=>date('Y-m-d h:i:s'),
            "updated_at"=>date('Y-m-d h:i:s')
        ];
        $querry=DB::table('members')->insert($arr);
        if($querry)
        {
            return response()->json(['status'=>'success', 'msg'=>'You are successfully registered! Please Log-in.',
            
        ]);
           
        }
        }
        else{
        return response()->json(['status'=>'error',
        'msg'=>"user not added!",
        
    ]);
        }
    }
}


public function login_process(Request $request)
    {

        $result=DB::table('members')  
            ->where(['email'=>$request->email_login])
            ->get(); 
        
        if(isset($result[0])){
            $db_pwd=Crypt::decrypt($result[0]->password);
            if($db_pwd==$request->password_login){
                
                    if($request->rememberme==null){
                        setcookie('email_login',$request->email_login,100);
                        setcookie('password_login',$request->password_login,100);
                    }else{
                        setcookie('email_login',$request->email_login,time()+60*60*24*365);
                        setcookie('password_login',$request->password_login,time()+60*60*24*365);
                    }
                $request->session()->put('FRONT_USER_LOGIN',true);
                $request->session()->put('FRONT_USER_ID',$result[0]->id);
                $request->session()->put('FRONT_USER_NAME',$result[0]->fname);
                $status="success";
                $msg="";
            }else{
                $status="error";
                $msg="Please enter valid password";
            }
        }else{
            $status="error";
            $msg="Please enter valid email id";
        }
       return response()->json(['status'=>$status,'msg'=>$msg]); 
       //$request->password
    }
}