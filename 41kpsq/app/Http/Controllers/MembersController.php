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



}
