<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Payment;

class PaymentController extends Controller
{
    public function index(Request $request){
        $user = Payment::all();
        if($user){
            return response()->json($this->notif(array('status'=>'success','data'=>$user)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data')));
        }
    }

    public function create(Request $request){
       	$nis = $request->input('nis');
        $school_id = $request->input('school_id');
        $payment = $request->input('payment');
        
        $payment = Payment::create([
            'nis'=> $nis,
            'school_id'=> $school_id,
            'payment'=> $payment,
            'payment_status'=>'N'
        ]);

        if($payment){
            return response()->json($this->notif(array('status'=>'success','id'=>$payment->id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','id')));
        }
    }

    public function info(Request $request,$id){
    	$payment = Payment::where('id',$id)->get();
        if($payment){
            return response()->json($this->notif(array('status'=>'success','data'=>$payment)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }

    public function pay(Request $request,$id){
        $payment_status = $request->input('payment_status');

        $payment = Payment::where('id',$id)->update([
            'payment_status'=> $payment_status
        ]);
        
        if($payment){
            return response()->json($this->notif(array('status'=>'success','count'=>$payment)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','count'=>'')));
        }
    }

    public function delete(Request $request,$id){
        $payment = Payment::where('id',$id)->delete();
        if($payment){
            return response()->json($this->notif(array('status'=>'success','delete'=>$id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','delete'=>'')));
        }
    }
}