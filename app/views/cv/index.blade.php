<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Jobseeker Built CV</title>
</head>

<body>
<center>
<!--editPersonalInformation-->
<h2>Edit Personal Information <a href="#" id="editPersonalData" >Edit</a>
<input type="hidden" id="userID" name="userID" 
value="<?php echo $personalData->Username?> " />
</h2>
{{Form::open()}}
<div id="editPersonalInfo" class="editPersonalInformation" style="display:none;">

<table border="0" cellpadding="5" align="center">
<tr >
<td>First Name</td>
<td><input type="text" id="FirstName" name="FirstName"/></td>
</tr>

<tr >
<td>Middle Name</td>
<td><input type="text" id="MiddleName" name="MiddleName"/></td>
</tr>
<tr >
<td>Last Name</td>
<td><input type="text" id="LastName" name="LastName"/></td>
</tr>
<tr >
<td>Email</td>
<td><input type="text" id="PrimaryEmail" name="PrimaryEmail"/></td>
</tr>
<tr >
<tr >
<td>Secondary Email</td>
<td><input type="text" id="SecondaryEmail" name="SecondaryEmail"/></td>
</tr>

<tr >
<td>Living Country</td>
<td>
<select id="Country" name="Country">
<option ></option>
<?php 
foreach($countryMain as $con ){
?>
<option  value="<?php echo $con->ID ;?>"><?php echo $con->Name; ?></option>
<?php }?>
</select>
</td>
</tr>
<tr >
<td>LivingCity</td>
<td>
<select id="City" name="City">
<option ></option>
</select>
</td>
</tr>
<td>Prefered Language</td>
<td>
<select id="ContactLanguage" name="ContactLanguage">
<option ></option>
<?php
foreach($contactLanguageMain as $Language ){
?>
<option  value="<?php echo $Language->ID ;?>"><?php echo $Language->Value; ?></option>
<?php }?>

</select>
</td>
</tr>
<tr >
<td>Social media account</td>
<td><input type="text" id="JobseekerSocialmediaaccount" name="JobseekerSocialmediaaccount"/></td>
</tr>
<tr >
<td>Website</td>
<td><input type="text" id="JobseekerWebsite" name="JobseekerWebsite"/></td>
</tr>
<tr >
<td>Martial status</td>
<td>
<select id="JobseekerMartialstatus" name="JobseekerMartialstatus">
<option ></option>
</select>
</td>
</tr>
<tr>
<td><img src="../../../../translate/public/uploads/1400056576.jpg" style="width: 40px; height:40px"  /></td>
<td>upload new image <input type="file" name="video"  id="video"/></td>
</tr>

<tr>
<td>cv video</td>
<td><input type="file" name="video"  id="video"/></td>
</tr>

<tr>
<td colspan="2">
<input type="submit" id="save" name="save" value="Save" />
</td>
</tr>
</table>
</div>

{{ Form::close() }}

<div id="showPersonalInfo">
<h2>Show Personal Information</h2>
<table border="0" cellpadding="5" align="center">
<tr >
<td>First Name</td>
<td>{{$personalData->FirstName}}</td>
</tr>
<tr >
<td>middle Name</td>
<td>{{$personalData->MiddleName}}</td>
</tr>
<tr >
<td>Last Name</td>
<td>{{$personalData->LastName}}</td>
</tr>
<tr >
<td>Email</td>
<td>{{$personalData->PrimaryEmail}}</td>
</tr>
<tr >
<tr >
<td>Secondary Email</td>
<td>{{$personalData->SecondaryEmail}}</td>
</tr>

<tr >
<td>Living Country</td>
<td>{{$personalData->Country}}</td>
</tr>
<tr >
<td>Living City</td>
<td>{{$personalData->City}}</td>
</tr>
<td>Prefered Language</td>
<td>{{$personalData->ContactLanguage}}</td>
</tr>
<tr >
<td>Social media account</td>
<td>{{$MoreUserProperties->PropertyValue}}</td>
</tr>
<tr >
<td>Website</td>
<td></td>
</tr>
<tr >
<td>Martial status</td>
<td></td>
</tr>
<tr>
<td><img src="" style="width: 40px; height:40px"  /></td>
</tr>
<tr>
<td>cv video</td>
<td><input type="file" name="video"  id="video"/></td>
</tr>
</table>
</center>
<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}" ></script>
<script>
$(document).ready(function(e) {
   $('#editPersonalData').click(function(){
	$("#showPersonalInfo").hide(); 
	$( "#editPersonalInfo" ).show();
	$('#editPersonalData').hide(); 
	var userID=$('#userID').val();
	 $.ajax({
          url: '../editPersonalData/'+userID,
          type: 'get',
         dataType: 'json',
         data: { },
		 success: function(response) {
            if(response.success){
			$('#FirstName').val(response.FirstName);
			$('#MiddleName').val(response.MiddleName);
			$('#LastName').val(response.LastName);
			$('#PrimaryEmail').val(response.PrimaryEmail);
			$('#SecondaryEmail').val(response.SecondaryEmail);
			$('#Country').val(response.Country);
			$('#City').val(response.City);
			$('#ContactLanguage').val(response.ContactLanguage);
            } 
        }
      });
   });
});

</script>

</body>
</html>