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
	<div class="next"><span style="margin: auto">Please use special characters in your password in addition to letters.  Passwords must also be 8 or more characters long.</span>

	<form class="inputBox" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
		
		<label for="Name" class="required">Name:  </label> &nbsp;
		<input type="text" id="Name" name="full" required /> <br><br><br>
		<label for="user" class="required">Username: </label>   &nbsp;
		<input type="text" id="user" name="user" required /> <br><br><br>
		<label for="email" class="required">Email:  </label> &nbsp;
		<input type="email" id="email" name="email" required  /> <br><br><br>
		
		<label for="password" class="required">Password: </label> &nbsp;
		<input type="password" id="password" name="password" required /> <br></br><br></br>
		
		<input id="submit" style="margin-top: 16px" type="submit" name="submit"  value="submit"/><br><br><br>
		
	</form>
	</div>
	<div  style="top: 1%; opacity: 0.1" class="next">
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
			$full = strToUpper($full);
			
			$pass = lengthCheck($pass);
			$passTrue= checkForSymbols($pass);
			//$full= str_replace(" ", "", $full);
			if("yes" == $passTrue){
	
				
			
					if(!$con){
						echo "not working";
					}
					else{
					$sqlCreate = "CREATE TABLE if not exists `seekers`(
					id int AUTO_INCREMENT PRIMARY KEY,
					Name varchar(50),
					Username varchar(30),
					Email varchar(255),
					
					Password varchar(255))";
					
					
					$newQuery = mysqli_query(dbConnectNow(), $sqlCreate);
					//create the employers table if it is not already made.
					
					
					
					if($newQuery){
						$sql = "Select * FROM `seekers`";
						$query = mysqli_query(dbConnectNow(), $sql);
						$trueOrFalse = "false";
						while($result = mysqli_fetch_array($query)){
							if($result['Username'] == $username || $pass == ""){
							
								$trueOrFalse = "true";
								
							}
							if($result['Email'] == $email){
								$emailExist = "true";
							}
						}
						$sql2 = "Select * FROM `employers`";
						$query2 = mysqli_query(dbConnectNow(), $sql2);
						//$query2 = mysqli_query(dbConnectNow(), $sql2);
						$trueOrFalse = "false";
						while($result = mysqli_fetch_array($query2)){
							if($result['companyName'] == $full || $result['Username'] == $username || $pass == ""){
							
								$trueOrFalse = "true";
							}
							if($result['Email'] == $email){
								$emailExist = "true";
							}
							
							
						}
						 if($trueOrFalse == "true"){
							echo "<script>alert('That username is already taken, try a different username')</script>";
						}
						
						else if($emailExist == "true"){
							echo "<script>alert('That Email alread exist.  You can only have one email associated with the system')</script>";
						}
						else{
					
						
							$secure = sha1($pass);
							$salt = ";slkj$FtS@&*S";
							$secure .= $salt;
							
							mysqli_query(dbConnectNow(), "INSERT INTO `seekers`(`Name`, `Username`, `Email`, `Password`)
							VALUES('$full', '$username', '$email', '$secure')");			
							
								
								$_SESSION['userName'] = $username;
								$_SESSION['full'] = $full;
								header("location: " . HOME);
								
								
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
				