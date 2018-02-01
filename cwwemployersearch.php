<?php
   
	session_start(); 
	ob_start(); 
	//require DIR . "../publicheader.php";
	
	$root = $_SERVER['DOCUMENT_ROOT'];
	
	require $root . "/inc/publicheader.php";
	
 ?>

<style>
.container:before{
		content: "JOB SEARCH";
	}
.underline{
	border-bottom: 2px solid grey;
	 width: 100%;
	 position: relative;
	 top: -3em;
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
	margin: 3% 5% 0 5%;
}
input[type='text'], input[type='password'], input[type='email'], button, input[type='url'], input[type='tel'], input[type='number']{
	width: 25%;
	margin: 0;
	padding: 0;
}
#pointer{
		font-size: 36px;
	}
@media screen and (min-width: 199px) and (max-width: 299px){
	.underline{
		top: 0;
	}
	#pointer{
		font-size: 24px;
	}

}
@media screen and (min-width: 300px) and (max-width: 800px){
	input[type='text'], input[type='password'], input[type='email'], button, input[type='url'], input[type='tel'], input[type='number']{
		width: 68%;
		margin: 0 0 0 5%;
		
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
	.underline{
		top: 0;
	}
	#pointer{
		font-size: 24px;
	}
}
@media screen and (min-width: 801px) and (max-width: 1144px){
	.container{
		width: 70%;
		padding: 0 0 3% 2%;
		height: auto;
	}
	input[type='text'], input[type='password'], input[type='email'], button, input[type='url'], input[type='tel'], input[type='number']{
		width: 30%;
		
	}
	.underline{
		top: 0;
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
	.underline{
		top: 0;
	}
	
</style>





<div class="mybox"style="">
<h1 class="shadow" style="" id="pointer"> Search External Listings</h1><div class="underline"></div><br>
<h1 id="blurb" style="background-color: ; border-radius: 10px; padding: 2em; color: ">
This is an external job listing search. Jobs from this external search are being displayed from Indeed.com <br>
Enter any IT job title and if there are jobs with that title available in the area you specified, those listings will be displayed for your viewing.  
 <br></br>

<div class="myBox">
<div class="container">
	<form action="cwwjobsearch.php" method="post">
	<br>
		<label class="required" for="job">Employment Type</label>
		<input type="text" id="job" name="job" required /><br><br><br>
		<label for="zipcode">ZIPCODE</label>
		<input type="text" id="zipcode" name="zip"><br><br><br></br>
		<label class="required" for="num">Number of job listings to display</label><br>
		<input type="number" id="num" name="num" required/><br><br><br><br>
		<input class='submit' type="submit" name="submit" value="Find Jobs" />
	</form>


</div>
</div>
<div style="margin-top: 15%">

</div>
</div>
<?php require('publicfooter.php'); ?>