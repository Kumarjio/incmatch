<style>
input[type="submit"], .submit{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
	cursor: pointer;
}
.submit{
	width: 80%;
	border-radius: 5px;
	margin-left: 10%;
}
.res{
	border-bottom: 1px solid grey;
}
.screen{
	margin: 2%;
	border: 2px solid #192535; 
	padding: 5%;
	
}
@media screen and (min-width: 300px) and (max-width: 900px){
	.screen{
		margin: 1% 0 1% 0;
		
		width: 100%;
	}
}
@media screen and (min-width: 1100px){
	.screen{
		margin: 2% 25% 2% 25%; 
		border: 2px solid grey; 
		padding: 5%;
	
	}
}
</style>



<?php
	
		require("publicheader.php"); 
		
viewResume();	
?>



<?php

function viewResume(){
$tr = doesPublishResumeExist($_SESSION['cwwid']);
$tr2 = doesTempResumeExist($_SESSION['cwwid']);


	$con = dbConnectNow();
	$id = getEverthingAfterEqualSignInUrl();
	$id = mysqli_real_escape_string($con, $id);
	if(strcmp($tr2, "yes") == 0){
		$sql = "SELECT * FROM `temp_resumes` WHERE `user_id`='$id'";
	}
	else{
		$sql = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
	}	
	$query = mysqli_query($con, $sql);
	$nameOrNot = false;
	if($query){
	?>
<div class="screen">
	
	<?php
		$results;
		$idea[0] = "name";
		$idea[1] = "NUMBER";
		$idea[2] = "role";
		$idea[3] = "ACHIEVE";
		$idea[4] = "CREDENTIALS";
		$idea[5] = "URL";
		$idea[6] = "SCHOOL";
		$idea[7] = "SCHOOL ADDRESS";
		$idea[8] = "CITY";
		$idea[9] = "STATE";
		$idea[10] = "ZIP";
		$idea[11] = "YEARS ATTENDED";
		$idea[12] = "GRADUATED";
		$idea[13] = "DEGREE EARNED";
		$idea[14] = "RECENT EMPLOYER";
		$idea[15] = "SUPERVISOR";
		$idea[16] = "EMPLOYER CITY";
		$idea[17] = "EMPLOYER STATE";
		$idea[18] = "EMPLOYER ZIP";
		$idea[19] = "EMPLOYER PHONE NUMBER";
		
		$idea[20] = "POSITION HELD";
		$idea[21] = "REASON FOR LEAVING";
		$idea[22] = "BEGIN DATE";
		$idea[23] = "END DATE";
		
		$school[0] = "SCHOOL";
		$school[1] = "SCHOL ADDRESS";
		$school[2] = "CITY";
		$school[3] = "STATE";
		$school[4] = "ZIP";
		$school[5] = "YEARS ATTENDED";
		$school[6] = "GRADUATED";
		$school[7] = "DEGREE";
		
		$employer[0] = "EMPLOYER";
		$employer[1] = "SUPERVISOR";
		$employer[2] = "EMPLOYER CITY";
		$employer[3] = "EMPLOYER STATE";
		$employer[4] = "EMPLOYER ZIP";
		$employer[5] = "EMPLOYER PHONE NUMBER";
		
		$employer[6] = "POSITION HELD";
		$employer[7] = "REASON FOR LEAVING";
		$employer[8] = "BEGIN DATE";
		$employer[9] = "END DATE";
		/*
			resume for user
		*/
		while($results = mysqli_fetch_array($query)){
			$_SESSION['resumeId'] = $results['id'];
				$myNum = addDashes($results['cell_number']);
				$employerNum = addDashes($results['employer_phone_number']);
				//if($nameOrNot == false){		
					echo "<h1 style='font-size: 24px; font-family: Oswald'>" . strToUpper($results['name']) . " <br> Objective:  " . strToUpper($results['role']) . "<br> Phone:  " . $myNum . "</h1>";
				//}
				$count = 3;
				for($i = 5; $i <= 26; $i++){	
					if($i == 22){
					
					}
					else{
					echo "<div class='res'><p style='width: 10px'><span style='margin: 0 10% 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><span style='margin: 0 0 0 0'>  " . 								
					strToUpper($results[$i]) .  "</span></div><br></br>";
					$count++;
					}
					
				} 
		}
	
	//Creating a place for the school part of the resume
	if(strcmp($tr2, "yes") == 0){
		$sql2 = "SELECT * FROM `temp_user_employer` WHERE `user_id`='$id'";
	}
	else{
		$sql2 = "SELECT * FROM `user_employer` WHERE `user_id`='$id'";
	}
		$query2 = mysqli_query($con, $sql2);
		if($query2){
			while($results2 = mysqli_fetch_array($query2)){
		
				$count = 0;
				for($i = 2; $i <= 13; $i++){
					if($i == 4 || $i == 9){
			
					}	
					else{
						echo "<div style='border-bottom: 1px solid grey'><p style='width: 10px'><span style='margin: 0 20% 0 0'><strong>" . $employer[$count] . "</strong></span></p> <span style='position: relative; margin: 0 0 0 
						20em'>  " . strToUpper($results2[$i]) .  "</span></div><br></br>";
						$count++;
					}
				}
		
			}
	
		}
		if(strcmp($tr2, "yes") == 0){
		$sql3 = "SELECT * FROM `temp_user_schools` WHERE `user_id`='$id'";
	}
	else{
		$sql3 = "SELECT * FROM `user_schools` WHERE `user_id`='$id'";
	}
		$query3 = mysqli_query($con, $sql3);
		if($query3){
			while($results3 = mysqli_fetch_array($query3)){
		
				$count = 0;
				for($i = 2; $i <= 9; $i++){
					echo "<div style='border-bottom: 1px solid grey'><p style='width: 10px'><span style='margin: 0 20% 0 0'><strong>" . $school[$count] . "</strong></span></p> <span style='position: relative; margin: 0 0 0 20em'>  " 
					. 	strToUpper($results3[$i]) .  "</span></div><br></br>";
					$count++;
		
				}
			}
				
		}		
		$tr = doesPublishResumeExist($_SESSION['cwwid']);		
	if(strcmp($tr, "yes") == 0){
		
	}
	else{
		?>
		<br></br><br></br>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	<input  class="submit" type="submit" name="publish" value="Publish Resume"/>
</form>	
	<?php } ?> 
</div>



<?php
/*if(strcmp($tr, "yes") == 0){
		
	}
	else{*/

?>			
<div class="screen">
			

				
<form action="editresume.php?<?php echo $_SESSION['cwwid']; ?>" method="post">
	<select type="text" name="type" value="" required/> 
			<?php 
			$sesId = $_SESSION['cwwid']; 
			$jobArray = array(); 
			$jobArray = getResume2($sesId, $_SESSION['resumeId']);
			$jobCount = count($jobArray);
			$resumeId = $results['id'];
			for($x = 0; $x < $jobCount; $x++){
	 ?>
	 			<option value="<?php echo $jobArray[$x]; ?>"><?php echo $jobArray[$x]; ?></option>
	<?php 		}
		
	?>	
	</select><br></br>
	
	<input type='submit' name='edit' value='Edit Resume'/><br></br>
	
	
</form>

</div>			



<?php //}
}


	if(isset($_POST['publish'])){
		
		publishResume($_SESSION['cwwid']);
		echo "<script>window.location.assign('" . $_SESSION['cwwhomepage'] . "')</script>";
	}





}

?>





<?php require("publicfooter.php"); ?>