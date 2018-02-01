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
}	
</style>
<h1>Site Admin Login</h1>
<div class="formBox">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<label for="user"> Username: </label> &nbsp;
<input type="text" id="user" name="user" /><br><br><br>
<label for="acode"> Password: </label> &nbsp;
<input type="password" id="acode" name="acode" /><br><br><br></br>
<input type="submit" name="submit" value="SIGN IN" />

</form>
</div>





<?php
	if(isset($_POST['submit'])){
		$con = dbConnectNow();
		$user = mysqli_real_escape_string($con, $_POST['user']);
		$acode= mysqli_real_escape_string($con, $_POST['acode']);
		$sql = "SELECT * FROM `admin`";
		$query = mysqli_query($con, $sql);
		if(query){
			$salt = "$a;hjg@SSG*";
			$secure = sha1($acode);
			$secure .= $salt;
			while($results = mysqli_fetch_array($query)){
				if($results['Username'] == $user){
					if($results['password'] == $secure){
						$_SESSION['ad'] = true;
						$_SESSION['adusername'] = $results['Username'];
						echo "<script type='text/javascript'>document.location.href='" . VERIFIED . "'</script>";
					}
					else{
						echo "password incorrect";
					}
				}
				else{
					echo "<script type='text/javascript'>document.location.href='" . HOME . "'</script>";
				
				}
			}
		}
		
		
	}
	
?>
<div style="margin-top: 15%">
</div>
<?php require("footer.php"); ?>