<?php
   
	session_start(); 
	ob_start(); 
	require("publicheader.php");
 ?>

<style>
.container:before{
		content: "JOB SEARCH";
	}
.container{
	left: 0;
	margin: 0;
	background-color: #192535;
	color: #ffffff;
	width: 50%;
	border-radius: 10px;
}
label{
	color: #ffffff;
}
input[type="submit"]{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
}
.sidebyside{
	display: inline-block;
}
.jobInfos{
	left: 0;
	
}
.myBox{
	padding: 0 2em 0 2em;
	margin-top: 2%;
}
input[type='text'], input[type='password'], input[type='email'], button, input[type='url'], input[type='tel'], input[type='number']{
	width: 30%;
	margin: 0;
	padding: 0;
}
@media screen and (min-width: 300px) and (max-width: 800px){
	input[type='text'], input[type='password'], input[type='email'], button, input[type='url'], input[type='tel'], input[type='number']{
		width: 88%;
	}
	.container{
		
		width: 100%;
		padding: 1% 0 1% 5%;
		text-align: center;
	}
	#blurb{
		width: 100%;
		margin: 3% 0 3% 0;
	}
	.myBox{
		margin: 0;
		padding: 0;
	}
}
@media screen and (min-width: 801px) and (max-width: 1144px){
	.container{
		width: 50%;
		padding: 0 0 3% 8%;
		height: auto;
	}
	input[type='text'], input[type='password'], input[type='email'], button, input[type='url'], input[type='tel'], input[type='number']{
		width: 30%;
		
	}
	
}
@media screen and (min-width: 1145px){
	 #blurb{
		margin: 0 0 3% 0;
		left: 0;
		padding: 0;
		right: 0;
	}
	.container{
		padding: 3% 0 3% 5%;
	}
	
	
</style>

<script type="text/javascript">
$(document).ready(function(){
	$("#pointer").css("cursor", "pointer");
    $("#pointer").click(function(){
       $("#blurb").hide();
        var button = $('<input type="submit" name="showH1" value="Press Me to see the introduction" />');
        button.css({"margin": "0 0 5em 5em", "cursor": "pointer"});
      	
        $("div").eq(2).append(button);
        button.click(function(){
        	$("#blurb").show();
        	button.hide();
        });
       
    });
    $("#blurb").dblclick(function(){
    
    	$(this).hide();
    });
     
});

</script>



<div class="mybox"style="">
<h1 id="blurb" style="background-color: #192535; border-radius: 10px; padding: 2em; color: #ffffff">
This is an external job listing search. Jobs from this external search are being displayed from Indeed.com Enter any IT job title and if there are jobs with that title avaible in the area you specified, those listings will be displayed for your viewing.  
 <br></br>

<span style="color: red" id="pointer"> Click to remove introduction</span></h1> </div>
<div class="myBox">
<div class="container">
	<form action="cwwjobsearch.php" method="post">
	<br>
		<label class="required" for="job">Internship Title</label>
		<input type="text" id="job" name="job" required /><br><br><br>
		<label for="zipcode">Zipcode</label>
		<input type="text" id="zipcode" name="zip"><br><br><br></br>
		<label class="required" for="num">Number of job listings to display</label><br>
		<input type="number" id="num" name="num" required/><br><br><br><br>
		<input class='submit' type="submit" name="submit" value="Find Jobs" />
	</form>


</div>
</div>
<div style="margin-top: 15%">

</div>

<?php require("publicfooter.php"); ?>