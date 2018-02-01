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

<div class="formbox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="resumeform">
			<h1 style="font-size: 24px">Most Recent Employer</h1>
		<label class="" for="emp">Company name</label>&nbsp;
		<input type="text" id="emp" name="emp" /><br><br><br>
		<label class="" for="supervisor">Supervisor name</label>&nbsp;
		<input type="text" id="supervisor" name="supervisor" /><br><br><br>
		<label class="" for="address">Company address</label>&nbsp;
		<input type="text" id="address" name="address" /><br><br><br>
		<label class="" for="city">City</label>&nbsp;
		<input type="text" id="city" name="city" /><br><br><br>
		<label class="" for="state">State</label>&nbsp;
		<input type="text" id="state" name="state" /><br><br><br>
		<label class="" for="zip">Zip</label>&nbsp;
		<input type="text" id="zip" name="zip" /><br><br><br>
		<label class="" for="phone">Company phone number</label>&nbsp;
		<input type="tel" id="phone" name="phone" /><br></br><br></br>
		<label class="" for="length">Begin Date</label>&nbsp;	<br>	
		<input type="date" id="length" name="begin" /><br></br><br></br>
		<label class="" for="lengthEnd">End Date</label>&nbsp;<br>
		<input type="date" id="lengthEnd"name="end" /><br></br>
		<label class="required" for="pos">Position and Duties</label>&nbsp;
		<textarea rows="4" cols="20" id="pos" name="pos" required> </textarea><br><br></br>
		<label for="leave">Reason for Leaving</label>&nbsp;
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
	$city= mysqli_real_escape_string($con, $_POST['city']);
	$state= mysqli_real_escape_string($con, $_POST['state']);
	$zip= mysqli_real_escape_string($con, $_POST['zip']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']); 
	$begin = mysqli_real_escape_string($con, $_POST['begin']);
	$end= mysqli_real_escape_string($con, $_POST['end']);	
	$position = mysqli_real_escape_string($con, $_POST['pos']);
	$leave = mysqli_real_escape_string($con, $_POST['leave']);	
	$sqlUpdate = "ALTER TABLE `temp_resumes` ADD COLUMN `employer` varchar(60) NOT NULL, ADD COLUMN `supervisor` varchar(60) NOT NULL, ADD COLUMN  `e_city` text NOT NULL, ADD COLUMN  `e_state` text NOT NULL, ADD COLUMN  `e_zip` text NOT NULL, ADD COLUMN  `employer_phone_number` int NOT NULL, ADD COLUMN `length_of_job` int NOT NULL, ADD COLUMN  `position_held` varchar(30) NOT NULL, ADD COLUMN  `reason_for_leaving` varchar(30) NOT NULL, ADD COLUMN  `begin_date` date NOT NULL, ADD COLUMN  `end_date` date NOT NULL";
	$queryAlter = mysqli_query($con, $sqlUpdate); 
	//if($queryAlter){
		$lens =strtotime($begin) - strtotime($end);
		$len = 34;
		$sesId = $_SESSION['cwwid'];
		$sqlInsert = "UPDATE `temp_resumes` SET `employer`='$emp', `supervisor`='$super', `e_city`='$city', `e_state`='$state', `e_zip`='$zip', `employer_phone_number`='$phone', `length_of_job`='$len', `position_held`='$position', `reason_for_leaving`='$leave', `begin_date`='$begin', `end_date`='$end' WHERE `user_id`='$sesId'";
		$queryInsert = mysqli_query($con, $sqlInsert);
		if($queryInsert){
			header("location:" . $_SESSION['cwwhomepage']);
		}
	//}
	



}



?>		














<?php require("publicfooter.php"); ?>