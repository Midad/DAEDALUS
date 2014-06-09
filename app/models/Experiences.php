<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Customers extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'Experiences';
    public $timestamps = false;
    protected $fillable = ['ID','Username','PositionTitle','FromDate','ToDate','Ongoing','ManagerName-Employer','Country','BisinessSector','JobDescription','CompanyName','CVID'];
    public static $rules =[
        'Username'=>'required',
		'PositionTitle'=>'required',
		'ToDate'=>'required',
		'Ongoing'=>'required',
		'ManagerName-Employer'=>'sometimes|required',
		'Country'=>'required',
		'City'=>'required',
		'BisinessSector'=>'required',
		'JobDescription'=>'sometimes|required',
		'CompanyName'=>'required',
		'CVID'=>'required'
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