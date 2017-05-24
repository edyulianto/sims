<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class School extends Model
{ 
	protected $table = 'school';

 	protected $fillable = ['school_id','name','address'];	 

 	public function student(){
 		return $this->hasMany('App\Student');
 	}
}
