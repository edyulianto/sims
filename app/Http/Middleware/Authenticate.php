<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\User;
use Request;

class Authenticate extends DynamicDatabase
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */

    // public $database = 'school_1';
    
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(is_null($request->input('nis')) || $request->input('nis') == '') 
            return response(array('status'=>'Warning','message'=>'login failed1'));
        $database = $this->databaseName($request->input('nis'));

        if(!is_null($database)){
            if ($this->auth->guard($guard)->guest()) {
                $token = $request->header('api-token');

                if(isset($token)){
                    Config::set("database.connections.mysql.database", $database);
                    $check_token = User::where('api_token',$token)->first();
                    if($check_token==null){
                        return response(array('status'=>'Warning','message'=>'login failed2'));
                    }
                }else{
                    return response(array('status'=>'Warning','message'=>'login failed3'));
                }
            }        
        }else{
            return response(array('status'=>'Warning','message'=>'login failed4'));
        }
        return $next($request->merge(['db'=>$database]));
    }
}
