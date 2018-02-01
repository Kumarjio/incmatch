<?php require("siteheader.php");
if($_SESSION['ad']){
 ?>


<div class="formBox">
<p style="color: #000000">Please enter the companys name exactly as it appears below.
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<label for="company">Company:</label>&nbsp;
	<input type="text" name='company' /><br><br><br><br>
	<input class="submit" type="submit" name="submit" value="Verify" />
</form>
</div>



<?php
$con = dbConnectNow();
showTempEmployers($con);
if(isset($_POST['submit'])){
	$con = dbConnectNow();
	$selectedCompany = mysqli_real_escape_string($con, $_POST['company']);
	$sql = "SELECT * FROM `temp_employers`";
	$query = mysqli_query($con, $sql);
	$email = getAdEmail();
	while($results = mysqli_fetch_array($query)){
		
		if($results['companyName'] == $selectedCompany){
			verify($results['Email'], $email, $results['id']);
		}
		//echo "<input type='button' class='jobInfos' value='" . $results['Company'] . "' onclick='document.write(" . verify($resutls['Email'], "kraymond@whatcom.edu", $results['id']) ."' />";
		//echo $compName['Compnay'];
		
	}

	
	
	//echo "<li><a href="

}

}
else{
	header("location: index.php");
}

?>










<?php require("footer.php"); ?>