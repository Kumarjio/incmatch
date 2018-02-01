<style>
input[type="submit"], .submit{
	background-color: #feb600;
	border-radius: 10px;
	padding: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
	cursor: pointer;
}
.submit{
	width: 80%;
	border-radius: 5px;
	margin-left: 10%;
}
.res, .ress, .res2{
	border-bottom: 1px solid grey;
	
}
p .format{
	color: #000000;
}
.heading{
	margin: 0 0 0 22%; 
	color: #000000; 
	font-size: 48px;
}
.heading2{
	margin: 0 0 0 22%; 
	color: #000000; 
	font-size: 24px;
}
.line{
	border-bottom: 4px solid #000000; 
	margin-top: 2%;
}
.screen{
	margin: 2%;
	border: 2px solid #192535; 
	padding: 5%;
	
}
@media screen and (min-width: 100px) and (max-width: 339px){
	.screen{
		margin: 1% 0 1% 0;
		
		width: 100%;
	}

	.submit{
		margin: 5% 5% 5% 25%;
	}	
	.heading{
		font-size: 20px;
		margin: 0;
		left: 0;
	}
	.heading2{
		font-size: 14px;
		margin: 0;
		left: 0;
	}
}
@media screen and (min-width: 340px) and (max-width: 900px){
	.screen{
		margin: 1% 0 1% 0;
		
		width: 100%;
	}
	
	.heading{
		font-size: 36px;
		margin: 0 0 0 13%;
		left: 3%;
	}
	.heading2{
		font-size: 20px;
		margin: 0 0 0 8%;
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
		$employer[2] = "EMPLOYER LOCATION";
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
					echo "<h1 style='font-size: 24px; font-family: Oswald'>" . strToUpper($results['name']) .  "</h1><h1> Objective:  " . strToUpper($results['role']) . "</h1><h1> Phone:  " . $myNum . "</h1>";
			//}
			$count = 3;
			for($i = 5; $i <= 26; $i++){
				
				if(($i >= 8 && $i <= 15) && (($count >= 6 && $count <= 13))){
					$count++;
				}
				else if($i >= 16 && $i != 22){
				
				}
				else if($i == 22){
					
				}
				else if($i == 5){
					echo "<div class='res2'><p><span style='margin: 0 0 0 0'><strong>ACHIEVEMENTS</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
					strToUpper($results[$i]) .  "</p></div><br></br>";
				$count++;
				}
				else{
				echo "<div class='res2'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
					strToUpper($results[$i]) .  "</p></div><br></br>";
				$count++;
				}
				
			} 
		}

echo "<h2 class='heading' style=''>E M P L O Y M E N T</h2><div class='line' style=''></div><div class='line' style=''></div><div class='line' style=''></div><br>";	

if(strcmp($tr, "yes") == 0){
		$sql6 = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
	}
	else{
		$sql6 = "SELECT * FROM `temp_resumes` WHERE `user_id`='$id'";
	}
$query6 = mysqli_query($con, $sql6);
	while($results6 = mysqli_fetch_array($query6)){
		$_SESSION['resumeId'] = $results6['id'];
			
			$employerNum = addDashes($results6['employer_phone_number']);
			//if($nameOrNot == false){		
			$schoolCount = 16;
			echo "<h2 class='heading2' style=''>" . strToUpper($results6[$schoolCount]) . "</h2><div class='line' style=''></div><br>";	
			//}
			$count = 3;
			for($i = 5; $i <= 26; $i++){
				
				if(($i >= 8 && $i <= 15) && (($count >= 6 && $count <= 13))){
					$count++;
				}
				else if($i >= 17 && $i != 22){
					if($count == 16){
						echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>EMPLOYER ADDRESS</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results6[$i]) .  "</p>, ";
						$count++;
					}
					else if($count == 17){
						echo "<p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results6[$i]) . "</p> ";
						$count++;
					}
					
					else if($count == 18){
						
						echo "<p class='format'style='margin: 0 0 0 0; color: #000000'> ". strToUpper($results6[$i]) . "</p> ";
						
							echo "</div><br>";
						
						$count++;
					}
					else if($count == 19){
						echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						$employerNum .  "</p></div><br></br>";
						$count++;
					}
					else if($count >= 21 && $count <= 23){
						switch($count){
							case 21:
								echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count + 1] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
								strToUpper($results6[$i + 1]) .  "</p></div><br></br>";
								$count++;
								break;
							case 22:
								echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count + 1] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
								strToUpper($results6[$i + 1]) .  "</p></div><br></br>";
								$count++;
								break;
							default:
								echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count - 2] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
								strToUpper($results6[$i - 2]) .  "</p></div><br></br>";
								$count++;
								break;
						}
						
					}
					else{
						
						echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results6[$i]) .  "</p></div><br></br>";
						$count++;
					}
				}
				else if($i == 22){
					
				}
				else{
				
					$count++;
				}
				
			} 
	}	
	
	//Creating a place for the school part of the resume
	if(strcmp($tr2, "yes") == 0){
		$sql2 = "SELECT * FROM `temp_user_employer` WHERE `user_id`='$id'";
	}
	else{
		$sql2 = "SELECT * FROM `user_employers` WHERE `user_id`='$id'";
	}
		$query2 = mysqli_query($con, $sql2);
		if($query2){
			while($results2 = mysqli_fetch_array($query2)){
		$employerCount = 2;
			echo "<h2 class='heading2' style=''>" . strToUpper($results2[$employerCount]) . "</h2><div class='line' style=''></div><br>";
		$count = 1;
		for($i = 3; $i <= 13; $i++){
			if($i == 4 || $i == 9){
			
			}
			else if($count == 2){
				echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $employer[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results2[$i]) . "</p>, ";
						$count++;
			}
			else if($count == 3){
				echo "<p class='format' style='margin: 0 0 0 0; color: #000000'> " . strToUpper($results2[$i]) . "</p>, ";
						
						$count++;
			}
			else if($count == 4){
				echo "<p class='format' style='margin: 0 0 0 0; color: #000000'> ". strToUpper($results2[$i]) . "</p> ";
						
				echo "</div><br>";
						
				$count++;
			}
			else if($count == 5){
				$number = addDashes($results2[$i]);
				echo "<div class='ress'><p><span style='margin: 0 0 0 0'><strong>" . $employer[$count] . "</strong></span></p> <br><p class='format' style='margin: 0 0 0 0; color: #000000'>  " . $number .  "</p></div><br></br>";
				$count++;
			}
			else{
			echo "<div class='ress'><p><span style='margin: 0 0 0 0'><strong>" . $employer[$count] . "</strong></span></p> <br><p class='format' style='margin: 0 0 0 0; color: #000000'>  " . strToUpper($results2[$i]) .  "</p></div><br></br>";
					$count++;
			}
		}
		/*echo "<span style='margin: 0 20% 0 0'><strong>Employer</strong></span>   " . $results2['employer'] . "<br></br>";
		echo "<span style='margin: 0 20% 0 0'><strong>Supervisor</strong> </span>  " . $results2['supervisor'] . "<br></br>";	
		echo "<span style='margin: 0 20% 0 0'><strong>Position</strong> </span>  " . $results2['position_held'];			
		*/
		}
	
	}
