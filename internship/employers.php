<?php
   
	session_start(); 
	ob_start(); 
	require("siteheader.php");
 ?>

<style>
.next{
		display: inline-block;
		top: 0;
		position: relative;
		margin: 0;
	}
	
@media screen and (min-width: 200px){
	formBox{
		width: 100%;
		margin: 0;
	}
	form{
		margin: 10%;
	}
	html, body{
		width: 100%;
	}
}
@medai screen and (min-width: 350px){
	form{
		margin-left: 15%;
		margin-right: 15%;
	}
}
@media screen and (min-width: 1000px){

		
}
@media screen and (min-width: 1350px){
	formBox{
		width: 100%
		margin: 0 50% 0 15%;
		background-color: red;
	}
	inputBox{
		margin: 0 0 0 15%;
	}

	
}
</style>
<div style="padding: 2em">
	<div class="next"><span style="margin: auto">Please use special characters in your password i addition to letters.  Passwords must also be 8 or more characters long.</span>

	<form class="inputBox" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" enctype="multipart/form-data">
		
		<label for="companyName" class="required">Company name:  </label> &nbsp;
		<input type="text" id="companyName" name="full" required /> <br><br><br>
		<label for="user" class="required">Username: </label>   &nbsp;
		<input type="text" id="user" name="user" required /> <br><br><br>
		<label for="email" class="required">Email:  </label> &nbsp;
		<input type="email" id="email" name="email" required  /> <br><br><br>
		<label for="address">Company address: </label>   &nbsp;
		<input type="text" id="address" name="address"  /> <br><br><br>
		<label for="password" class="required">Password: </label> &nbsp;
		<input type="password" id="password" name="password" required /> <br></br><br></br>
		<label for="pic">Company logo: </label> &nbsp; <br>
		<input type="file" id="pic" name="pic" accept="image/*" /> <br><br><br>
		<input id="submit" style="margin-top: 16px" type="submit" name="submit"  value="submit"/><br><br><br>
		
	</form>
	</div>
	
	<div  style="top: -6em; opacity: 0.1" class="next">
		<img src="images/cwwlogo.png" style="width: 600px; height: 400px" alt="cyberwatch west logo">
	</div>
