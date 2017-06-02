<?php

namespace App\Http\Middleware;

use Closure;
use Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

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
        Config::set("database.connections.dynamic.database", "sims_sky" );
        $result = DB::connection('dynamic')->table('school')->where('nis',$nis)->first();
        if(is_null($result)) return null;
        else return $result->db;
    }
}
