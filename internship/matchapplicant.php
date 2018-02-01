<?php require("header.php"); ?>
 
 
 <script>
 $(document).ready(function(){
 	
 	
 
 });
 
 </script>
 
 <?php
 	$userJobPrefIdArray = array();
 	$userNameArray = array();
 	$sesId = $_SESSION['id'];
 	$chosenUser = "";
 	//gets an array of the job preferences
 	$jobPrefArray = getDbArray("job_pref", "dbConnectNow()");
 	$sql = "SELECT * FROM `job_pref`";
 	$con = dbConnectNow();
 	$track = 0;
 	$query = mysqli_query($con, $sql);
 	if($query){
 	while($myResults = mysqli_fetch_array($query)){
 		if($track > 0){
 			$store = $myResults['user_id'];
 			$newTrack = $track - 1;
 			if($userJobPrefIdArray[$newTrack] != $myResults['user_id']){
 				$userJobPrefIdArray[$track] = $myResults['user_id'];
 			}
 			else{
 				echo "not working";
 			}
 		}
 		else{
 			if($track == 0){
	 			$userJobPrefIdArray[$track] = $myResults['user_id'];
	 		}
	 		
 		}
 	
 		
 			//$sql = "INSERT INTO `applicants`(`Name`) VALUES('$chosenUser')";
 			//mysqli_query(dbConnectNow(), $sql);
 		$track++;
 	}
 	}
 	else{
 		echo "not working";
 	}
 	$dbArray = getDbArray("cwwn_users", "dbConnectCww()");
 	$count = 0;
 	$sqlc = "SELECT * FROM `cwwn_users`";
 	$queryc = mysqli_query(dbConnectToCww(), $sqlc);
 	while($results = mysqli_fetch_array($queryc)){
 		
 		if($userJobPrefIdArray[$count] == $results['id']){
 			$userNameArray[$count] = $results['name'];
 		}
 		$count++;
 	}
 	
 		echo  $userJobPrefIdArray[1];
 		echo  $userJobPrefIdArray[1];
 	
 	//echo "hello whats going in";
 	//echo "<script>alert('is this going to work') </script>";
 	
?> 	
 <?php require("footerrelative.php"); ?>
 
 
 
 
 
 
 
 
 
 
