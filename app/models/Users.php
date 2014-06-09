<?php

class Users extends Eloquent  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	 protected $table = 'Users';
	 public $timestamps = false;
	 protected $fillable = array('Username','Password','FirstName','MiddleName','LastName','PrimaryEmail','SecondaryEmail','Country','City','PostalCode','Telephone','Mobile','WebsiteLanguage','ContactLanguage','Photo','DateFormat','TimeFormat','UserType','Permissions','Video','MotivationDescription','Nationality','NotificationPeriod','CreatedFrom','LastsessionDateTime','LastUpdateDateTime','LastUpdateBy','Status','Skype','Address','IsAccountActivate');
	public $rules = array(
        'Username'=>'required|unique:Users,Username',
        'password'=>'required|Confirmed',
		'password_confirmation'=>'required',
		'FirstName'=>'required',
		'LastName'=>'required',
		'PrimaryEmail'=>'required|unique:Users,PrimaryEmail|email',
		'SecondaryEmail'=>'sometimes|unique:User,SecondaryEmail|email',
		'Country'=>'required',
		'City'=>'sometimes|required',
		'PostalCode'=>'sometimes|required',
		'Telephone'=>'sometimes|required',
		'Mobile'=>'sometimes|required',
		'WebsiteLanguage'=>'sometimes|required',
		'ContactLanguage'=>'sometimes|required',
		'Photo'=>'sometimes|required|image',
		'DateFormat'=>'sometimes|required',
		'TimeFormat'=>'sometimes|required',
		'Permissions'=>'sometimes|required',
		'Video'=>'sometimes|required',
		'MotivationDescription'=>'sometimes|required',
		'Nationality'=>'sometimes|required',
		'NotificationPeriod'=>'sometimes|required',
		'LastsessionDateTime'=>'sometimes|required',
		'Skype'=>'sometimes|required',
		'Gender'=>'sometimes|required',
		'DateOfBirth'=>'sometimes|required|date',
		'Skype'=>'sometimes|required',
		'Skype'=>'sometimes|required',
		'Skype'=>'sometimes|required'
		);
         
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
