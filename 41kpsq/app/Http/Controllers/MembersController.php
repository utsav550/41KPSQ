<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Members;
use App\Models\Ticket;
use Illuminate\Http\Request;

class MembersController extends Controller
{
   
    public function eventlist(Request $request)
    {
        $result['data']=Ticket::all();
        $sort = $result['data'];
        $result['data'] = $sort->sortByDesc('date');
        return view('member/event', $result);
    }

    public function ticket(Request $request)
    {
        $result['data']=Ticket::all();
        $sort = $result['data'];
        $result['data'] = $sort->sortByDesc('date');
        return view('member/ticket', $result);
    }

    public function account(Request $request, $id =' ')
    {
        $arr = Members::where(['id' => $id])->get();
        $result['id'] = $arr['0']->id;
        $result['fname'] = $arr['0']->fname;
        $result['lname'] = $arr['0']->lname;
        $result['email'] = $arr['0']->email;
        $result['mobile'] = $arr['0']->mobile;
        $result['dob'] = $arr['0']->dob;
        $result['gender'] = $arr['0']->gender;
        $result['village'] = $arr['0']->village;
        $result['address'] = $arr['0']->address;
        $result['suburb'] = $arr['0']->suburb;
        $result['state'] = $arr['0']->state;
        $result['postcode'] = $arr['0']->postcode;
        $result['visa'] = $arr['0']->visa;
        
        return view('member/account', $result);
    }

    public function add(Request $request)
    {
        $model  = new Members();
        

        if ($request->post('id') > 0) {
            $model = Members::find($request->post('id'));
           
            $id =  $request->post('id');
            $model->fname = $request->post('fname');
            $model->lname = $request->post('lname');
            $model->email = $request->post('email');
            $model->mobile = $request->post('mobile');
            $model->dob = $request->post('dob');
            $model->gender = $request->post('gender');
            $model->village = $request->post('village');
            $model->address = $request->post('address');
            $model->suburb = $request->post('suburb');
            $model->state = $request->post('state');
            $model->postcode = $request->post('postcode');
            $model->visa = $request->post('visa');
            $model->save();

            
            $request->session()->flash('message', 'Changes Confirmed!');

            return redirect('member/userDash/');
        } 
        
    }
    public function population(Request $request)
    {

        return view('member/population');
    }
public function vmemb(Request $id)
    {
        
        return view('member/villagemembers');
    }


}
