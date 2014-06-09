<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class AbuseReport extends Eloquent implements UserInterface, RemindableInterface {
 
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'AbuseReport';
    public $timestamps = false;
    protected $fillable = array('Username','ReasonID','DateTime');
	public  $rules= array(
	);

	/**
	
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
    public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
	
	
	public  $errors ;
	
	public  function isValid($data){
	$validation= Validator::make($data,$this->rules);
	if($validation->passes()){
		return true ;
	}
	else {
	$this->errors = $validation->messages();
	return false ;	
	}
	}

}