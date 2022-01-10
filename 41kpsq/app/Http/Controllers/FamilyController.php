<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Support\Facades\DB;
use App\Models\family;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FamilyController extends Controller
{
    public function index(Request $request, $id = ' ')
    {

        $arr = family::where(['head_id' => $id])->get();

        $result2['data2'] = Members::where(['head_id' => $id])->get();
        if (empty($arr['0']->id)) {
            $result['id'] = 0;
        } else {
            $result['id'] = $arr['0']->id;
        }


        return view('member/family', $result, $result2);
    }

    public function add(Request $request, $id = '')
    {

        $arr = Members::where(['id' => $id])->get();


        $model  = new Members();
        $model->fname = $request->post('fname');
        $model->lname = $request->post('lname');
        $model->dob = $request->post('dob');
        $model->gender = $request->post('gender');
        $model->village = $arr['0']->village;
        $model->address = $arr['0']->address;
        $model->suburb = $arr['0']->suburb;
        $model->state = $arr['0']->state;
        $model->postcode = $arr['0']->postcode;
        $model->visa = $arr['0']->visa;
        $model->password = "test@system";
        $model->status = "Family Account";
        $model->head_id = $id;
        $model->relation = $request->post('relation');
        $model->save();

        $arr = Members::where(['head_id' => $id, 'fname' => $request->post('fname'), 'lname' => $request->post('lname'), 'relation' => $request->post('relation')])->get();
        $arr2 = family::where(['head_id' => $id])->get();


        $delet = 404;
        if (empty($arr2['0'])) {
            $model2 = new family();
            $model2->head_id = $id;
            $model2->member1 = $arr['0']->id;
            $model2->save();
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member1 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member1' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member2 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member2' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member3 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member3' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member4 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member4' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member5 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member5' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member6 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member6' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } elseif ($arr2['0']->member7 == Null) {
            $model2 = family::where('head_id', ($arr['0']->head_id))
                ->update(['member7' => $arr['0']->id]);
            $request->session()->flash('message', 'Member  added!');
        } else {
            $request->session()->flash('alert', 'Member not added! You can only add 7 Members!');
        }

        return redirect('member/family/' . $id . '');
    }

    public function delete(Request $request, $id)
    {
        $idv = session()->get('FRONT_USER_ID');


        $arr = family::where(['head_id' => $idv])->get();



        $model2 = Members::find($id);
        $model2->delete();
        for ($k = 1; $k <= 7; $k++) {
            $model = family::where('member' . $k . '', $id)
                ->update(['member' . $k . '' => null]);
            $request->session()->flash('alert', 'Member  deleted!');
        }





        return redirect('member/family/' . $idv . '');
    }

    public function link(Request $request)
    {
        return redirect('member/search/');
        
    }
}
