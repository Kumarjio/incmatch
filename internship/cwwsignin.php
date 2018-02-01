<?php require("siteheader.php"); ?>

<style>
	.formBox{
		left: 0;
		margin: 0;
		padding-left: 5%;
	}
@media screen and (min-width: 1000px){
	.formBox{
		left: 15%;
	}
	#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}


}	
</style>

<div  class="formBox">

	<form  class="inputBox" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
		<label for="username" class="required">UserName<input id="username" class="inputBox" type="text" name="username" required/></label> <br><br><br>
		<label for="password" class="required">Password<input id="password" class="inputBox" type="password" name="password" required /></label> <br></br><br>
		<input id="submit" onclick="myfunciton" type="submit" name="submit" value="submit"><br></br><br></br>
	</form>
	<br>
	
	<a class="inputBox" style="color: #000000" href="https://www.cwwinternship.cyberwatchwest.org/internship/passreset.php">Forgot Password?</a>

	
</div>


<?php
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		if(isset($_POST['submit'])){
		$username = $_POST['username'];
			$password = $_POST['password'];
			$_SESSION['tempname'] = $username;
			$_SESSION['tempPass'] = $password;
?>

<div id=""></div>

<div style="display:none;" id="myDiv" class="animate-bottom">


</div>

<?php
			
			cwwSignIn($username, $password);
			//header("location: loader.php");
			//$pass = password_hash($password, PASSWORD_DEFAULT);
			//echo $password;
			//echo $username;
			//echo $pass;

		}
		
	}
?>
<?php require("footerrelative.php"); ?>