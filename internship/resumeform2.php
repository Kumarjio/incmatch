<?php
	require("publicheader.php");
	
?>

<style>
.formBox:before{
	content: "Education Training and Experience";
	font-weight: bold;
}
.formBox{
	margin: 0 0 0 5%;
	left: 0;
}
@media screen and (min-width: 1000px){
	.resumeForm{
		display: inline-box;
		box-shadow: 4px 4xp 5px grey;
		backgroud-color: #ffff99;
		width: 310px;
		padding: .4em;
	}
	h1{
		left: 0;
		margin: 0 0 2% 28%;
	}
	.formBox{
		position: relative;
		top: 0;
		margin: auto;
		width: 50%;
		
		
		
	}
}
</style>

<div class="formbox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="">
		<h1 style="font-size: 24px; margin: 0">School Information</h1>
		<label class="required" for="school">School name</label>&nbsp;
		<input type="text" id="school" name="school" required/><br><br><br>
		
		<label class="required" for="address">School Address</label>&nbsp;
		<input type="text" id="address" name="address" required/><br><br><br>
		<label class="required" for="city">City</label>&nbsp;
		<input type="text" id="city" name="city" required/><br><br><br>
		<label class="required" for="state">State</label>&nbsp;
		<input type="text" id="state" name="state" required/><br><br><br>
		<label class="required" for="zip">Zip</label>&nbsp;
		<input type="text" id="zip" name="zip" required/><br><br><br>
		<label class="required" for="yearsCompleted">Years Attended</label>&nbsp;
		<input type="text" id="yearsCompleted" name="yearsCompleted" required/><br></br><br></br>
		<label for="grad">Have you graduated?</label>&nbsp;
		<input type="checkbox" id="grad" name="grad" /><br><br></br>
		<label  for="degree">Degree Earned</label>&nbsp;
		<input type="text" id="degree" name="degree" /><br><br><br></br>
		</div>
		
		
		
		<input  class="submit" type="submit" name="submit" value="Next"/>
	
	</form>
	
</div>


<?php 
if(isset($_POST['submit'])){
	
	$con = dbConnectNow();
	$school = mysqli_real_escape_string($con, $_POST['school']);
	
	$addr = mysqli_real_escape_string($con, $_POST['address']);
	$city= mysqli_real_escape_string($con, $_POST['city']);
	$state= mysqli_real_escape_string($con, $_POST['state']);
	$zip= mysqli_real_escape_string($con, $_POST['zip']);
	$years = mysqli_real_escape_string($con, $_POST['yearsCompleted']); 
	$grad = mysqli_real_escape_string($con, $_POST['grad']);
	$degree = mysqli_real_escape_string($con, $_POST['degree']);
	if(strcmp($grad, "on") == 0){
		$graduated = "yes";
	}
	else{
		$graduated = "no";
	}
	$sqlUpdate = "ALTER TABLE `temp_resumes` ADD COLUMN `school` varchar(60) NOT NULL,  ADD COLUMN `school_address` varchar(60) NOT NULL, ADD COLUMN  `city` text NOT NULL, ADD COLUMN  `state` text NOT NULL, ADD COLUMN  `zip` text NOT NULL, ADD COLUMN  `years_completed` int NOT NULL, ADD COLUMN  `graduated` varchar(4) NOT NULL, ADD COLUMN  `degree` varchar(30) NOT NULL";
	$queryAlter = mysqli_query($con, $sqlUpdate); 
	//if($queryAlter){
	$sesId = $_SESSION['cwwid'];
		$sqlInsert = "UPDATE `temp_resumes` SET `school`='$school', `school_address`='$addr', `city`='$city', `state`='$state', `zip`='$zip', `years_completed`='$years', `graduated`='$graduated', `degree`='$degree' WHERE `user_id`='$sesId'";
		$queryInsert = mysqli_query($con, $sqlInsert);
		if($queryInsert){
			header("location: resumeform3.php");
		}
	//}
	



}



?>














<?php require("publicfooter.php"); ?>