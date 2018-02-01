<?php  require("header.php"); 
 ?>
 
 <script>
 	
 		function getApplicant(){
 			if (window.XMLHttpRequest) {
           		 // code for IE7+, Firefox, Chrome, Opera, Safari
	        	   var xmlhttp = new XMLHttpRequest();
		        }
		        else {
		            	// code for IE6, IE5
		           	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		      		xmlhttp.onreadystatechange = function() {
		            		if (this.readyState == 4 && this.status == 200) {
 			    			document.getElementById("choose").innerHTML = this.responseText;
 			   		 }
 				};
 			
 			xmlhttp.open("GET", "matchapplicant.php", true);
 			xmlhttp.send();
 		}
 		
 	
 
 </script>
 <script type="text/javascript">
$(document).ready(function(){
	 var button = $('<input class="submit" type="submit" name="showH1" value="Click here to see the introduction and instructions" />');
	 button.css({"margin": "0 0 0 0", "cursor": "pointer", "border-radius": "10px", "background-color": "#192535", "color": "#ffffff"});
	 $("div:nth-child(11)").prepend(button);
	$("#pointer").css("cursor", "pointer");
	 button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	$('body').scrollTop(0);
        	button.hide();
        });
    $("#pointer").click(function(){
       $("#blurb").hide();
        //$("div:nth-child(5)").append(button);
        button.show();
      	
      //  $("div").eq(1).append(button);
        button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	button.hide();
        });
       
    });
     
});

</script>
<style>
h1{
	margin: 0;
	left: 0;
}
.jobInfo{
	width: auto;
}
.main{
	margin-top: 2%;
}
#blurb{
		display: none;
	}

@media screen and (min-width: 300px) and (max-width: 640px){
	.page_container{
		
		margin: 0;
	}
	h1{
		font-size: 18px;
		margin: 0;
	}
	
	
	.main{
		margin: 0 10% 5% 0;
	}
	.jobInfo{
		width: 75%;
	}
}
</style>
<?php

	
if(isset($_POST['showH1'])){
	echo "This is not as tricky as we thought";
}
?>

<div class="main">
<h1 class="shadow" style="font-size: 36px" id=""> Employer Homepage</h1><div class="underline"></div>
<h1 class="page_container" id="blurb" style="margin: 0 0 0 2em; background-color: #feb600; border-radius: 10px; padding: 2em">Thank you for participating in CyberWatch West’s Job/Internship Matching Program <?php echo INC; ?>. We hope this application will help you find qualified candidates who meet your immediate and future employment needs. <br>  In order to see potential candidates please click on a job title below.  This will take you to a list of potential candidates. <br>Because this is a nationwide internship matching program, you may be contacted by job-seekers outside your immediate area or you may view their qualifications while browsing our resume section. CyberWatch West encourages you to check candidates’ geographic location before interviewing them for a specific role, as relocating may not be an option for them.   

 <br>
Below is a list of your currently posted internship or job openings. Listings typically last 90 days. Eighty-five days after you post a listing, you will receive an automatically generated email message warning you that if you take no action, that listing will be deleted in five days. On this page you have the option of renewing an existing listing for an additional 90 days or deleting a listing for a position that has been filled. 

 <br></br>

