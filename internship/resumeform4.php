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
<h1 style="font-size: 24px">School Information</h1>
<div class="formbox">
<br></br>
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="">
		<label for="school">School name</label> &nbsp; 
		<input type="text" id="school" name="school" required/><br><br><br>
		
		<label class="required" for="address">School address</label>&nbsp;
		<input type="text" id="address" name="address" required/><br><br><br>
		<label class="required" for="city">City</label>&nbsp;
		<input type="text" id="city" name="city" required/><br><br><br>
		<label class="required" for="state">State</label>&nbsp;
		<input type="text" id="state" name="state" required/><br><br><br>
		<label class="required" for="zip">Zip</label>&nbsp;
		<input type="text" id="zip" name="zip" required/><br><br><br>
		<label class="required" for="yearsCompleted">Years completed</label>&nbsp;
		<input type="text" id="yearsCompleted" name="yearsCompleted" required/><br><br></br>
		<label  for="grad">Have you graduated?</label>&nbsp;
		<input type="checkbox" id="grad" name="grad" /><br><br></br>
		<label class="required" for="degree">Degree earned</label>&nbsp;
		<input type="text" id="degree" name="degree" required/><br><br><br></br>
		</div>
		
		
		
		<input  class="submit" type="submit" name="submit" value="submit"/>
	
	</form>
	
</div>


<?php 
if(isset($_POST['submit'])){
	$con = dbConnectNow();
	$school = mysqli_real_escape_string($con, $_POST['school']);
	
	$addr = mysqli_real_escape_string($con, $_POST['address']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$state = mysqli_real_escape_string($con, $_POST['state']);
	$zip = mysqli_real_escape_string($con, $_POST['zip']);
	$years = mysqli_real_escape_string($con, $_POST['yearsCompleted']); 
	$grad = mysqli_real_escape_string($con, $_POST['grad']);
	$degree = mysqli_real_escape_string($con, $_POST['degree']);
	$sqlCreate = "CREATE TABLE IF NOT EXISTS `temp_user_schools`(
				id int PRIMARY KEY AUTO_INCREMENT,
				user_id int,
				school varchar(60),
				school_address varchar(60),
				city varchar(60) NOT NULL,
				state varchar(60) NOT NULL,
				zip int NOT NULL,
				years_completed int,
				graduated varchar(4),
				degree varchar(30))";
	$queryCreate = mysqli_query($con, $sqlCreate);
	if($queryCreate){
	if(strcmp($grad, "on") == 0){
				$graduated = "yes";
			}
			else{
				$graduated = "no";
			}
		$sesId = $_SESSION['cwwid'];
	$tr = doesPublishResumeExist($_SESSION['cwwid']);	
	if(strcmp($tr, "yes") == 0){
		$sqlInsert = "INSERT INTO `user_schools`(`user_id`, `school`, `school_address`, `city`, `state`, `zip`, `years_completed`, `graduated`, `degree`) VALUES('$sesId', '$school', '$addr', '$city', '$state', '$zip', '$years', '$graduated',  '$degree')";
	}
	else{
	
		$sqlInsert = "INSERT INTO `temp_user_schools`(`user_id`, `school`, `school_address`, `city`, `state`, `zip`, `years_completed`, `graduated`, `degree`) VALUES('$sesId', '$school', '$addr', '$city', '$state', '$zip', '$years', '$graduated',  '$degree')";
	}
		$queryInsert = mysqli_query($con, $sqlInsert);
		if($queryInsert){
			header("location: " . $_SESSION['cwwhomepage']);
		}	
	} 
}	
	
	
	
	
?>
<?php require("footerrelative.php"); ?>	