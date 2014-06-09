<?php

class EmployerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected $employer;
	protected $employerCV;
	protected $userNames;
	public function __construct (Users $employer, CV $employerCV,UserNames $userNames){
	$this->employer=$employer;
	$this->employerCV=$employerCV;
	$this->userNames=$userNames;		
	}
	public function index()
	{
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
	$country=Country::all();
	$city=City::all();
	$contactLanguage=LookUpValues::where('Name','=','ContactLanguage')->get();
	$companySize=LookUpValues::where('Name','=','CompanySize')->get();
	$companyIndustry=LookUpValues::where('Name','=','CompanyIndustry')->get();
	$companyType=LookUpValues::where('Name','=','CompanyType')->get();
	return View::make('employer.signup',array('country'=>$country,'city'=>$city,'contactLanguage'=>$contactLanguage,
	'companySize'=>$companySize,'companyIndustry'=>$companyIndustry,'companyType'=>$companyType));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $Username=Input::get('Username');
		$FirstName=Input::get('FirstName');
		$LastName=Input::get('LastName');
		$PrimaryEmail=Input::get('PrimaryEmail');
		$password=Input::get('password');
		$password_confirmation=Input::get('password_confirmation');
		$Country=Input::get('Country');
		$City=Input::get('City');
		$Nationality=Input::get('Nationality');
		$Gender=Input::get('Gender');
		$DateOfBirth=Input::get('DateOfBirth');
		$Notification=Input::get('Notification');
		$ContactLanguage=Input::get('ContactLanguage');
		$password2=Hash::make(Input::get('password'));
	   
		$data=array('Username'=>$Username,'FirstName'=>$FirstName,'LastName'=>$LastName,'PrimaryEmail'=>$PrimaryEmail,'password'=>$password,'password_confirmation'=>$password_confirmation,'Country'=>$Country,'Nationality'=>$Nationality,'Gender'=>$Gender,'DateOfBirth'=>$DateOfBirth,'ContactLanguage'=>$ContactLanguage);
		if(! $this->jobseeker->isValid($data)){
       	return Response::json(array('success'=>true,'msg'=>'Whoops : something wrong ! Try again ...'));
		//return Redirect::back()->withInput()->withErrors($this->jobseeker->errors);
        }
	    else { 
		$LastUpdateDateTime=date("Y-m-d h:i:s") ;
		$personalInfo=array('Username'=>$Username,'FirstName'=>$FirstName,'LastName'=>$LastName,'PrimaryEmail'=>$PrimaryEmail,'Password'=>$password2,'Country'=>$Country,'City'=>$City,'Nationality'=>$Nationality,'Status'=>'1','UserType'=>16,'ContactLanguage'=>$ContactLanguage,'LastUpdateBy'=>$Username,'CreatedFrom'=>$Username,'LastUpdateDateTime'=>$LastUpdateDateTime);
        $result1=Users::create($personalInfo);
		$result1->save();
		$result2=$this->jobseekerCV->create(array('Username'=>$Username,'Language'=>'','Title'=>'Primary CV'));
		$result2->save();
		$result4=MoreUserProperties::create(array('Username'=>$Username,'PropertyName'=>'Gender','PropertyValue'=>$Gender));
		$result4->save();
		$result5=MoreUserProperties::create(array('Username'=>$Username,'PropertyName'=>'DateOfBirth','PropertyValue'=>$DateOfBirth));
		$result5->save();
		$result6=NotificationSetting::create(array('Username'=>$Username,'TypeID'=>15,'Status'=>1));
		$result6->save();
		$CVResult=CV::where('Username','=',$Username)->where('Title','=','Primary CV')->get();
		foreach($CVResult as $CV){
		$CVID=$CV->ID;	
		}
		$result3=$this->userNames->create(array('Username'=>$Username,'CVID'=>$CVID,'FirstName'=>$FirstName,
		'LastName'=>$LastName));
		$result3->save();
		
		//return "success "+$CVID;
		//return Redirect::to('client')->with('msg','New Client has been added successfully');
	    return Response::json(array('success'=>true,'msg'=>'Your Registration done successfully , You have to go to your email to activate your account '));
		
	}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	}

}
