<?php require("siteheader.php"); ?>

<div class="formBox">
<h1 style="font-family: Oswald; position: relative; width: auto; margin: auto; top: 5em">Please enter the email that is associated with your account</h1><br></br>
</di><br></br><br></br>

<div class="formBox">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<label for="email" class="required">EMAIL</label>
	<input  type="text" id="email" name="email" required/><br></br><br></br>
	<input class="submit" type="submit"  name="submit" value="submit" /><br></br>
</form>

</div>
<?php

		if(isset($_POST['submit'])){
			$con = dbConnectToCww();
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$stmnt = resetPassInitChk($email);
			//$stmnt2 = resetPassInitChkEmployer($email);
			//$sql = "SELECT * FROM `seekers`";
			//$query = mysqli_query($con, $sql);
			if($stmnt){
				ini_set('display_errors', 1);
				
				while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
					if(strcmp($result['Email'], $email) == 0){
						$id = $result['id'];
						
						$mail = mail($email, "Password Reset", "Please click this link to reset your CWW Internship Matching password. \n http://cwwinternship.cyberwatchwest.org/internship/resetpass.php?" . $id, 'From: CWW I.N.C <info@cyberwatchwest.org>' );
						
						
					}
					else{
						
					}
				}
				/*if($id){
					$sqlRegistered = "SELECT * FROM `cwwn_user_usergroup_map`";
					$queryRegistered = mysqli_query($con, $sqlRegistered);
					while($results2 = mysqli_fetch_array($queryRegistered)){
						if($id == $results2['user_id'] && $results2['group_id'] == 2){
							header("location: https://www.cyberwatchwest.org/index.php/login2?view=reset");
						}
					}
				}*/
			if($mail){
				echo "SUCCESS";
			}
			else{
				echo "That email account is not valid seeker";
			}
			}
			
			else{
				echo "NOT WORKING";
			}
		}
		else{
			echo "<div class='jobInfos' style='width: 80%; left: 8em'><p style='width: 80%; margin: auto; left: 5em'>We are checking to make sure you are a Registered memeber.<br>You will have to enter your email here and on the Cyberwatch West website.  This is for security reasons.<br>You will be emailed a link to reset your password</p></div>";
		}
	
?>
