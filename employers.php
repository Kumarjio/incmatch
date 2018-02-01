<?php
   
	session_start(); 
	ob_start(); 
	require("siteheader.php");
 ?>






<script>
$(document).ready(function() {
//check browser support

    if(typeof(Storage) !== "undefined") {
    //get all the values in the form and store them for this session.
        if (sessionStorage.full) {
             $("#companyName").val(sessionStorage.getItem("full"));
        }
        if (sessionStorage.user) {
             $("#user").val(sessionStorage.getItem("user"));
        }
        if (sessionStorage.email) {
             $("#email").val(sessionStorage.getItem("email"));
        }
        if (sessionStorage.address) {
             $("#address").val(sessionStorage.getItem("address"));
        }
        if (sessionStorage.city) {
             $("#city").val(sessionStorage.getItem("city"));
        }
        if (sessionStorage.state) {
             $("#state").val(sessionStorage.getItem("state"));
        }
        if (sessionStorage.zip) {
             $("#zip").val(sessionStorage.getItem("zip"));
        }
       
      
            $(".stored").keyup(function(){
            		sessionStorage.setItem($(this).attr('name'), $(this).val());
            });
      
    } else {
        document.getElementById("companyName").innerHTML = "Sorry, your browser does not support web storage...";
    }
   
});
</script>

<style>
.pic{
	top: -6em; 
	opacity: 0.1;
}
.next{
		display: inline-block;
		top: 0;
		position: relative;
		margin: 0;
		left: 0;
		right: 0;
	}
	#logo{
		width: 600px; 
		height: 400px
	}
	h1{
		margin: 0;
		left: 0;
		padding: 0;
	}
	
	
	
@media screen and (min-width: 200px){
	formBox{
		width: 100%;
		margin: 0;
	}
	form{
		margin: 0;
	}
	
	#logo{
		width: 100%;
		
	}
	input{
		margin: 0;
		left: 0;
		right: 0;
		width: auto;
	}
	input[type="text"], input[type="email"], input[type="password"]{
		width: 100%;
		margin: 0;
		padding: 0;
		left: 0;
		
	}
	input[type="submit"]{
		margin-bottom: 5%;
	}
}
@medai screen and (min-width: 350px) and (max-width: 999px){
	.next{
		margin-left: .5%;
		margin-right: .5%;
	}
	input{
		margin: 0;
		
		right: 0;
		width: auto;
	}
	input[type="text"], input[type="email"], input[type="password"]{
		width: 100%;
		margin: 0;
		padding: 0;
		left: 0;
		
	}
	.pic{
		display: none;
		width: auto;
	}

}
@media screen and (min-width: 1000px) and (max-width: 1349px){
	input[type="text"], input[type="email"], input[type="password"], input{
		width: 50%;
		margin: 0;
		padding: 0;
		left: 0;
		
	}
	.pic{
		width: 45%;
		top: -25em;
		left: 10%;
	}
	#logo{
		width: 65%;
	}
		
}
@media screen and (min-width: 1350px) and (max-width: 1420px){
	formBox{
		width: 100%
		margin: 0 50% 15% 15%;
		background-color: red;
	}
	inputBox{
		margin: 0 0 0 1%;
	}
	.next{
		margin: 0%;
		display: inline-block;
	}
	input[type="text"], input[type="email"], input[type="password"]{
		width: 50%;
		margin: 0;
		padding: 0;
		left: 0;
		
	}
	#logo{
		width: 55%;
	}
	.pic{
		top: -
	}
		

	
}
@media screen and (min-width: 1421px){
	.pic{
		top: -25em;
		left: 15%;
	}
}
</style>

<div style="">
	<div class="next"><h1 style="">Please use special characters in your password in addition to letters.<br>  Passwords must also be 8 or more characters long.</h1>
