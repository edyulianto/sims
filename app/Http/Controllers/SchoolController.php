<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\School;

class SchoolController extends Controller
{
    public function index(Request $request){
        $school = School::all();
        if($school){
            return response()->json($this->notif(array('status'=>'success','data'=>$school)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }

    public function save(Request $request){
        $school_id = $request->input('school_id');
    	$name = $request->input('name');
        $address = $request->input('address');
        
        $register = School::create([
            'school_id'=>$school_id,
            'name'=> $name,
            'address'=> $address
        ]);

        if($register){
            return response()->json($this->notif(array('status'=>'success','id'=>$register->id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','id'=>'')));
        }
    }

    public function get(Request $request,$id){
    	$school = School::where('id',$id)->get();
        if($school){
            return response()->json($this->notif(array('status'=>'success','data'=>$school)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }

    public function update(Request $request,$id){
        $name = $request->input('name');
        $address = $request->input('address');
        
        $school = School::where('school_id',$id)->update([
            'name'=> $name,
            'address'=> $address
        ]);
        
        if($school){
            return response()->json($this->notif(array('status'=>'success','count'=>$school)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','count'=>'')));
        }
    }

    public function delete(Request $request,$id){
        $school = School::where('id',$id)->delete();
        if($school){
            return response()->json($this->notif(array('status'=>'success','delete'=>$id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','delete'=>'')));
        }
    }
}