</div>
	<?php //echo $_SESSION['hn']; ?>
	<?php //echo $_SESSION['du']; ?>
	<?php //echo $_SESSION['dp']; ?>
	<?php //echo $_SESSION['dn']; ?>

	<?php  
		if(isset($_POST['submit'])){
			$con = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME) or die("done");
			$username = mysqli_real_escape_string(dbConnectNow(), $_POST['user']);
			$email = mysqli_real_escape_string(dbConnectNow(), $_POST['email']);
			$addr = mysqli_real_escape_string(dbConnectNow(), $_POST['address']);
			$pass = mysqli_real_escape_string(dbConnectNow(), $_POST['password']);
			$img= mysqli_real_escape_string(dbConnectNow(), $_POST['pic']);
			$full = mysqli_real_escape_string(dbConnectNow(), $_POST['full']);			
			$check = getimagesize($_FILES["pic"]["tmp_name"]);
			$memGroup = UNAUTH;
			$abbrev = nameToSpace($full);
			$pass = lengthCheck($pass);
			$passTrue= checkForSymbols($pass);
			$imgage;
			$imgContent;
			//$full= str_replace(" ", "", $full);
			if("yes" == $passTrue){
				$subject = "Employer verification for the CWW Internship Matching Application";
				$message = "The CyberWatch West team is working on verifying that your company is a real entity." . "\n" . "Once we have verified your company we will send an email notification with a link to sign in.";
				if($check !== false){
        				$image = $_FILES['pic']['tmp_name'];
			        	$imgContent = addslashes(file_get_contents($image));
			        	
		       
				}
			

			//echo "<h1 class='jobInfos'>hi</h1>";
			//echo "<script>location='https://www.google.com'</script>";
			
					if(!$con){
						echo "not working";
					}
					else{
					$sqlCreate = "CREATE TABLE if not exists `temp_employers`(
					id int AUTO_INCREMENT PRIMARY KEY,
					Username varchar(30),
					Email varchar(255),
					Address varchar(255),
					Password varchar(255),
					Image longblob,
					companyName varchar(50),
					abbrev varchar(60),
					member_group int)";
					$newQuery = mysqli_query(dbConnectNow(), $sqlCreate);
					//create the employers table if it is not already made.
					$sqlCreateEmp = "CREATE TABLE if not exists `employers`(
					id int AUTO_INCREMENT PRIMARY KEY,
					Username varchar(30),
					Email varchar(255),
					Address varchar(255),
					Password varchar(255),
					Image longblob,
					companyName varchar(50),
					abbrev varchar(60),
					member_group int)";
					mysqli_query(dbConnectNow(), $sqlCreateEmp);
					//$newQuery = mysqli_query(dbConnectNow(), $sqlCreate);
					
					if($newQuery){
						//$sql2 = "Select * FROM `temp_employers`";
						$sql = "Select * FROM `employers`";
						$query = mysqli_query(dbConnectNow(), $sql);
						//$query2 = mysqli_query(dbConnectNow(), $sql2);
						$trueOrFalse = "false";
						while($result = mysqli_fetch_array($query)){
							if($result['companyName'] == $full || $result['Username'] == $username || $pass == "" || $result['Email'] == $email){
							
								$trueOrFalse = "true";
							}
							
							
						}
						
						$sql2 = "Select * FROM `seekers`";
						$query2 = mysqli_query(dbConnectNow(), $sql2);
						while($result = mysqli_fetch_array($query)){
							if($pass == ""|| $result['Email'] == $email){
							
								$trueOrFalse = "true";
								
							}
							
						}
						if($trueOrFalse == "true"){
							echo "<script>alert('That company name, email or username already exist, try a different company name email or username')</script>";
						}
						else if($emailExist == "true"){
							echo "<script>alert('That email already exist, try a different email')</script>";
						}
						
						
					
						else{
					
						
							$secure = sha1($pass);
							$salt = ";slkj$FtS@&*S";
							$secure .= $salt;
							if($check == false){
								mysqli_query(dbConnectNow(), "INSERT INTO `temp_employers`(`Username`, `Email`, `Address`, `Password`, `companyName`, `abbrev`, `member_group`)
							VALUES('$username', '$email', '$addr', '$secure', '$full', '$abbrev', '$memGroup')");
							}
							else{
							mysqli_query(dbConnectNow(), "INSERT INTO `temp_employers`(`Username`, `Email`, `Address`, `Password`, `Image`, `companyName`, `abbrev`, `member_group`)
							VALUES('$username', '$email', '$addr', '$secure', '$imgContent', '$full', '$abbrev', '$memGroup')");			
							}
								
								$_SESSION['userName'] = $username;
								$_SESSION['full'] = $full;
								$_SESSION['logo'] = $imgContent;
								$header = "From: " . ADMINEMAIL;
								$newSubject = "Someone Signed up";
								$myEmail = "kraymond@whatcom.edu";
								$myMessage = $full . " has signed up as an employer. Time to start verifying!! Happy Hunting!";
								$mail = mail($email, $subject, $message, $header);
								$mail2 = mail(ADMINEMAIL, $newSubject, $myMessage, $header);
								if($mail){
									echo"<script type='text/javascript'>alert('CyberWatch West is working on verifying that your company is a real entity. Once your company has been verified you will receive an email notification with a link to sign in.');</script>";
									echo "<script type='text/javascript'>document.location='unauthmessage.php'</script>";
								//header("location: http://cwwinternship.cyberwatchwest.org/internship/unauthmessage.php");
								}
							
							else{
								echo $adEmail;
							}	
						}
					}
					else{
						echo "query failed";
					}
				}
				
				
			}
			
		}

	?>



<?php require("footerrelative.php") ?>