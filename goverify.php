<?php require("siteheader.php"); ?>





<?php

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$id = getEverthingAfterEqualSignInUrl();
		echo $id;

$sql = "SELECT * FROM `temp_employers` WHERE `id`='$id'";
$query = mysqli_query(dbConnectNow(), $sql);
$to = "";
$from = "";
if($query){
	while($results = mysqli_fetch_array($query)){
		$to = $results['Email'];
		echo $to;
		echo $_SESSION[$results['Company']];
		echo "<div class='jobInfos'>" . $results['Company'] . "</div>";
		
	}
	//verify($to, FROM, $id);
}













?>














<?php require("footer.php"); ?>