echo "<h2 class='heading' style=''>E D U C A T I O N</h2><div class='line' style=''></div><div class='line' style=''></div><div class='line' style=''></div><br>";
$sql3 = "SELECT * FROM `user_schools` WHERE `user_id`='$id'";
$query3 = mysqli_query($con, $sql3);
if(strcmp($tr, "yes") == 0){
		 $sql5 = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
		}
		else{
			$sql5 = "SELECT * FROM `temp_resumes` WHERE `user_id`='$id'";
		}

$query5 = mysqli_query($con, $sql5);
while($results5 = mysqli_fetch_array($query5)){
		$_SESSION['resumeId'] = $results5['id'];
			$schoolCount = 8;
			echo "<h2 class='heading2' style=''>" . strToUpper($results5[$schoolCount]) . "</h2><div class='line' style=''></div><br>";
			$count = 3;
			for($i = 5; $i <= 26; $i++){
				
				if(($i >= 9 && $i <= 15) && (($count >= 7 && $count <= 13))){
					if($count == 7){
						echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results5[$i]) . "</p>, ";
						$count++;
					}
					else if($count == 8){
						echo "<p class='format'style='margin: 0 0 0 0; color: #000000'> " . strToUpper($results5[$i]) . "</p>, ";
						
						$count++;
					}
					else if($count >= 9 && $count < 11){
						
						echo "<p class='format'style='margin: 0 0 0 0; color: #000000'> ". strToUpper($results5[$i]) . "</p> ";
						if($count == 10){
							echo "</div><br>";
						}
						$count++;
					}
					else{
						
						echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $idea[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results5[$i]) .  "</p></div><br></br>";
						$count++;
					}
				}
				else if($i == 22){
					
				}
				else{
				
					$count++;
				}
				
			} 
			$schoolCount++;
		
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
		$schoolCount = 2;
			echo "<h2 class='heading2' style=''>" . strToUpper($results3[$schoolCount]) . "</h2><div class='line' style=''></div><br>";
			$count = 1;
			for($i = 3; $i <= 9; $i++){
				//echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $school[$count] . "</strong></span></p> <br><p class='format' style='margin: 0 0 0 0; color: #000000'>  " . 	strToUpper($results3[$i]) .  "</p></div><br></br>";
				if($count == 1){
						echo "<div class='res'><p><span style='margin: 0 0% 0 0'><strong>" . $school[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results3[$i]) . "</p>, ";
						$count++;
					}
					else if($count == 2){
						echo "<p class='format' style='margin: 0 0 0 0; color: #000000'> " . strToUpper($results3[$i]) . "</p>, ";
						
						$count++;
					}
					else if($count >= 3 && $count < 5){
						
						echo "<p class='format' style='margin: 0 0 0 0; color: #000000'> ". strToUpper($results3[$i]) . "</p> ";
						if($count == 4){
							echo "</div><br>";
						}
						$count++;
					}
					else{
						
						echo "<div class='res'><p><span style='margin: 0 0 0 0'><strong>" . $school[$count] . "</strong></span></p> <br><p class='format'style='margin: 0 0 0 0; color: #000000'>  " . 								
						strToUpper($results3[$i]) .  "</p></div><br></br>";
						$count++;
					}
				//$count++;
			
		
			}
			$schoolCount++;
		
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
			

				
<form action="<?php echo EDITRESUME . '?' . $_SESSION['cwwid']; ?>" method="post">
	<?php 
			$sesId = $_SESSION['cwwid']; 
			$jobArray = array(); 
			$jobArray = getResume2($sesId, $_SESSION['resumeId']);
			$jobCount = count($jobArray);
			$resumeId = $results['id'];
			for($x = 0; $x < $jobCount; $x++){
	 ?>
	 			<input type="hidden" name="type" value="<?php echo $jobArray[$x]; ?>" />
	<?php 		}
		
	?>	
	
	<input type='submit' name='edit' value='Edit Resume'/><br></br>
	
	
</form>

</div>			



<?php //}
}


	if(isset($_POST['publish'])){
		
		publishResume($_SESSION['cwwid']);
		echo "<script>window.location.assign('" . VIEWRESUME . "?id=" . $_SESSION['cwwid'] . "')</script>";
	}





}

?>





<?php require("publicfooter.php"); ?>