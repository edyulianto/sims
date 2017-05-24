<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\User;

class UserController extends Controller
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
        $user = User::all();
        if($user){
            return response()->json($this->notif(array('status'=>'success','data'=>$user)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data')));
        }
    }

    public function register(Request $request){
    	$hash = app()-> make('hash');

    	$username = $request->input('username');
        $nis = $request->input('nis');
        $password = $hash->make($request->input('password'));
        
        $register = User::create([
            'username'=> $username,
            'nis'=> $nis,
            'password'=> $password,
        ]);

        if($register){
            return response()->json($this->notif(array('status'=>'success','id'=>$register->nis)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','id'=>'')));
        }
    }

    public function get(Request $request,$id){
    	$user = User::where('id',$id)->get();
        if($user){
            return response()->json($this->notif(array('status'=>'success','data'=>$user)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }

    public function update(Request $request,$id){
        $nis = $request->input('nis');
        $password = $hash->make($request->input('password'));

        $user = User::where('id',$id)->update([
            'nis'=> $nis,
            'password'=> $password
        ]);
        
        if($user){
            return response()->json($this->notif(array('status'=>'success','count'=>$user->id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','count'=>'')));
        }
    }

    public function delete(Request $request,$id){
        $user = User::where('id',$id)->delete();
        if($user){
            return response()->json($this->notif(array('status'=>'success','data'=>$register->id)));
        }else{
            return response()->json($this->notif(array('status'=>'failed','data'=>'')));
        }
    }
}