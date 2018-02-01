<?php require("siteheader.php"); ?>
<style>
.formBo{
	
	padding: 2% ;
}
.sidebyside{
	display: inline-block;
}
img.sidebyside{
	opacity: .1;
	padding: 2% .2% .2% .2%;
	
}
</style>


<div class="formBo sidebyside">
<p>Please enter the email that is associated with your account</p>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<label for="email" class="required">EMAIL</label>
	<input  type="text" id="email" name="email" required/><br></br><br></br>
	<input class="submit" type="submit"  name="submit" value="submit" /><br></br>
</form>

</div>
<img class="sidebyside logo" src="images/cwwlogo.png" alt="cyberwatch west logo" width="1200" />
<?php

		if(isset($_POST['submit'])){
			$con = dbConnectToCww();
			$email = mysqli_real_escape_string($con, $_POST['email']);
			
			$stmnt2 = resetPassInitChkEmployer($email);
			//$sql = "SELECT * FROM `seekers`";
			//$query = mysqli_query($con, $sql);
		
			if($stmnt2){
				ini_set('display_errors', 1);
				
				while($result = $stmnt2->fetch(PDO::FETCH_ASSOC)){
					if(strcmp($result['Email'], $email) == 0){
						$id = $result['id'];
						
						$mail = mail($email, "Password Reset", "Please click this link to reset your CWW Internship Matching password. \n". RESETPASSEMP . "?" . $id, 'From: CWW I.N.C <info@cyberwatchwest.org>' );
						
						
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
					echo "<script>alert('We are emailing you a password reset link')</script>";
					echo "<script>window.location = " . HOME . ";</script>";
				}
				else{
					echo "<script>alert('Not a valid email account')</script>";
				}
			
			
			}
			else{
				echo "NOT WORKING";
			}
		}
		else{
			
		}
	
?>
<?php require("footer.php"); ?>