<?php
	require("publicheader.php");
	
?>

<style>
.formBox:before{
	content: "Employment History";
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
		margin: 0 0 2% 25%;
	}
	.formBox{
		position: relative;
		top: 0;
		margin: auto;
		width: 50%;
		
		
		
	}
}
</style>
<h1 style="font-size: 24px">Employer Information</h1>
<div class="formbox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="resumeform">
			
		<label class="" for="emp">Employer name</label>&nbsp;
		<input type="text" id="emp" name="emp" /><br><br><br>
		<label class="" for="supervisor">Supervisor Name</label>&nbsp;
		<input type="text" id="supervisor" name="supervisor" /><br><br><br>
		<label class="" for="address">Employer Address</label>&nbsp;
		<input type="text" id="address" name="address" /><br><br><br>
		<label class="" for="city">City</label>&nbsp;
		<input type="text" id="city" name="city" /><br><br><br>
		<label class="" for="state">State</label>&nbsp;
		<input type="text" id="state" name="state" /><br><br><br>
		<label class="" for="zip">Zip</label>&nbsp;
		<input type="text" id="zip" name="zip" /><br><br><br>
		<label class="" for="phone">Employer Phone number</label>&nbsp;
		<input type="tel" id="phone" name="phone" /><br><br><br>
		<label class="" for="length">Length of Employment?</label>&nbsp;
		<h2>Begin Date</h2>
		<input type="date" id="length" name="begin" /><br>
		<h2>End Date</h2>
		<input type="date" id="length"name="end" /><br></br>
		<label class="" for="pos">Position & Duties</label>&nbsp;
		<textarea rows="4" cols="20" id="pos" name="pos" > </textarea><br><br></br>
		<label class="" for="leave">Reason For Leaving</label>&nbsp;
		<textarea rows="4" cols="20" id="leave" name="leave" > </textarea><br><br></br>
		</div>
		
		
		
		<input  class="submit" type="submit" name="submit" value="submit"/>
	
	</form>
	
</div>
		
		
<?php 
if(isset($_POST['submit'])){
	$con = dbConnectNow();
	$emp= mysqli_real_escape_string($con, $_POST['emp']);
	$super= mysqli_real_escape_string($con, $_POST['supervisor']); 
	$addr = mysqli_real_escape_string($con, $_POST['address']);
	$city = mysqli_real_escape_string($con, $_POST['city']);
	$state = mysqli_real_escape_string($con, $_POST['state']);
	$zip = mysqli_real_escape_string($con, $_POST['zip']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']); 
	$begin = mysqli_real_escape_string($con, $_POST['begin']);
	$end = mysqli_real_escape_string($con, $_POST['end']);	
	$position = mysqli_real_escape_string($con, $_POST['pos']);
	$leave = mysqli_real_escape_string($con, $_POST['leave']);	
	$sqlUpdate = "CREATE TABLE IF NOT EXISTS `temp_user_employer` (
				id int PRIMARY KEY AUTO_INCREMENT,
				user_id int,
				employer varchar(60) NOT NULL, 				
				supervisor varchar(60) NOT NULL, 
				employer_address varchar(60) NOT NULL, 
				e_city varchar(60) NOT NULL,
				e_state varchar(60) NOT NULL, 
				e_zip int NOT NULL, 
				employer_phone_number int NOT NULL,
				length_of_job int NOT NULL,
				position_held varchar(30) NOT NULL, 
				reason_for_leaving varchar(30) NOT NULL,
				begin_date date NOT NULL,
				end_date date NOT NULL)";
	$queryAlter = mysqli_query($con, $sqlUpdate); 
	if($queryAlter){
		$lenz = strtotime($end) - strtotime($begin);
		$len = 34;
		$sesId = $_SESSION['cwwid'];
	$tr = doesPublishResumeExist($_SESSION['cwwid']);	
	if(strcmp($tr, "yes") == 0){
		$sqlInsert = "INSERT INTO `user_employer`(`user_id`, `employer`, `supervisor`, `employer_address`, `e_city`, `e_state`, `e_zip`, `employer_phone_number`, `length_of_job`, `position_held`, `reason_for_leaving`, `begin_date`, `end_date`) VALUES('$sesId', '$emp', '$super', '$addr', '$city', '$state', '$zip', '$phone', '$lenz', '$position', '$leave', '$begin', '$end')";
	}
	else{
		$sqlInsert = "INSERT INTO `temp_user_employer`(`user_id`, `employer`, `supervisor`, `employer_address`, `e_city`, `e_state`, `e_zip`, `employer_phone_number`, `length_of_job`, `position_held`, `reason_for_leaving`, `begin_date`, `end_date`) VALUES('$sesId', '$emp', '$super', '$addr', '$city', '$state', '$zip', '$phone', '$lenz', '$position', '$leave', '$begin', '$end')";
	}
		$queryInsert = mysqli_query($con, $sqlInsert);
		if($queryInsert){
			header("location: " . $_SESSION['cwwhomepage']);
		}
	
	
	
	
	
	
	
	}
}




	
?>




<?php require("footerrelative.php"); ?>