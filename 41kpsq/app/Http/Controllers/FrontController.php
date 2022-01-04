<?php

namespace App\Http\Controllers;

use App\Models\front;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        $result = [];
        return view('/register', $result);
    }

    public function registration_proccess(Request $request)
    {
      prx($_POST);
    }

    
    }
