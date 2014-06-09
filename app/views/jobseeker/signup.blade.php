<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up - Jobseeker</title>

</head>

<body>
<center><h3>Sign Up - Jobseeker</h3></center>
{{ Form::open(array('route'=> 'jobseeker.store','id'=>'jobseekerSignupForm', 'novalidate'=>'novalidate')) }}
<div class="success"></div>
<table border="0" cellpadding="5" align="center" >
<tr >
<td>Username</td>
<td><input type="text" id="Username" name="Username"/>
{{$errors->first('Username','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>First Name</td>
<td><input type="text" id="FirstName" name="FirstName"/>
{{$errors->first('FirstName','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Last Name</td>
<td><input type="text" id="LastName" name="LastName"/>
{{$errors->first('LastName','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Email</td>
<td><input type="text" id="PrimaryEmail" name="PrimaryEmail"/>
{{$errors->first('PrimaryEmail','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Password</td>
<td><input type="password" id="password" name="password"/>
{{$errors->first('password','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Retype Password</td>
<td><input type="password" id="password_confirmation" name="password_confirmation"/>
{{$errors->first('password_confirmation','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Country</td>
<td>
<select id="Country" name="Country">
<option value=""></option>
<?php 
foreach($country as $con ){
?>
<option  value="<?php echo $con->ID ;?>"><?php echo $con->Name; ?></option>
<?php }?>
</select>
{{$errors->first('Country','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>City</td>
<td>
<select id="City" name="City">
<option value=""></option>
</select>
</td>
</tr>
<tr >

<td>Nationality</td>
<td>
<input  type="hidden" name="Nationality" id="mySingleField" value=""  style="display:none;">
<input type="hidden" name="nation" id="nation" value="{{ $nationality }}" style="display:none;"> 
<ul id="singleFieldTags"> </ul>
{{$errors->first('Nationality','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</tr>
<!-- Male value equal to 1 and Female value equal to 2 --> 
<tr >
<td>Gender</td>
<td><input type="radio" name="Gender" id="Gender" value="1"/>Male 
<input type="radio" name="Gender" id="Gender" value="2"/>Female
{{$errors->first('Gender','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Date Of Birth</td>
<td><input type="text" name="DateOfBirth" id="DateOfBirth"/>
{{$errors->first('DateOfBirth','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr >
<td>Notification Settings</td>
<td><input type="checkbox" name="Notification" id="Notification"/> News & Feature Update </td>
</tr>
<tr >
<td>Language</td>
<td>
<select id="ContactLanguage" name="ContactLanguage">
<option value=""></option>
<?php
foreach($contactLanguage as $Language ){
?>
<option  value="<?php echo $Language->ID ;?>"><?php echo $Language->Value; ?></option>
<?php }?>
</select>
{{$errors->first('ContactLanguage','<span class="error"><i class="fa fa-info-circle"> </i> ::message </span>')}}
</td>
</tr>
<tr align="center">
<td colspan="2">
<input type="submit" id="save" name="save" value="Save" />
</td>

</tr>

</table>
{{ Form::close() }}

    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset-fonts/reset-fonts.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/base/base-min.css">
    <link href="http://fonts.googleapis.com/css?family=Brawler" rel="stylesheet" type="text/css">
    <link href="_static/subpage.css" rel="stylesheet" type="text/css">
    <link href="_static/examples.css" rel="stylesheet" type="text/css">
    
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="css/jquery.datepick.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js" ></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.datepick.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery.validate.min.js')}}"></script>

 
<script >
$(document).ready(function(e){
$('#Country').change(function(){
 var country=$('#Country').val();
 if (country ==""){
$('#City').html("");	 
 }else {
 $.ajax({
          url: 'cities/'+country,
          type: 'get',
         dataType: 'json',
         data: { },
		 success: function(response) {
            if(response.success){
			$('#City').html(response.result);
            } 
        }
      });
 }
 return false;
 });
	

$(function(){
			var nation =$('#nation').val();
			var sampleTags = nation.split(',');
           
            $('#myTags').tagit();
			
            $('#singleFieldTags').tagit({
                availableTags: sampleTags,
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('#mySingleField')
            });
            $('#singleFieldTags2').tagit({
                availableTags: sampleTags
            });

    return false;
        });
////////////////////////////////////////////////////////////////////
$(function() {
	$('#DateOfBirth').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});
///////////////////////////////////////////////////////////////////
$('#jobseekerSignupForm').validate({
		    rules: {
			Username:"required",
			FirstName:"required",
			LastName:"required",
			PrimaryEmail:{ required: true, email: true},
			password:"required",
			password_confirmation: {equalTo : "#password"},
			Country:"required",
			mySingleField:"required",
			Gender:"required",
			DateOfBirth:{ required:true , date:true},
			ContactLanguage:"required"
        },
        messages: {
			Username:"Username Field is required",
			FirstName:"First Name Field is required",
			LastName:"Last Name Field is required",
			PrimaryEmail:"Email Field is required and should be valid email",
			password:"Password Field is required",
			password_confirmation:"Password field does not match Retype Password field",
			Country:"Country Field is required",
			mySingleField:"Nationality Field is required",
			Gender:"Gender Field is required",
			DateOfBirth:"Date of birth is required and in date format ",
			ContactLanguage:"Language Field is required",
        },
       submitHandler: function(form) {
       var o = new Object();
       var Username = $('#Username').val();
	   var FirstName = $('#FirstName').val();
	   var LastName = $('#LastName').val();
	   var PrimaryEmail = $('#PrimaryEmail').val();
	   var password = $('#password').val();
	   var password_confirmation = $('#password_confirmation').val();
	   var Country = $('#Country').val();
	   var Nationality = $('#mySingleField').val();
	   var Gender = $('#Gender').val();
	   var DateOfBirth = $('#DateOfBirth').val();
	   var ContactLanguage = $('#ContactLanguage').val();
	   o.Username=Username;
	   o.FirstName=FirstName;
	   o.LastName=LastName;
	   o.PrimaryEmail=PrimaryEmail;
	   o.password=password;
	   o.password_confirmation=password_confirmation;
	   o.Country=Country;
	   o.Nationality=Nationality;
	   o.Gender=Gender;
	   o.DateOfBirth=DateOfBirth;
	   o.ContactLanguage=ContactLanguage;
       $.ajax({
		url: 'jobseeker',
		type: 'POST',
	    dataType: 'json',
	    data: o,
        success: function(response) {
            if(response.success){
				$('.success').html(response.msg);
            } 
        }
      });
      }
       });
		});

</script>


</body>
</html>