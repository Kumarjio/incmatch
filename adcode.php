<?php ob_start(); require("siteheader.php"); ?>


	<div class="formBox" >
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
		
		<label for='acode'>Access Code:</label>   &nbsp;
		<input type="text" id="acode" name="acode"  /> <br><br><br>
		<label for='uname'>Username:</label>   &nbsp;
		<input type="text" id="uname" name="uname"  /> <br><br><br>
		<input id="submit" type="submit" name="submit" value="submit" />
		
	</form>
	</div>

</body>
</html>
<?php
	
	if(isset($_POST['submit'])){
		$con = dbConnectNow();
		
		$accessCode = mysqli_real_escape_string($con, $_POST['acode']);
		$uname = mysqli_real_escape_string($con, $_POST['uname']);		
		$sql = "SELECT * FROM `temp_access`";
		$query = mysqli_query($con, $sql);
		while($results = mysqli_fetch_array($query)){
			if($results['access'] == $accessCode){
				$sqlUpdate = "UPDATE `admin` SET `access_code`='$accessCode' WHERE `Username`='$uname'";
				$queryUpdate = mysqli_query($con, $sqlUpdate);
				if($queryUpdate){
					echo "<script type='text/javascript'>document.location.href='" . HOME . "'</script>";
				}					
					
			}
			else{
				echo "THAT CODE IS INCORRECT";
							
			}
		}
	}	
	
?>	

	