<br></br>
	<form class="inputBox" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" enctype="multipart/form-data">
		
		<label for="companyName" class="required">Company name:  </label> &nbsp;
		<input type="text" id="companyName" class="stored" name="full" required /> <br><br><br>
		<label for="user" class="required">Username: </label>   &nbsp;
		<input type="text" id="user" class="stored" name="user" required /> <br><br><br>
		<label for="password" class="required">Password: </label> &nbsp;
		<input type="password" id="password" name="password" required /> <br></br><br>
		<label for="email" class="required">Email:  </label> &nbsp;
		<input type="email" id="email" class="stored" name="email" required  /> <br><br><br>
		<label for="address">Company address: </label>   &nbsp;
		<input type="text" id="address" class="stored" name="address"  /> <br></br><br></br>
		<label for="zip">ZIPCODE: </label>   &nbsp;
		<input type="text" id="zip" class="stored" name="zip"  /> <br></br><br></br>
		<h3>By uploading your logo you grant CyberWatch West permission to use your logo throughout the <?php echo INC; ?> application</h3>
		<label for="pic">Company logo: </label> &nbsp; <br>
		<input type="file" id="pic" name="pic" accept="image/*" /> <br><br><br>
		<input id="submit" style="" type="submit" name="submit"  value="submit"/><br><br><br></br>
		
	</form>
	<br></br><br></br>
	</div>
	
	<!--<div  style="" class="next pic">
		<img id="logo" src="images/cwwlogo.png" style="" width="" hieght="" alt="cyberwatch west logo">
	</div>-->
</div>
	

	<?php  
		if(isset($_POST['submit'])){
			$con = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME) or die("done");
			$username = mysqli_real_escape_string(dbConnectNow(), $_POST['user']);
			$email = mysqli_real_escape_string(dbConnectNow(), $_POST['email']);
			$addr = mysqli_real_escape_string(dbConnectNow(), $_POST['address']);
			$pass = mysqli_real_escape_string(dbConnectNow(), $_POST['password']);
			$img = mysqli_real_escape_string(dbConnectNow(), $_POST['pic']);
			$full = mysqli_real_escape_string(dbConnectNow(), $_POST['full']);
			
			$zip = mysqli_real_escape_string(dbConnectNow(), $_POST['zip']);				
			$check = getimagesize($_FILES["pic"]["tmp_name"]);
			$memGroup = UNAUTH;
			$abbrev = nameToSpace($full);
			$pass = lengthCheck($pass);
			$passTrue= checkForSymbols($pass);
			$image;
			$imgContent;
			if($check !== false){
        			$image = $_FILES['pic']['tmp_name'];
			        $imgContent = addslashes(file_get_contents($image));
			        	
		       
			}
			
			//$full= str_replace(" ", "", $full);
			if("yes" == $passTrue){
				$subject = "Employer verification for the CWW Internship Matching Application";
				$message = "The CyberWatch West team is working on verifying that your company is a real entity." . "\n" . "Once we have verified your company we will send an email notification with a link to sign in.";
				
				
				
				
				$zipLength = zipLengthCheck($zip);
				if(strcmp("no", $zipLength) == 0){
					echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
				}
				else{
					if(is_numeric($zip)){
						if(!$con){
							echo "not working";
						}
						else{
							$city = getCity($zip);
							$state = getState($zip);
							$sqlCreate = "CREATE TABLE if not exists `temp_employers`(
							id int AUTO_INCREMENT PRIMARY KEY,
							Username varchar(30),
							Email varchar(255),
							Address varchar(255),
							Password varchar(255),
							Image longblob,
							companyName varchar(50),
							abbrev varchar(60),
							city text,
							state text,
							zip varchar(10),
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
							city text,
							state text,
							zip varchar(10),
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
										mysqli_query(dbConnectNow(), "INSERT INTO `temp_employers`(`Username`, `Email`, `Address`, `Password`, `companyName`, `abbrev`, `city`, `state`, `zip`, `member_group`)
										VALUES('$username', '$email', '$addr', '$secure', '$full', '$abbrev', '$city', '$state', '$zip', '$memGroup')");
									}
									else{
										mysqli_query(dbConnectNow(), "INSERT INTO `temp_employers`(`Username`, `Email`, `Address`, `Password`, `Image`, `companyName`, `abbrev`, `city`, `state`, `zip`, 
										`member_group`)
										VALUES('$username', '$email', '$addr', '$secure', '$imgContent', '$full', '$abbrev', '$city', '$state', '$zip', '$memGroup')");			
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
										echo"<script type='text/javascript'>alert('CyberWatch West is working on verifying that your company is a real entity. Once your company has been verified you will 	receive an email notification with a link to sign in.');</script>";
										echo "<script type='text/javascript'>document.location='" . HOME . "'</script>";
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
					else{
						echo "<script>alert('zipcode has to be an interger');</script>";
					}
				}
			}
		}

	?>



<?php require("footer.php") ?>