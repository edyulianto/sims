<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Illuminate\Support\Facades\DB;

class DynamicDatabase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->merge(['db'=>$this->databaseName($request->input('nis'))]);
        return $next($request);
    }

    public function databaseName($nis){
        $result = DB::table('school')->where('nis',$nis)->first();
        if(is_null($result)) return null;
        else return $result->db;
    }
}