<span style="color: red" id="pointer"> Click to remove introduction</span></h1></div>
<?php
	$result = doesIntrnshpExist($_SESSION['id']);
	if($result == true){
	internDaysCheck($_SESSION['empId']);
?>

<div id="choose" class="jobInfo" style="background: #fffff9; position: relative; margin: 2%; padding: 2em">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
	<label for="renew" class="">Renew Internship/Job:</label>  &nbsp; <br>
	
		<select type="text"  name="renew" value="" /> 
		<?php 
			$sesId = $_SESSION['id']; 
			$jobArray = array(); 
			$jobArray = getJobs($sesId);
			$jobCount = count($jobArray);
			for($x = 0; $x < $jobCount; $x++){
	 ?>
			<option value="<?php echo $jobArray[$x]; ?>"><?php echo $jobArray[$x]; ?></option>
	<?php } ?>	
			</select><br>
		<input class="submit" type="submit" name="submit" value="Renew" />	
</form>
</div>
<div class="jobInfo" style="background: #fffff9; position: relative; margin: 2%; padding: 2em">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
	<label for="type" class="">Permanantly Delete Internship/Job:</label>  &nbsp; <br>
	
		<select type="text" name="type" value="" /> 
		<?php 
			$sesId = $_SESSION['id']; 
			$jobArray = array(); 
			$jobArray = getJobs($sesId);
			$jobCount = count($jobArray);
			for($x = 0; $x < $jobCount; $x++){
	 ?>
			<option value="<?php echo $jobArray[$x]; ?>"><?php echo $jobArray[$x]; ?></option>
	<?php } ?>	
			</select><br>
		<input class="submit" type="submit" name="delete" value="Delete" />	
</form>
</div>

<div style="width: 89%; border: 2px solid #ffffff9; margin: 1% 10% 10% 2%; box-shadow: 4px 5px 5px grey"><h3>Click on a Job type <span style="color: red">below</span> to see potential candidates.</h3>
<?php }
	else{?>
		<div style="width: 89%; border: 2px solid #ffffff9; margin: 1% 10% 10% 2%; box-shadow: 4px 5px 5px grey"><h3>First thing to do is create your 1st <span style="color: red">listing.</span> Just click on the Create New Listings tab above.</h3>
<?php	}
 ?>

<?php 	
		$sesId = $_SESSION['id'];
		createApplicants();
			//employerMatch($sesId);

	 employersMatch($sesId);
	 $home = $_SESSION['home'];
	//echo"<script type='text/javascrip'>document.location.href='" . $home . "'</script>";
	//sessionTimeOut();
	$sqls = "SELECT * FROM `internships` WHERE `employer_id`='$sesId'";
	$cons = dbConnectNow();
	$querys = mysqli_query($cons, $sqls);
	if($querys){
		while($resultss = mysqli_fetch_array($querys)){
			echo "<div id='choose'  class='jobInfo'><a style='color: #000000' href='applicants.php?" . $resultss['job_type'] ."'>" . $resultss['job_type'] . "</a><br>"; 
			echo $resultss['job_title'] . "<br>";
			if(strcmp($resultss['job_or_intern'], Job) == 0){
					echo  "<strong>JOB</strong><br><br>";
				}
				else{
					echo  "<strong>INTERNSHIP</strong><br><br>";
				}
			echo $resultss['zip'];
			echo "</div>";
		}
		
	}
	else{
		//echo "<script>alert('No candidates yet. If you have not created an internship please do so now!');</script>";
	}

	/*$header = "From: kraymond@whatcom.edu";
	$newSubject = "Someone Signed up";
	$myEmail = "trapnerdss@gmail.com";
	$myMessage = "You have been verified" . "\n" . "Please login here " . EMPLOGIN ; 
	mail($myEmail, $newSubject, $myMessage, $header);*/
?>



