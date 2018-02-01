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
             $("#Name").val(sessionStorage.getItem("full"));
        }
        if (sessionStorage.user) {
             $("#user").val(sessionStorage.getItem("user"));
        }
        if (sessionStorage.email) {
             $("#email").val(sessionStorage.getItem("email"));
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
        if (sessionStorage.relocate) {
             $("#relocate").val(sessionStorage.getItem("relocate"));
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
		width: 45%;
		margin: 0;
		padding: 0;
		left: 0;
		
	}
	.pic{
		width: 45%;
		margin: 0;
		padding: 0;
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
		
	}
		

	
}
@media screen and (min-width: 1421px){
	.pic{
		top: -10em;
		left: 5%;
	}
}
</style>
<div style="">
	<div class="next"><h1 style="">Please use special characters in your password in addition to letters.  Passwords must also be 8 or more characters long.</h1>

	<form class="inputBox"  action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post">
		
		<label for="Name" class="required">Name:  </label> &nbsp;
		<input type="text" id="Name" name="full" class="stored" required /> <br><br><br>
		<label for="user" class="required">Username: </label>   &nbsp;
		<input type="text" id="user" name="user" class="stored" required /> <br><br><br>
		<label for="zip" class="required">ZIPCODE: </label>   &nbsp;
		<input type="text" id="zip" name="zip" class="stored" required /> <br><br><br>
		<label for="relocate" class="">Are you willing to relocate: </label>   &nbsp;<br>
		<input type="checkbox" id="relocate" name="relocate" class="stored" /> <br>
		<label for="email" class="required">Email:  </label> &nbsp;
		<input type="email" id="email" name="email"  class="stored" required  /> <br><br><br>
		
		<label for="password" class="required">Password: </label> &nbsp;
		<input type="password" id="password" name="password" required /> <br></br><br></br>
		
		<input id="submit" style="margin-top: 16px" type="submit" name="submit"  value="submit"/><br><br><br>
		
	</form>
	</div>
	<!--<div  style="" class="next pic">
		<img id="logo" src="images/cwwlogo.png" style="" width="" hieght="" alt="cyberwatch west logo">
	</div>-->
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
			
			$pass = mysqli_real_escape_string(dbConnectNow(), $_POST['password']);
			
			$zip = mysqli_real_escape_string(dbConnectNow(), $_POST['zip']);
			$relocate = mysqli_real_escape_string(dbConnectNow(), $_POST['relocate']);
			$full = mysqli_real_escape_string(dbConnectNow(), $_POST['full']);			
			$full = strToUpper($full);
			
			$zipLength = zipLengthCheck($zip);
			if(strcmp("no", $zipLength) == 0){
				echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
			}
			//$zipCity = zipCityMatch($zip);
			
			
			
			
				
				
				
			else{
				$city = getCity($zip);
				$state = getState($zip);
				
				//if the city matches the zipcode then move forward
				
				$relocates = chkBoxOnOrOff($relocate, "Willing to relocate", "Not willing to relocate");
				$pass = lengthCheck($pass);
				$passTrue= checkForSymbols($pass);
				//$full= str_replace(" ", "", $full);
				if("yes" == $passTrue){
	
				
			
					if(!$con){
						echo "not working";
					}
					if(is_numeric($zip)){
						$sqlCreate = "CREATE TABLE if not exists `seekers`(
						id int AUTO_INCREMENT PRIMARY KEY,
						Name varchar(50),
						Username varchar(30),
						Email varchar(255),
						City text,
						State varchar(2),
						Zip text(5),
						relocate text,
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
							
								$check = mysqli_query(dbConnectNow(), "INSERT INTO `seekers`(`Name`, `Username`, `Email`, `City`, `State`, `Zip`, `relocate`, `Password`)
								VALUES('$full', '$username', '$email', '$city', '$state', '$zip', '$relocates', '$secure')");			
							
								if($check){
									$_SESSION['userName'] = $username;
									$_SESSION['full'] = $full;
									header("location: " . SKRSIGNIN);
								}
								else{
									echo $relocates;
								}
								
								
							}
						}
						else{
							echo "query failed";
						}
					}
					else{
						echo "<script>alert('zipcode has to be an interger');</script>";	
					}
				
				}
				
			}
			
		}

	?>



<?php require("footerrelative.php") ?>
				