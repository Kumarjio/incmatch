<?php require("siteheader.php"); ?>

<div class="formBox">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<label for="user"> Username: </lable> &nbsp;
	<input type="text" id="user" name="user" /><br><br><br>
	<label for="email"> Email: </lable> &nbsp;
	<input type="email" id="email" name="email" /><br><br><br>
	<input class="submit" type="submit" name="submit" value="submit" />
</form
</div>

<?php
	if(isset($_POST['submit'])){
		$con = dbConnectNow();
		$user = mysqli_real_escape_string($con, $_POST['user']);
		$email = mysqli_real_escape_string($con, $_POST['email']);		
		$sql = "SELECT `Username` FROM `admin` WHERE `Username`='$user'";
		$query = mysqli_query($con, $sql);
		if($query){
			$accessCode = accessCode();
			$createSql = "CREATE TABLE IF NOT EXISTS `temp_access`(
					id int AUTO_INCREMENT PRIMARY KEY,
					access int)";
			$querySuccess = mysqli_query($con, $createSql);
			if($querySuccess){
			accessTempInsertPrepare($accessCode);
			//$sqlUpdate = "UPDATE `admin` SET `access_code`='$accessCode' WHERE `Username`='$user'";
			//$queryUpdate = mysqli_query($con, $sqlUpdate);
			//if($queryUpdate){
				$mail = mail($email, "Your Access Code for the CWW internship matching application", "Here is your access code: " . $accessCode . "\n" . "Please verify your access code for the CyberWatch West Internship Matching Application here  http://cwwinternship.cyberwatchwest.org/internship/adcode.php", "From: kraymond@whatcom.edu");
				if($mail){
					echo "SUCCESS";
				}
				else{
					echo "FAILURE";
				}
			//}
			}
			else{
				echo "NONONONONONONNONO";
			}
		}
	}
	function accessCode(){
		$ran = rand();
		return $ran . "";
	}
	

	
?>