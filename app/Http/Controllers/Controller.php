<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Config;

class Controller extends BaseController
{

    public $database;
    
    public function __construct(Request $request)  
    {                        
        if(is_null($this->database)){
            $this->database = $request->input('db');
            Config::set("database.connections.mysql.database", $this->database );
        }else{
            dd(Config::get("database.connections.mysql"));
        }
    }

    public function notif($data){
        $pesan;
    	switch ($data['status']) {
            case 'failed':
                if(isset($data['message']))
                    $pesan = array('message'=>$data['message']);
                else if(isset($data['id']))
                    $pesan = array('status'=>'failed','message'=>'Data cannot saved.',);
                else if(isset($data['delete']))
                    $pesan = array('status'=>'failed','message'=>'Data cannot delete.'); 
                else if (isset($data['count']))
                    $pesan = array('status'=>'failed','message'=>'Data cannot be change.',);
                break;
            default :
                if(isset($data['data']))                    
                    $pesan = array('status'=>'success','message'=>'Data has been successfully loaded.', 'data'=>$data['data']); 
                else if (isset($data['id']))
                    $pesan = array('status'=>'success','message'=>'Data has been successfully saved.', 'id'=>$data['id']);
                else if (isset($data['count']))
                    $pesan = array('status'=>'success','message'=>'Data has been successfully saved.', 'id'=>$data['count']);
                else if(isset($data['delete']))
                    $pesan = array('status'=>'success','message'=>'Data has been successfully delete.'); 
                break;
    	}
        return $pesan;
    }
}
