<?php

namespace App\Http\Controllers;

use App\Models\villages;
use Illuminate\Http\Request;

class VillagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = villages::all();


        return view('admin.village', $result);
    }

    public function delete(Request $request, $id)
    {

        $model = villages::find($id);

        $model->delete();


        return redirect('admin/village');
    }


    public function add(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = villages::where(['id' => $id])->get();
           

            $result['village'] = $arr['0']->village;
            
            $result['id'] = $arr['0']->id;
            
        } else {
            $result['village'] = '';
           
            $result['id'] = '';
           
        }
        return view('admin.addvillage', $result);
    }

    public function addv(Request $request, $id = '')
    {
        //return $request->post();

        echo $id;
                $model  = new villages();
       

        if ($request->post('id') > 0) {
            $model = villages::find($request->post('id'));
            $model->village = $request->post('villagename');
           
            $model->save();

           
            $request->session()->flash('message', 'Changes Confirmed!');

            return redirect('admin/village');
        } else {
            $model->village = $request->post('villagename');
            

            $model->save();

           
            $request->session()->flash('message', 'village added!');

            return redirect('admin/village');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\villages  $villages
     * @return \Illuminate\Http\Response
     */
    public function show(villages $villages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\villages  $villages
     * @return \Illuminate\Http\Response
     */
    public function edit(villages $villages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\villages  $villages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, villages $villages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\villages  $villages
     * @return \Illuminate\Http\Response
     */
    public function destroy(villages $villages)
    {
        //
    }
}

