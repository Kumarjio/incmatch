<?php require("siteheader.php"); 
	$id = getEverythingAfterEqualSignInUrl("?");
	set_time_limit(300);
?>

<div class="formBox">
<h1 style="font-family: Oswald; width: auto; margin: auto; top: 5em">Please use special characters in your password.  Passwords must also be 8 or more characters long.</h1>
</di><br></br><br></br>

<div class="formBox">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<label for="pass" class="required">New password</label>
	<input  type="password" id="pass" name="pass" required/><br></br><br></br>
	<label for="passchk" class="required">Re-enter New password</label>
	<input  type="password" id="passchk" name="passchk" required/><br></br><br></br>
	<input class="submit" type="submit"  name="submit" value="submit" /><br></br>
</form>

</div>
<?php

		if(isset($_POST['submit'])){
			$con = dbConnectNow();
			$pass = mysqli_real_escape_string($con, $_POST['pass']);
			$passChk = mysqli_real_escape_string($con, $_POST['passchk']);
			if(strcmp($pass, $passChk) == 0){
				$pass = lengthCheck($pass);
				$passTrue = checkForSymbols($pass);
				$secure = sha1($pass);
		
				$salt = ";slkj@&*S";
				$secure .= $salt;
				if(strcmp("yes", $passTrue) == 0){
					updatePassEmployer($secure, $id);
					echo "<script>alert('Password has been changed')</script>";
					header("Refresh: 1; url=" . HOME);
					
				}
			}
			else{
				echo "<script>alert('Passwords do not match')</script>";
			}
			
		
		
		}
		
		
		
?>