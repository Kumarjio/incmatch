<?php
   
	//session_start(); 
	//ob_start(); 
	require("siteheader.php");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
		<title>Employer Signup</title>
	<style>
		.formBox{
		position: relative;
		width: 80%;
		//top: 8em;
		margin: auto;
		
		//margin-bottom: 20em;
		
	}
	input[type="text"], input[type="password"]{
		position: absolute;
		color: #000000;
		display: block;
		width: 300px;
		box-shadow: 0 0 2px 2px #BDBDBD;
		border: 2px solid #BDBDBD;

	.inputBox{
		width: 30%;
		margin: auto;
	
	}
	
</style>
</head>

<div class="formbox">
<form  class="inputBox" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
	<label for="ename" class="required">Employer Username:</label> &nbsp;
	<input type="text" id="ename" name="ename" required /><br><br><br>
	<label for="epass" class="required">Password: </label> &nbsp;
	<input type="password" id="epass" name="epass" required /><br><br><br>
	<input id="submit" style="margin-top: 2em" type="submit" name="submit" value="Login" /><br></br><br></br>
</form>
</div>
<div style="margin: 0 0 0 10%"><a class="inputBox" style="color: #000000" href="<?php echo PASSRESETTEMP; ?>">Forgot Password?</a></div>

<?php 

if($_SERVER['REQUEST_METHOD'] === "POST"){
	if(isset($_POST['submit'])){
		
	$con = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME) or die("done");
	$myusername = mysqli_real_escape_string($con, $_POST['ename']);
	$mypassword = mysqli_real_escape_string($con, $_POST['epass']);
	$_SESSION['last_time'] = time();
	$secure = sha1($mypassword);
	$salt = ";slkj@&*S";
	$secure .= $salt;
	
	//$sql = "SELECT * FROM `employers` WHERE `Username`='$myusername' and `Password`='$secure'";
	$sql = "SELECT * FROM `employers`";
	$query= mysqli_query($con, $sql);
	//$count = mysqli_num_rows($result);
	
	if($query){
		while($result = mysqli_fetch_array($query)){
		
			if($result['Username'] == $myusername){
				if($result['Password'] == $secure){
					if($result['member_group'] == AUTH){
						$_SESSION['id'] = $result['id'];
						$_SESSION['userName'] = $result['Username'];
						$_SESSION['homepage'] = "location:mypage.php?user=" . $result['Username'];
						$_SESSION['home'] = EMPHOME . "?user=" . $result['Username'];
						$_SESSION['full'] = $result['companyName'];
						$_SESSION['empId'] = $result['id'];
						$_SESSION['email'] = $result['Email'];
						//echo $_SESSION['id'] . "<br>";
						//echo $_SESSION['companyName'] . "<br>";
						//echo $result['Password'] . "<br>";
				
					}
					else{
						echo "<script type='text/javascript'> alert('You have not been verified. Please contact Keith Raymond @ kraymond@whatcom.edu') </script>";
					}
				}
				
				
			}
			
				
		}
			
		if($_SESSION['id']){
			header("location: ". $_SESSION['home']);
		}
		else{
			header($_SESSION['homepage']);
		}	
	}
		
		
		
		//echo "<script type='text/javascript'> alert('hi there')</script>";
		
		//header($_SESSION['homepage']);
		//echo $_SESSION['companyName'];
		//echo $_SESSION['id'];
		
	}
	else{
		echo "<script type='text/javascript'> alert('That information is incorrect') </script>";
	}
	
	mysqli_close($con);
	
}
?>

<?php require("footerrelative.php"); ?>




