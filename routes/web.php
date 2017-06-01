<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->routeMiddleware([
    'DynamicDatabase' => App\Http\Middleware\DynamicDatabase::class,
]);

$app->get('/', function () use ($app) {
    return $app->version();       
});


$app->group(['middleware' => 'DynamicDatabase','prefix' => 'login'], function($app)
{
	$app->post('', 'LoginController@login');
});


$app->group(['middleware' => 'auth','prefix' => 'user'], function($app)
{
	$app->post('register', 'UserController@register');

	$app->post('', 'UserController@index');

	$app->get('/{id}',['middleware' => 'auth','uses'=>'UserController@get']);
});

$app->group(['middleware' => 'auth','prefix' => 'student'], function($app)
{
	$app->get('','StudentController@index');
	
	$app->post('save','StudentController@save');

	$app->get('/{id}','StudentController@get');

	$app->post('update/{id}','StudentController@update');
 	 
	$app->get('delete/{id}','StudentController@delete');
	
});

$app->group(['middleware' => 'auth','prefix' => 'school'], function($app)
{
	$app->get('','SchoolController@index');

	$app->post('save','SchoolController@save');

	$app->get('/{id}','SchoolController@get');

	$app->post('update/{id}','SchoolController@update');
 	 
	$app->get('delete/{id}','SchoolController@delete');
	
});


$app->group(['middleware' => 'auth','prefix' => 'payment'], function($app)
{
	$app->get('','PaymentController@index');
	
	$app->get('/{id}','PaymentController@info');

	$app->get('pay/{id}','PaymentController@pay');

	$app->get('cancel/{id}','PaymentController@delete');
	
});