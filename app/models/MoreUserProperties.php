<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class MoreUserProperties extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'MoreUserProperties';
	public $timestamps = false;
	protected $fillable = array('Username','PropertyName','PropertyValue');
	public static $rules = array(
        'Username'=>'sometimes|required',
        'PropertyName'=>'sometimes|required',
		'PropertyValue'=>'sometimes|required',
		);
         public  $errors;
         public  function isValid(){
              $validator = Validator::make($this->attributes,static::$rules) ;
              if($validator->passes()){
                return true ;
              }
              $this->errors = $validator->messages();
              return false;
   }

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

}
