<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    
    public function index()
    {
        $result['data']=Events::all();


        return view('admin.events',$result);
    }

    public function add_event(Request $request, $id='')
    {
        if($id>0){
            $arr=Events::where(['id'=>$id])->get();

            $result['name']=$arr['0']->name;
            $result['date']=$arr['0']->date;
            $result['place']=$arr['0']->place;
            $result['price']=$arr['0']->price;
            $result['people']=$arr['0']->people;
            $result['time']=$arr['0']->time;
            $result['desc']=$arr['0']->desc;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['name']='';
            $result['date']='';
            $result['place']='';
            $result['price']='';
            $result['people']='';
            $result['time']='';
            $result['desc']='';
            $result['id']='';
        }
        return view('admin.addevents',$result);
    }

    public function add(Request $request)
    {
        //return $request->post();

        
        $model  = new Events();

        if($request->post('id')>0){
            $model=Events::find($request->post('id'));
        }
        else{

        }
        $model->name=$request->post('eventname');
        $model->date=$request->post('date');
        $model->place=$request->post('place');
        $model->price=$request->post('price');
        $model->people=$request->post('people');
        $model->time=$request->post('time');
        $model->desc=$request->post('desc');
        
        $model->save();

       $request->session()->flash('message','Event Created');
       return redirect('admin/events');
       
    }

    public function delete(Request $request,$id){

        $model=Events::find($id);
        $model->delete();
        return redirect('admin/events');

    }
}
