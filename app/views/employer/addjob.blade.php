@extends('layouts.index')

@section('content') 
  <h3>Add Job Advertisement</h3>
       {{Form::open(array('route'=> 'job.store', 'id'=>'form1', 'novalidate'=>'novalidate' ,'files' => true))}}
        <p>Job title : </p>
            <input name="Title" type="text" class="text_f" />
         <p>Job Role : </p>
            <input name="Role" type="text" class="text_f" />
         <p>Location Country:</p>
            {{Form::select('Country',$country,'',array('id'=>'Country'))}}
            <div class="city1" style="display:none;">
          <p>City:</p>
            {{Form::select('City',array(),'',array('id'=>'City'))}}
            </div>
           <p>Job Responsibilities:</p>
      {{Form::textarea('Responsibilities','',array('id'=>'Responsibilities','class'=>'text_a ckeditor'))}}
      <p>Job Qualifications:</p>
       <p>Minumum Years Of Experience:</p>
        <input name="YearsOfExperience" type="text" class="text_f" />
        <p>Gender:</p>
      {{Form::radio('Gender' ,'1',false,array('id'=>'Gender'))}}
      {{Form::label('Gender','Male')}}
      {{Form::radio('Gender' ,'2',false,array('id'=>'Gender'))}}
      {{Form::label('Gender','Female')}}
      {{Form::radio('Gender' ,'3',false,array('id'=>'Gender'))}}
      {{Form::label('Gender','Both')}}
      <p>Nationalities:</p>
            <input name="tags" id="mySingleField" value="" disabled="true" style="display:none;">
            <input name="nation" id="nation" value="{{$nation}}" disabled="true" style="display:none;"> <!-- only disabled for demonstration purposes -->
            </p>
            <ul id="singleFieldTags"></ul>
        <p>Contract Type:</p>
         <p>Salary Rate:</p>
          <p>Deadline:</p>
           <p>Number Of Vacancies:</p>
          <p>Way Of Process:</p>
          {{Form::radio('Gender' ,'1',false,array('id'=>'Gender'))}}
      {{Form::label('Gender','By Daedalus Process')}}
      {{Form::radio('Gender' ,'2',false,array('id'=>'Gender'))}}
      {{Form::label('Gender','Recieve CV By Email')}}
      {{Form::radio('Gender' ,'3',false,array('id'=>'Gender'))}}
      {{Form::label('Gender','Redirect To Company Website')}}
      <div class="email" style="display:none">
      <p>Enter Email:</p>
      <input type="email" class="hidden"/>
      </div>
      <div class="website" style="display:none"> 
      <p>Enter Website:</p>
      <input type="text" class="hidden"/>
      </div>
             {{Form::submit('save',array('class'=>'button1'))}}
             
        </form>
        <!-- These few CSS files are just to make this example page look nice. You can ignore them. -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset-fonts/reset-fonts.css">
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/base/base-min.css">
    <link href="http://fonts.googleapis.com/css?family=Brawler" rel="stylesheet" type="text/css">
    <!--<link href="_static/master.css" rel="stylesheet" type="text/css">-->
    <link href="_static/subpage.css" rel="stylesheet" type="text/css">
    <link href="_static/examples.css" rel="stylesheet" type="text/css">
    
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    
    <!-- Although we use jQuery 1.4 here, it's tested with the latest too (1.8.3 as of writing this.) -->
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

    <!-- The real deal -->
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script> 
        <script>
		
		 $(document).ready(function(e) {
			 
			 $('#Country').change(function(){
			 var id =  $('#Country').val();
			 if(id != 0){
	          $('.city1').attr('style','display:inline;');
			 }else {
				 $('.city1').attr('style','display:none;');
			 }
			   $.ajax({
				url: 'getCity/'+id,
				type: 'GET',
				dataType: 'json',
				data: '',
				success: function(response) {

					$('#City').empty();
					$.each(response.cities, function(key, value) {
					 $('#City').append($("<option></option>")
						 .attr("value", key).text(value));
					});
					 //$('#City').attr('option',response.cities);
				}
			  });
				return false;
		   });
			$(function(){
		/* 	var skillTag = $(".skills").tagit({
                tagSource: function (search, showChoices) {
                    var current = this;
                    $.getJSON("/"+$('#language').val()+"/Utility/getTag", { typeID: $('#cat :selected').val(), startWith: search.                     term }, function (data) {
                        var ch = [];
                        $.each(data, function (key, val) {
                            ch.push(val);
                        });
                        showChoices(current._subtractArray(ch, current.assignedTags()));
                    });
                }
            });*/
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
		
		$('#form1').validate({
			  rules: {
            Title: "required",
            
        },
        // Specify the validation error messages
        messages: {
            Title: "This is a required field ",
           
        },
       submitHandler: function(form) {
		   alert($('#mySingleField').val());
		   
	   },
		});
		 });
		</script>
        
        
@endsection