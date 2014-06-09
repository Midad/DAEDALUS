<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cp</title>
<link rel="stylesheet" href="{{URL::asset('css/style.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{URL::asset('fonts/fs/font-awesome.css')}}" type="text/css"/>
<link type="text/css" href="{{URL::asset('css/table.css')}}" rel="stylesheet">

<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript">


ddaccordion.init({ //top level headers initialization
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

ddaccordion.init({ //2nd level headers initialization
	headerclass: "subexpandable", //Shared CSS class name of sub headers group that are expandable
	contentclass: "subcategoryitems", //Shared CSS class name of sub contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["opensubheader", "closedsubheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>
<!--<script>
	$(function() {
		$( "#accordion" ).accordion({
			collapsible: true
		});
	});
</script>-->
</head>

<body>
<div class="header_container"><div class="header_warp"><div class="bg_clear"><div class="header"><img height = "255" width="211" src="{{URL::asset('images/emcc-control.png')}}" /> <p>Control Panel Of EMCC </p></div></div></div></div>
<div class="warp">
<div class="titl"><h1><div class="title_img"><img src="{{URL::asset('images/icon1.png')}}" /></div>@yield('title')</h1></div>
<div class="content">
<div class="right">
<div class="arrowlistmenu">

<h3 class="menuheader expandable" style="cursor: default">About EMCC</h3>
                <ul class="categoryitems">
                	<li><a href="">Founders</a></li>
                    <li><a href="">Organization Structure </a></li>
                    <li><a href="">Values </a></li>
</ul>
<h3 class="menuheader expandable" style="cursor: default">Services</h3>
                <ul class="categoryitems">
                	<li><a href="">Architecture and Engineering</a></li>
                    <li><a href="">Organization Management and Development </a></li>
                    <li><a href="">Assessment and Evaluation </a></li>
</ul>
<h3 class="menuheader expandable" style="cursor: default">Projects</h3>
                <ul class="categoryitems">
                	<li><a href="">All Projects</a></li>
                    <li><a href="">New Project </a></li>
</ul>
<h3 class="menuheader"><a href="">Contact</a></h3>
<h3 class="menuheader"><a href="">Log Out</a></h3>

</div>
    </div>
    <div class="left">
    	
        <div class="left_content">
            @yield('content');
        </div>
    </div>
    
   </div>
   
</div>
</body>
</html>