<?php 
	if(isset($_GET['delete'])){
		
		$con = dbConnectNow();
		$jobTitle = mysqli_real_escape_string($con, $_GET['type']);	
		$sql = "DELETE FROM `internships` WHERE `job_title`= '$jobTitle' AND employer_id='$sesId'";
		$query = mysqli_query($con, $sql);
		
		if($query){
			
			echo "<script type='text/javascript'>alert('Your " . $jobTitle . " job has been removed');</script>";
			echo "<script type='text/javascript'>document.location.href='" . EMPHOME . "?id=" . $_SESSION['id'] . "'</script>";
			

		}
		else{
			echo"<div class='jobInfos' style='float: right'>" . $jobType . " not deleted</div>";
		}
		
	}

	if(isset($_POST['submit'])){
		$con = dbConnectNow();
		$jobTitle = mysqli_real_escape_string($con, $_POST['renew']);
		$date = getdate();
		$today = $date['yday'];
		
		$sql = "UPDATE `internships` SET `y_day`= '$today' WHERE `job_title`= '$jobTitle' AND employer_id='$sesId'";
		$query = mysqli_query($con, $sql);
		
		if($query){
			
			echo "<script type='text/javascript'>alert('Your " . $jobTitle . " job has been renewed');</script>";
			echo "<script type='text/javascript'>document.location.href='" . EMPHOME . "?id=" . $_SESSION['id'] . "'</script>";
			

		}
		else{
			echo"<div class='jobInfos' style='float: right'>" . $jobType . " not renewed</div>";
		}
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		//This function is to match applicants with employers and enter them into the applicant table
	function employersMatch($sesId){
		$conIntern = dbConnectNow();
		$myCount = 0;
		$count = 0;
		$newCount = 0;
		$job= "";
		$name = array();
		$nameCount = 0;
		$zip = "";
		$jobId = "";
		$userId = "";
		$uId = array();
		$hasJobs = false;
		$userName = "";
		$email = "";
		$sql = "SELECT `company`, `job_type`, `job_title`, `employer_id`, `description`, `zip` FROM `internships` WHERE `employer_id`='$sesId'";
		$query = mysqli_query($conIntern, $sql);
		if($query){
			while($results = mysqli_fetch_array($query)){
				
				if($results['company'] == $_SESSION['full']){
					$job = $results['job_type'];
					$_SESSION['job'] = $results['job_type'];
					$title = $results['job_title'];
					$zip = $results['zip'];
					$empId = $results['employer_id'];
					$sql2 = "SELECT * FROM `job_pref`";
					$query2 = mysqli_query($conIntern, $sql2);
					if($query2){
					while($jpResults = mysqli_fetch_array($query2)){
						
						if($jpResults['job_type'] == $job){
							$hasJobs = true; 
							if($jpResults['zip'] == $zip){
								$userNameCnt = 0;
								$userNameCntTrack = 0;
								$hasJobs = true;
								resumeCheck($jpResults['user_id']);
								$uId[$count] = $jpResults['user_id'];
								$userIdCount = $uId[$count];
								$sqlCwws = "SELECT * FROM `seekers` WHERE `id`='$userIdCount'";
								$userId = $jpResults['user_id'];
								$jobId = $jpResults['id'];
								$_SESSION['jpresultsid'] = $jpResults['id'];
								$con = dbConnectNow();
								$queryCwws = mysqli_query($con, $sqlCwws);
								
									while($newResults = mysqli_fetch_array($queryCwws)){
										if($uId[$count] == $newResults['id']){	
											$userName = $newResults['Username'];
											$userZip = $newResults['Zip'];
											$relocate = $newResults['relocate'];
											$_SESSION['username'] = $newResults['Username'];
											$name[$nameCount] = $userName;
											$email = $newResults['Email'];									
											$_SESSION['resId'][$newCount] = $uId[$count];
											$_SESSION['resId'] = $newResults['id'];
											$userNameCnt++;
											$nameCount++;
										}
										
											
									}
									$inDb = applicantCheck();
									if(!$inDb){
										$sqlQuery = "INSERT INTO `applicants`(`Name`, `user_id`, `employer_id`, `job_type`, `job_pref_id`, `zip`, `relocate`, `Email`) VALUES('$userName', '$userId', '$empId', '$job', '$jobId', '$userZip', '$relocate', '$email')";
										mysqli_query(dbConnectNow(), $sqlQuery);
									}
								
											
											
											$newCount++;
								
								$count++;
							}
							else{
								
								if(!$hasJobs && ($jpResults['job_type'] == $job) ){
									echo "<div class='jobInfos'> There are no candidates looking for " . $title . $zip . " jobs</div>";
								}
							}
						}
						else{
							
							if(!$hasJobs && $jpResults['job_type'] == $job ){
								echo "<div class='jobInfos'> There are no candidates looking for " . $title . " jobs</div>";
							}				
						}	
						$count++;
					}
					}
										
					
					
					
					
				}
				
			}
										
											
		}		
			
	}
	
	
	
	
	

?>
</div>

</div>

<?php 

require("footerrelative.php"); ?>

