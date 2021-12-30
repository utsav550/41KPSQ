<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function index()
    {
        $result['data'] = Events::all();


        return view('admin.events', $result);
    }

    public function add_event(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Events::where(['id' => $id])->get();
            $arr1 = Ticket::where(['id' => $id])->get();

            $result['name'] = $arr['0']->name;
            $result['date'] = $arr['0']->date;
            $result['place'] = $arr['0']->place;
            $result['price'] = $arr['0']->price;
            $result['people'] = $arr['0']->people;
            $result['time'] = $arr['0']->time;
            $result['desc'] = $arr['0']->desc;
            $result['id'] = $arr['0']->id;
            $result1['sold'] = $arr1['0']->sold;
        } else {
            $result['name'] = '';
            $result['date'] = '';
            $result['place'] = '';
            $result['price'] = '';
            $result['people'] = '';
            $result['time'] = '';
            $result['desc'] = '';
            $result['id'] = '';
        }
        return view('admin.addevents', $result, $result1);
    }

    public function add(Request $request)
    {
        //return $request->post();


        $model  = new Events();
        $model2 = new Ticket();

        if ($request->post('id') > 0) {
            $model = Events::find($request->post('id'));
            $model2 = Ticket::find($request->post('id'));

            $model->name = $request->post('eventname');
            $model->date = $request->post('date');
            $model->place = $request->post('place');
            $model->price = $request->post('price');
            $model->people = $request->post('people');
            $model->time = $request->post('time');
            $model->desc = $request->post('desc');
            $model->save();

            $model2->eventName = $request->post('eventname');
            $model2->totaltickets = $request->post('people');
            $model2->date = $request->post('date');
            $model2->place = $request->post('place');
            $model2->time = $request->post('time');
            $model2->price = $request->post('price');
            $model2->status = 'Availble';
            $model2->sold = $request->post('sold');

            $model2->save();
            $request->session()->flash('message', 'Changes Confirmed!');

            return redirect('admin/events');
        } else {
            $model->name = $request->post('eventname');
            $model->date = $request->post('date');
            $model->place = $request->post('place');
            $model->price = $request->post('price');
            $model->people = $request->post('people');
            $model->time = $request->post('time');
            $model->desc = $request->post('desc');

            $model->save();

            $model2->eventName = $request->post('eventname');
            $model2->totaltickets = $request->post('people');
            $model2->date = $request->post('date');
            $model2->place = $request->post('place');
            $model2->time = $request->post('time');
            $model2->price = $request->post('price');
            $model2->status = 'Availble';
            $model2->sold = 0;

            $model2->save();

            $request->session()->flash('message', 'Event Created!');

            return redirect('admin/events');
        }
    }

    public function delete(Request $request, $id)
    {

        $model = Events::find($id);

        $model2 = Ticket::find($id);
        $model2->delete();
        $model->delete();


        return redirect('admin/events');
    }
}
