<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public $database = 'school_1';

    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->header('api-token');
            $nis = $request->input('nis');
            
            $config = app()->make('config');
            $name = 'database.connections.'.$this->database;
            $config->set($name, [
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'port'      => 3306,
                'database'  => $this->database,
                'username'  => 'root',
                'password'  => 'root',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'timezone'  => '+00:00',
                'strict'    => false,
            ]);            
            if(isset($token)){
                return app('db')->connection($this->database)->table('user')->where('api_token',$token)->first();
            }
        });
    }
}
