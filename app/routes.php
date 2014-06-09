<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$CVResult=CV::where('Username','=','Mohammed')->where('Title','=','Primary CV')->get();
		foreach($CVResult as $CV){
		$CVID=$CV->ID;	
		}
		$LastUpdateDateTime=date("Y-m-d h:i:s") ;
	return $CVID;
});

Route::resource('jobseeker','JobSeekerController');
Route::resource('employer','EmployerController');
Route::get('JobSeekerSignup','JobSeekerController@create');
Route::get('cities/{id}','JobSeekerController@city');
Route::get('EmployerSignup','EmployerController@create');
Route::get('mycvs/{username}','JobSeekerController@mycv');
Route::get('editPersonalData/{username}','JobSeekerController@editPersonalData');
