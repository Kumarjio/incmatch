<?php
	require("publicheader.php");
	
?>

<style>
.jobs{
		border-top: 2px solid grey;
		border-bottom: 2px solid grey;
		display: block;
	}
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
.sidebyside{
		display: inline-block;
		float: none;
		padding: none;
		margin: 0 0 5em 2em;
		position: relative;
		text-align: center;
}
	
.box{
		
		
		margin: 0 0 0 0;
		width: 100%;
		background-color: #192535;
		border-radius: 10px;
		color: #ffffff;
		padding: 5px;
}
input[type="submit"]{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
}
.jobs{
	border: 8px solid #000000; 
	
	padding: 5%; 
	width: 100%; 
	left: 0;
	display: inline-block;
	white-space: pre-wrap; 
	white-space: -moz-pre-wrap;  
	white-space: -pre-wrap;  
	white-space: -o-pre-wrap;  
	word-wrap: break-word;
	overflow: hidden;
}

.hov{
	color: #000000;
}
.hov:hover{
	font-size: 32px;
	color: blue;
	cursor: pointer;
}
tr{
	color: #feb600;
}
.solo{
	border-radius: 10px;
	background-color: #192535;
	padding: 3%;
}
@media screen and (min-width: 360px) and (max-width: 640px){

	h1{
		font-size: 12px
	}
	.small{
		width: 90%;
		font-size: 12px;
		
	
	}
	.box{
		margin: 0 5% 0 5%;
		width: 90%;
	}
	.solo{
		margin-left: 5%;
		padding: 1%;
		width: 90%;
		
	}
}
@media screen and (min-width: 645) and (max-width: 999px){

	h1{
		font-size: 18px
	}
}
@media screen and (min-width: 1000px){
	.jobs{
		width: 25%;
		margin: 2%;
	}
	.box{
		width: 80%;
		margin: 0 5% 0 5%;
	}
	
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




<div class="small" style="padding: 0 2em 0 0">
<h1 id="blurb" style="margin: 1em 0 1em 2em; background-color: #192535; border-radius: 10px; padding: 2em; color: #ffffff">
Thank you for choosing the CyberWatch West Internship Matching Program I.N.C! <br> </br>I.N.C matches you, the internship or job seeker, with potential employers. Take a few minutes to explore the site to see what options are available to you. <br>
Be sure to set your preference about types of internships and jobs. The preferences you set will determine what internships and jobs you see on this home page. You can also delete your past preferences from this page. <br>


	<ul><span style="color: red">Things to do</span>
		<li>Set internship preference</li>
	
		<li>View all participating employers</li>
	
		<li>Create a resume</li>
	
		<li>Search and view external listings</li>
	
	</ul>

<span style="color: red" id="pointer"> Click to hide this introduction.</span><br>
</h1> </div>
<?php
	
	$results = doesJobPrefExist($_SESSION['cwwid']);
	if($results == true){
	
		
?>
<div class="small" style="padding: 2%">
<div class="solo">
<form action="<?php $_SERVER['PHP_SELF']?>" methood="GET">
<label for="type" class="required" style="color: #ffffff">Delete Job Preference:</label>  &nbsp; <br>
		<select type="text" name="type" value="" required/> 
			<?php 
			$sesId = $_SESSION['cwwid']; 
			$jobArray = array(); 
			$jobArray = getJobPref($sesId);
			$jobCount = count($jobArray);
			for($x = 0; $x < $jobCount; $x++){
	 ?>
			<option value="<?php echo $jobArray[$x]; ?>"><?php echo $jobArray[$x]; ?></option>
	<?php } ?>	
		</select><br>
		<input class="submit" type="submit" name="submit" value="submit" />	
</form>
</div>
</div>
<?php 
}

//We are deleting job preferences from the database
	if(isset($_GET['submit'])){
		$con = dbConnectNow();
		$jobType = mysqli_real_escape_string($con, $_GET['type']);	
		$sql = "DELETE FROM `job_pref` WHERE `job_type`= '$jobType'";
		$query = mysqli_query($con, $sql);
		
		if($query){
			header("location: http://cwwinternship.cyberwatchwest.org/internship/home.php?id=" . $_SESSION['cwwid']);

		}
		else{
			echo"<div class='jobInfos' style='float: right'>" . $jobType . " not deleted</div>";
		}
		
	}
	
?>



<div class="" style="background-color: #192535">

<?php 
	 applicantMatch();
	

?>
</div>
</div>


<script type="text/javascript">
function hov(){
	var count = 0;
	var description + count = "<?php echo $description[" + count + "]; ?>";
	getElementByClassName("hov").innerHtml
	switch(description){
		case 0:
			
	}
}
	
</script>


<?php require("publicfooter.php"); ?>
