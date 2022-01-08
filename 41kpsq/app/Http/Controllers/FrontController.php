<?php

namespace App\Http\Controllers;
use App\Models\villages;
use App\Models\front;
use App\Http\Controllers\Controller;
use App\Models\Events;
use App\Models\gallery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt as FacadesCrypt;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function email_verification(Request $request,$id){
        $result=DB::table('members')  
        ->where(['rand_code'=>$id])
        ->get();
        if(isset($result[0])){
            $result=DB::table('members')  
            ->where(['id'=>$result[0]->id])
            ->update(['status'=>"verified"],['rand_code'=>""]);
            
        return view('loginuser');
        }else{
            return redirect('/');
        }
    }
    public function indexdata()
    {
        $result2['img'] = gallery::all();
        
        $result['data'] = Events::all();
        return view('welcome', $result,$result2);
       
    }

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
    public function forgot(Request $request)
    {
        $result=[];
        return view('/forgotpassword', $result);
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
            $rand=rand(111111,999999);
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
            "status"=>"unverified",
            "rand_code"=>$rand,
            "created_at"=>date('Y-m-d h:i:s'),
            "updated_at"=>date('Y-m-d h:i:s')
        ];
        $querry=DB::table('members')->insert($arr);
        if($querry)
        {
            $data=['name'=>$request->name,'rand_id'=>$rand];
            $user['to']=$request->email;
            Mail::send('email_verification',$data,function($messages) use 
            ($user){
                $messages->to($user['to']);
                $messages->subject('Email Id Verification');
            });

            return response()->json(['status'=>'success', 'msg'=>'You are successfully registered! Please check email for verification.',
            
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
            $status=$result[0]->status;
            if($status=="unverified"){
                return response()->json(['status'=>"error",'msg'=>'E-mail not verified! Please check email.']);
            }
            if($status=="blocked"){
                return response()->json(['status'=>"error",'msg'=>'Your Account is Deactivated.']);
            }
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
    
    public function forgot_password(Request $request)
    {
        
        $result=DB::table('members')  
            ->where(['email'=>$request->str_forgot_email])
            ->get(); 
            $rand=rand(111111,999999);
        if(isset($result[0])){

            DB::table('members')  
                ->where(['email'=>$request->str_forgot_email])
                ->update(['rand_code'=>$rand]);

                $data=['rand_code'=>$rand];
                $user['to']=$request->str_forgot_email;
                Mail::send('forgot_password',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject("Forgot Password");
            });
            return response()->json(['status'=>'success','msg'=>'Please check your email for password']); 
        }else{
            return response()->json(['status'=>'error','msg'=>'Email id not registered']); 
        }
    }


    public function forgot_password_change(Request $request,$id)
    {
        $result=DB::table('members')  
            ->where(['rand_code'=>$id])
            
            ->get(); 

        if(isset($result[0])){
            $request->session()->put('FORGOT_PASSWORD_USER_ID',$result[0]->id);
        
            return view('forgot_password_change');
        }else{
            return redirect('/');
        }
    }

    public function forgot_password_change_process(Request $request)
    {
        DB::table('members')  
            ->where(['id'=>$request->session()->get('FORGOT_PASSWORD_USER_ID')])
            ->update(
                [
                    'password'=>Crypt::encrypt($request->password),
                    'rand_code'=>'0'
                ]
                
            ); 
            return view('/loginuser');     
    }
}
