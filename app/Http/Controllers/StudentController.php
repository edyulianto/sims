<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\School;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index(Request $request){
        $student = Student::all();    
        if($student){
            return response()->json($this->notif(array('status'=>'success','data'=>$student)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }

    public function save(Request $request){
    	$name = $request->input('name');
        $nis = $request->input('nis');
        $schoolId = $request->input('school_id');
        $email = $request->input('email');

        $student = Student::create([
            'name'=> $name,
            'nis'=> $nis,
            'school_id'=>$schoolId,
            'email'=>$email
        ]);

        if($student){
            return response()->json($this->notif(array('status'=>'success','id'=>$student->id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','id'=>'')));
        }
    }

    public function get(Request $request,$id){
    	$student = Student::with('school')->find($id);
        
        if($student){
            return response()->json($this->notif(array('status'=>'success','data'=>$student)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }

    public function update(Request $request,$id){
        $name = $request->input('name');
        $schoolId = $request->input('school_id');
        $email = $request->input('email');
        $nis = $request->input('nis');

        $student = Student::where('id',$id)->update([
            'name'=> $name,
            'nis'=> $nis,
            'school_id'=>$schoolId,
            'email'=>$email
        ]);
        
        if($student){
            return response()->json($this->notif(array('status'=>'success','count'=>$student)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','count'=>'')));
        }
    }

    public function delete(Request $request,$id){
        $student = Student::where('id',$id)->delete();
        if($student){
            return response()->json($this->notif(array('status'=>'success','delete'=>$id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','delete'=>'')));
        }
    }
}