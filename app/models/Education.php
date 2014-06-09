<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customers extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Education';
    public $timestamps = false;
    protected $fillable = ['ID','Title','Username','Degree','Major','CompletionDate','Country','City','Grade','Description','CvName'];
    public static $rules =[
        'Username'=>'required',
		'Degree'=>'required',
		'Title'=>'required',
		'Major'=>'required',
		'CompletionDate'=>'required',
		'Country'=>'required',
		'City'=>'required',
		'Grade'=>'required',
		'Description'=>'required',
		'CvName'=>'required'
                ];
  public  $errors;
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
    public  function isValid(){
              $validator = Validator::make($this->attributes,static::$rules) ;
              if($validator->passes()){
                return true ;
              }
              $this->errors = $validator->messages();
              return false;
   }
}