<?php /* The Template Name: employersignup */?>

<?php ob_start(); require("siteheader.php"); ?>

<div style="padding: 2em">
	
	<div class="formBox" ><span style="margin: auto">Please use special characters in your password.  Passwords must also be 8 or more characters.</span><br></br>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for='fname'>First Name: </label>  &nbsp;
		<input type="text" id="fname" name="fname"  /> <br><br><br>
		<label for='lname'>Last Name: </label>  &nbsp;
		<input type="text" id="lname" name="lname"  /> <br><br><br>
		<label for='email'>Email: </label>  &nbsp;
		<input type="email" id="email" name="email"  /> <br><br><br>
		<label for='username'>User Name: </label>  &nbsp;
		<input type="text" id="username" name="username"  /> <br><br><br>
		<label for='pass'>Admin Password:</label>   &nbsp;
		<input type="password" id="pass" name="pass"  /> <br><br><br>
		<input id="submit" type="submit" name="submit" value="submit" />
		
	</form>
</div>


<?php
	
	$count = 0;
	$h;
	$connect = 5;

	if(isset($_POST['submit'])){
		$con = dbConnectNow();
		$fname = mysqli_real_escape_string($con, $_POST['fname']);
		$lname = mysqli_real_escape_string($con, $_POST['lname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['pass']);
		//$redir = $_POST['redirect'];
		$pass = lengthCheck($password);
		$passTrue = checkForSymbols($pass);
		$_SESSION['admin']= $username;
		$_COOKIE['admin']= $username;
		$myArray = dbConnect();
		if("yes" == $passTrue){
		if(!$con){
 
			echo "Connection failed";
		}
		else{
			$is_connected = mysqli_query($con, "CREATE TABLE if not exists `admin`(id int PRIMARY KEY AUTO_INCREMENT, First_name varchar(30), Last_name varchar(60), Email varchar(255),  Username varchar(30), password varchar(255), access_code varchar(255))");
			if($is_connected){
				$salt = "$a;hjg@SSG*";
				$secure = sha1($pass);
				$secure .= $salt;
				$_SESSION['secure'] = $secure;
				$myQuery = mysqli_query($con, "INSERT INTO `admin`(`First_name`, `Last_name`, `Email`, `Username`, `password`) VALUES('$fname', '$lname', '$email', '$username', '$secure' )");
				if($myQuery){
					$mail = mail(EMAIL, "access code", "Please give " .$username . " " . $email . " an access code " . ACCESS, "From: kraymond@whatcom.edu");
					$mail2 = mail($email, "Thank you for joining the CWW internship matching program", "You will be receiving your access code for the CyberWatch West internship matching application here shortly", "From: " . EMAIL);
					if($mail && $mail2){
						echo "<script type='text/javascript'>alert('You will receive your access code through email, so be on the lookout!');</script>";
						echo "<script type='text/javascript'>document.location.href='" . HOME . "'</script>";
					}
							
				}
				else{
					echo "NOT WORKING EITHER";
				}
					
					
				
			}
			else{
				echo "NOT WORKING";
			}
		}
		}
	}							
		
		
		
?>





<?php //require("footer.php"); ?>
