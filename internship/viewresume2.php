<style>
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
	
		require("header.php"); 
		
viewResume();	
?>



<?php

function viewResume(){
$con = dbConnectNow();
$id = getEverthingAfterEqualSignInUrl();
$sql = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
$query = mysqli_query($con, $sql);
$result;
$myId;
while($result = mysqli_fetch_array($query)){
	
	$myId = $result['user_id'];
	
}

$nameOrNot = false;

if($myId == $id){
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
	$sql4 = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
$query4 = mysqli_query($con, $sql4);
	while($results = mysqli_fetch_array($query4)){
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
				echo "<div style='border-bottom: 1px solid grey'><p style='width: 10px'><span style='margin: 0 20% 0 0'><strong>" . $idea[$count] . "</strong></span></p> <span style='position: relative; margin: 0 0 0 20em'>  " . 							strToUpper($results[$i]) .  "</span></div><br></br>";
				$count++;
				}
				
			} 
	}
	
	//Creating a place for the school part of the resume
$sql2 = "SELECT * FROM `user_employers` WHERE `user_id`='$id'";
$query2 = mysqli_query($con, $sql2);
if($query2){
	while($results2 = mysqli_fetch_array($query2)){
		
		$count = 0;
		for($i = 2; $i <= 13; $i++){
			if($i == 4 || $i == 9){
			
			}
			else{
			echo "<div class='res'><p style='width: 10px'><span style='margin: 0 10% 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><span style='margin: 0 0 0 0'>  " . 								
					strToUpper($results[$i]) .  "</span></div><br></br>";
					$count++;
			}
		}
		/*echo "<span style='margin: 0 20% 0 0'><strong>Employer</strong></span>   " . $results2['employer'] . "<br></br>";
		echo "<span style='margin: 0 20% 0 0'><strong>Supervisor</strong> </span>  " . $results2['supervisor'] . "<br></br>";	
		echo "<span style='margin: 0 20% 0 0'><strong>Position</strong> </span>  " . $results2['position_held'];			
		*/
	}
	
}
$sql3 = "SELECT * FROM `user_schools` WHERE `user_id`='$id'";
$query3 = mysqli_query($con, $sql3);
if($query3){
	while($results3 = mysqli_fetch_array($query3)){
		
		$count = 0;
		for($i = 2; $i <= 9; $i++){
			echo "<div style='border-bottom: 1px solid grey'><p style='width: 10px'><span style='margin: 0 20% 0 0'><strong>" . $school[$count] . "</strong></span></p> <span style='position: relative; margin: 0 0 0 20em'>  " . 	
			strToUpper($results3[$i]) .  "</span></div><br></br>";
			$count++;
			
		
	}
}
	
	}		
			
		echo	"</div>";
		
			echo "<div style='margin: 5% 5% 5% 15%; border: 2px solid #192535; padding: 5%'>";
			
			echo "<a class='submit' style='color: #000000; width: 25%' href='". $_SESSION['home'] . "'>HOME</a>";
			

	
		
	?>	
	

	<?php	
		
		$nameOrNot = true;
		
	}
	
	else{
		echo "<div style='border-bottom: 1px solid grey; margin: 15%'><h1 style='text-align: center; font-size: 24px; font-family: Oswald; margin: 0; left: 0'><strong>No resume for this potential candidate</strong></h1></div><br></br>";
	}
	?>
			
			

</div>

<?php
}
?>








<?php




?>
















<?php
	
?>























<?php require("footerrelative.php"); ?>






