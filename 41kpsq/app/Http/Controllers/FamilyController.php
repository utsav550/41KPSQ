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
   
      
        $arr = family::where(['head_id' => $id])
        ->orwhere(['member1' => $id])
        ->orwhere(['member2' => $id])
        ->orwhere(['member3' => $id])
        ->orwhere(['member4' => $id])
        ->orwhere(['member5' => $id])
        ->orwhere(['member6' => $id])
        ->orwhere(['member7' => $id])->get();
        
        $num = count($arr);
       
       
        if($num == 0){
           
            $result2['data2'] =[];
            $result = [];
        }
        else{
         $fatchfamily = $arr['0']->head_id;
        $result2['data2'] = Members::where(['head_id' => $fatchfamily])->get();
        if (empty($arr['0']->id)) {
           
           
        } else {
            $result['id'] = $arr['0']->id;
            
            
        }
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

    public function link(Request $request, $id = '')
    {
        $req = "requested";
        $arr = Members::where(['id' => $request->post('memberid')])->get();
        if (empty($arr['0'])) {
            $request->session()->flash('alert', 'Member not Found with ID!');
        } elseif ($arr['0']->head_id != NULL) {
            $request->session()->flash('alert', 'Someone already added this persone to family.!');
        } else {
            $arr2 = family::where(['head_id' => $id])->get();
            if (empty($arr2['0'])) {
                $model2 = new family();
                $model2->head_id = $id;
                $model2->member1 = $arr['0']->id;
                $model2->save();
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member1 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member1' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member2 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member2' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member3 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member3' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member4 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member4' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member5 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member5' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member6 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member6' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } elseif ($arr2['0']->member7 == Null) {
                $model2 = family::where('head_id', ($arr2['0']->head_id))
                    ->update(['member7' => $arr['0']->id]);
                $model3 = Members::where('id', $request->post('memberid'))
                    ->update(
                        [
                            'head_id' => $id,
                            'relation' => $request->post('relation'),
                            'family_status' => $req
                        ]
                    );
                $request->session()->flash('message', 'Request Sent!');
            } else {
                $request->session()->flash('alert', 'Member not added! You can only add 7 Members!');
            }
            return redirect('member/family/' . $id . '');
        }
        return redirect('member/family/' . $id . '');
    }

    public function req(Request $request, $id)
    {
        $arr = family::where(['head_id' => $id])->get();
        $model2 = Members::where('id', $id)
            ->update(['relation' => null,
                    'family_status' => null,
                    'head_id'=>null
                ]);
       
        for ($k = 1; $k <= 7; $k++) {
            $model = family::where('member' . $k . '', $id)
                ->update(['member' . $k . '' => null]);
            $request->session()->flash('alert', 'request  deleted!');
        }
        return redirect('member/family/' . $id . '');
    }



    public function remove(Request $request, $id)
    {
        $arr = family::where(['head_id' => $id])->get();
        $model2 = Members::where('id', $id)
            ->update(['relation' => null,
                    'family_status' => null,
                    'head_id'=>null
                ]);
       
        for ($k = 1; $k <= 7; $k++) {
            $model = family::where('member' . $k . '', $id)
                ->update(['member' . $k . '' => null]);
            $request->session()->flash('alert', 'request  deleted!');
        }
        return redirect('member/family/'.$id.'');
    }

    public function acc(Request $request, $id)
    {
        $arr = family::where(['head_id' => $id])->get();
        $model2 = Members::where('id', $id)
            ->update([
                    'family_status' => "accepted"
                ]);
       
        
            $request->session()->flash('message', 'request  accepted!');
        
        return redirect('member/family/' . $id . '');
    }
}
