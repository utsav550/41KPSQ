<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class GalleryController extends Controller
{
    public function index()
    {
        $result2['img'] = gallery::all();
        
        $result['data'] = Events::all();
        return view('admin/gallery', $result,$result2);
    }

    public function add(Request $request)
    {
        $model2 = new gallery();
        $model2->event_id = $request->post('event_id');
        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $img_name=time().'.'.$ext;
            $image->storeAs('/public/gallery', $img_name);
            $model2->name=$img_name;
        }
       
        
       
        $model2->save();

        $request->session()->flash('message', 'image Added!');
        return redirect('admin/gallery');
        
    }


    public function delete(Request $request, $id)
    {

       

        $model2 = gallery::find($id);
        $model2->delete();
  


        return redirect('admin/gallery');
    }
      
}
