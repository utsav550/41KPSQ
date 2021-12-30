<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\Ticket;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Ticket::all();
        


        
        return view('admin.ticket',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {
        $model = new Ticket();

        $arr1 = Ticket::where(['id' => $id])->get();
        $result1['eventName'] = $arr1['0']->eventName;
        $result1['status'] = $arr1['0']->status;
        $result1['date'] = $arr1['0']->date;
        $result1['place'] = $arr1['0']->place;
        $result1['time'] = $arr1['0']->time;
        $result1['totaltickets'] = $arr1['0']->totaltickets;
        $result1['sold'] = $arr1['0']->sold;
        $result1['price'] = $arr1['0']->price;
        echo $result1['status'];
        
        if($result1['status'] == "Availble"){
            $model = Events::find($id);
            $model->eventName = $result1['eventName'];
            $model->status = "Disabled";
            $model->date = $result1['date'];;
            $model->place = $result1['place'];;
            $model->time = $result1['time'];;
            $model->totaltickets = $result1['totaltickets'];
            $model->sold = $result1['sold'];
            $model->price = $result1['price'];
            $model->save();
        }
        else{
        $model->status = "Availble";
        $model->save();
        }
        $result['data']=Ticket::all();
        return view('admin.ticket',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
