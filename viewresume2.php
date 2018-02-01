<style>
<style>
input[type="submit"], .submit{
	background-color: #feb600;
	border-radius: 10px;
	padding: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
	cursor: pointer;
}
.submit:nth-child(3){
	
	border-radius: 5px;
	padding: 5px;
	color: #000000;
	margin: 0 1% 5% 25%; 
	border: 2px solid #192535;  
	text-align: center; 
	display: inline-block;
}
.res, .ress, .res2{
	border-bottom: 1px solid grey;
	
}

.submit:nth-child(4), .submit:nth-child(5), .submit:nth-child(6){
	margin: 0 1% 5% .2%; 
	border: 2px solid #192535;  
	text-align: center; 
	display: inline-block;
	border-radius: 5px;
	padding: 5px;
}
p .format{
	color: #000000;
}
.screen{
	margin: 2%;
	border: 2px solid #192535; 
	padding: 5%;
	
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
@media screen and (min-width: 100px) and (max-width: 299px){
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
@media screen and (min-width: 300px) and (max-width: 900px){
	.screen{
		margin: 1% 0 1% 0;
		
		width: 100%;
	}
	div.print{
		width: 25%;
		color: #000000;
	}
	.submit{
		
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
	
		require("header.php"); 
		
viewResume();	
?>



<?php

function viewResume(){
$con = dbConnectNow();

//$ids = getEverythingAfterEqualSignInUrl("?");
$id = getEverythingAfterSignInUrl("?", "&");

	
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
		$school[1] = "SCHOOL ADDRESS";
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
	$sql4 = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
$query4 = mysqli_query($con, $sql4);
	while($results = mysqli_fetch_array($query4)){
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
	


echo "<h2 class='heading' style=''>E D U C A T I O N</h2><div class='line' style=''></div><div class='line' style=''></div><div class='line' style=''></div><br>";
$sql3 = "SELECT * FROM `user_schools` WHERE `user_id`='$id'";
$query3 = mysqli_query($con, $sql3);
$sql5 = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
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
	echo "<div style='border 8px solid black; width: 100%; height: 2%'></div>";
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
	
	
	
echo "<h2 class='heading' style=''>E M P L O Y M E N T</h2><div class='line' style=''></div><div class='line' style=''></div><div class='line' style=''></div><br>";	


$sql6 = "SELECT * FROM `resumes` WHERE `user_id`='$id'";
$query6 = mysqli_query($con, $sql6);
	while($results6 = mysqli_fetch_array($query6)){
		$_SESSION['resumeId'] = $results['id'];
			
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
$sql2 = "SELECT * FROM `user_employers` WHERE `user_id`='$id'";
$query2 = mysqli_query($con, $sql2);
$jobType = getEverythingAfterEqualSignInUrl("&");
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
		
			
		echo	"</div>";
		
			echo "<div class='submit print' style=''>";
			
			echo "<a style='color: #000000' href='". $_SESSION['home'] . "'>HOME</a></div>";
			
			echo "<div class='submit print' style=''>";
			
			echo "<a style='color: #000000; width: 25%' id='print' onClick='myPrint()'>PRINT</a></div>";
			
			if(strcmp($jobType, "c") == 0){
				echo "<div class='submit print' style='text-align: center; margin-top: 1%;'>";
				echo "<a style='color: #000000' href='yourarea.php?" . $_SESSION['id'] ."'>Previous Page</a></div>";
			}
			else{
			
				echo "<div class='submit print'>";
			
				echo "<a style='color: #000000; width: 25%' href='applicants.php?" . $jobType ."'>" . $jobType . " APPLICANTS</a></div>";
			}


	
		
	?>	
	

	<?php	
		
		$nameOrNot = true;
		
	}
	
	else{
		$jobTypes = getEverythingAfterEqualSignInUrl("&");

		echo "<div style='border-bottom: 1px solid grey; margin: 15%'><h1 style='text-align: center; font-size: 24px; font-family: Oswald; margin: 0; left: 0'><strong>No resume for this potential candidate</strong></h1>";
		if(strcmp($jobTypes, "c") == 0){
			echo "<div class='submit print' style='text-align: center; margin-top: 1%;'>";
			echo "<a style='color: #000000' href='yourarea.php?" . $_SESSION['id'] ."'>Previous Page</a></div>";
			
		}
		else{
			
			echo "<div class='submit print' style='text-align: center; margin-top: 1%;'>";
			
			echo "<a style='color: #000000' href='applicants.php?" . $jobTypes ."'>Back to " . $jobTypes . " APPLICANTS</a></div></div>";
		}
	}
	?>
			
			

</div>

<?php
}

?>








<?php




?>





<script type="text/javascript">
function myPrint(){
	
	$(".screen").css({"width": "100%", "margin": "0 0 0 0"});
	$(".ress").css({"border": "none", "margin-left": ".5%", "display": "inline-block", "margin-bottom": "1%", "width": "20%"}); 
	$(".res").css({"border": "none", "margin-left": ".5%", "display": "inline-block", "margin-bottom": "1%", "width": "45%"}); 
	$("br").remove();
	$("h1:first").append("<br>");
	$("h1:first").css("margin-left", "40%");
	$("h1:nth-child(2)").css("margin-left", "35%");
	$("h1:nth-child(3)").css("margin-left", "40%");
	$(".print").remove();
	$(".line").remove();
	$(".submit").remove();
	//$("h1").css("font-size", "12px");
	$(".heading2").css({"font-size": "14px", "margin": "2% 0 0 0"});
	//$(".heading2").css({"font-size": "18px","position": "relative", "left": "35%"});
	$(".heading").css({"font-size": "18px", "margin": ".8% 0 0 0"});
	//$(".heading").append("<div class='line' style='margin-bottom: 2%'></div>");
	$(".heading").prepend("<div class='line'></div>");
	
	$(".line").css("width", "100%");
	$(".heading").addClass("line");
	$(".heading2").addClass("line");
	$(".head").remove();
	$(".footer").remove();
	
	$("div").css({"font-size": "12px", "padding": ".9%"});
	//$("res").css({"font-size": "12px", "border-bottom": "2px solid grey", "padding": ".9%"});
	$(".format").css("margin-left", ".5%");
	$("p").css({"display": "inline-block", "font-size": "12px"});
	
	window.print();
	reloadPage();
	function reloadPage(){
		location.reload();
	}
}

</script>










<?php
	
?>























<?php require("footerrelative.php"); ?>






