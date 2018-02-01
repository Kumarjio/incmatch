<?php
	require("publicheader.php");
	
?>
<script type="text/javascript">
$(document).ready(function(){
	var i = 0;
	var jobTypes = ['IT', 'Networking', 'Cybersecurity', 'Developer', 'Application Developer', 'Application Support Analyst', 'Applications Engineer', 'Associate Developer'];
	$("#try").attr("placeholder", jobTypes[2]);
	$("#try").keyup(function(){
		//alert($(this).val());
		var sVal = $(this).val();
		//alert(sVal);
		var sLength = sVal.length;
		//alert(sLength);
		if(sLength >= 2){
			
			for(var i = 0; i < jobTypes.length; i++){
				var low = jobTypes[i].toUpperCase();
				var charJobs = jobTypes[i].substring(0);
				for(var a = 0; a < charJobs.length; a++){
					var nVal = sVal.toUpperCase()
					var sub = low.substring(0, a);
					//alert(charJobs + " " + sub);
					if(sub.includes(nVal)){
						$("#try").val(jobTypes[i]);
						break;
					}
				}
				/*else{
					$("#try").val(jobTypes[i]);
				}*/
			}
		}
		else{
			//alert(jobTypes[2]);
			i++;
		}
			
	});
	
	
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	
var size = window.innerWidth;
	if(size > 300){
		$(".last").append("<br></br><br></br><br></br>");	
		
	}
	
});
</script>
<style>
.main{
	width: 100%;
	padding: 0 25% 0 25%;
	text-align: center;
	
}
.myBox{
	display: inline-block;
	
	width: 45%;
	margin: 2%;
	
}
.myBox2{
	width: 100%;
	position:relative;
}
h1{
	margin: 0;
}
label{
	color: #ffffff;
}

select,{
	width: 90%;	
}
 input[type="text"]{
 	position: relative;
 	width: inherit;
 	margin: 0 0 0 12%;
 }
.jp2{
	
	background-color: #192535;
	/*background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url("images/students-working.jpg");*/
	padding: 4%;
	color: #ffffff;
}

.jp{
	background-color: grey;
	width: 100%;
	padding-bottom: 2%;
	/*background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("images/employerspic.jpg");*/
	
}

.jobs{
	background-color: #192535;
	margin: 4%;
	color: #ffffff;
	padding: 2%;
	border-radius: 10px;
	
	
}
h1{
	margin: 0;
	left: 0;
}
.sidebyside{
	
}
@media screen and (min-width: 100px) and (max-width: 650px){
	h1{
		font-size: 12px;
		margin: 0;
	}
	.main{
		margin: 0;
		padding: 0;
		left: 0;
		right: 0;
	}
	.jobs{
		width: 100%;
		margin: 0;
		padding: 0;
		height: 8%;
	}
	
	.sidebyside{
		width: 100%;
		left: 0;
		margin: 0;
		padding: 0;
	}
	.jobInfos{
		padding: 0;
		margin: 0;
		left: 0;
		position: relative;
		
		display: inline-block;
	}
	.jp{
		position: relative;
		
		margin: 0;
		padding: 0;
		width: 100%;
		
		dispaly: inline-block; 
		
	}
	.container{
		width: 100%;
	}
	.jp2{
		width: 100%;
		margin: 0;
		padding: 0;
		left: 0;
		right: 0;
	}
	.myBox{
		margin: 0 0 5% 0;
	}
	select{
	width: 50%;
	
}
 input[type="text"]{
 	position: relative;
 	width: 50%;
 	margin: 0 0 0 25%;
 }

}
@media screen and (min-width: 651px) and (max-width: 754px){
	.jobs{
		width: 90%;
		
	}
	.sidebyside{
		width: 100%;
		overflow: auto;
	}
	select{
		width: 50%;
	
	}
	.main{
		padding: 0;
		
	}
 input[type="text"]{
 	position: relative;
 	width: 50%;
 	margin: 0 0 0 25%;
 }

}
@media screen and (min-width: 755px) and (max-width: 845px){
	.jobs{
		width: 90%;
		
	}
	.sidebyside{
		width: 99%;
	}
	select{
		width: 50%;
	
	}
	.main{
		padding: 0;
	}
 input[type="text"]{
 	position: relative;
 	width: 50%;
 	margin: 0 0 0 25%;
 }

}
@media screen and (min-width: 846px) and (max-width: 1092px){
	.main{
		padding: 3% 10% 10% 10%;
	}
	.jp2{
		
	}
	select{
		width: 40%;
	
	}
 input[type="text"]{
 	position: relative;
 	width: 99%;
 	margin: 0 0 0 0;
 }

}
@media screen and (min-width: 1093px) and (max-width: 1700px){
	
	/*.myBox{
		width: 30%;
		
	}*/
	.main{
		padding: 3% 10% 10% 10%;
	}
	.jp2{
		
	}
	 input[type="text"]{
 		position: relative;
 		width: 50%;
 		margin: 0 0 0 25%;
 	}
	
}
@media screen and (min-width: 1701px) and (max-width: 2500px){
	
	/*.myBox{
		width: 30%;
		
	}*/
	.main{
		padding: 3% 10% 10% 10%;
	}
	.jp2{
		
	}
	 input[type="text"]{
 		position: relative;
 		width: 50%;
 		margin: 0 0 0 25%;
 	}
	
}
</style>
<div class="main">
<h1 class="shadow" style="font-size: 36px" id="pointer"> Set Preference</h1><div class="underline"></div>
<div class="myBox">
<div class="sidebyside" style="">

	<h1>In order to select multiple Internship/Job preferences use the<span style="color: red"> CTRL </span> button for Windows and the <span style="color: red">COMMAND </span>button for Macs.</h1>

	<h1 >Potential employers are being matched to you by<span style="color: red"> Job Type</span> and <span style="color: red">zipcode</span></h1>
	<h1 class="last">Please refrain from entering a zipcode that is not within <span style="color: red">50</span> mile radius of your physical location.</h1>
</div></div>
<div class="myBox">
<div class="jp2" style="color: #ffffff">

	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		
		<label for="job">Job Type:</label>  &nbsp; <br></br>
		<select type="text" id="job" name="job[]" multiple="multiple" /> 
			<option value="IT">IT</option>			
			<option value="Networking">Networking</option>
			<option value="Cybersecurity">Cybersecurity</option>
			<option value="Developer">Developer</option>
		</select>
		<br></br> &nbsp;<br>
		<!--<input type="text" id="try" class="job" name="try">-->
		<label for="zipcode">ZIPCODE</label>
		<input type="text" id="zipcode" name="zip"><br><br><br><br>
		<input type="submit" name="submit" value="SUBMIT" />
	</form>


</div>
</div>


<div class="myBox2" style="">
<div class="jp" style=''><h2 style="padding: 2%">Your current job preferences </h2>
<?php
$con = dbConnectNow();
	$sesId = $_SESSION['cwwid'];
	$sql = "SELECT `job_type`, `zip` FROM `job_pref` WHERE `user_id`='$sesId'";
	$query = mysqli_query($con, $sql);
	if($query){
		while($results = mysqli_fetch_array($query)){
			
			echo"<div class='jobs' style=''><strong>" . strToUpper($results['job_type']) . "</strong><br><br>";
			echo $results['zip'] . " </div>";	
				
		}
	}
?>
</div>
</div>
</div>
<?php
	if(isset($_POST['submit'])){
		$con = dbConnectNow();
		$count = 0;
		$count2 = 0;
		$jobs = array();
		$job = mysqli_real_escape_string($con, $_POST['job']);
		$zip = mysqli_real_escape_string($con, $_POST['zip']);
		foreach ($_POST['job'] as $selectedOption){
		$jobs[$count] = $selectedOption;
   	 
   		 $count++;
    		}
    		$zipLength = zipLengthCheck($zip);
		if(strcmp("no", $zipLength) == 0){
			echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
		}	
		if(is_numeric($zip)){
    			$stmnt = getEmployersWithThisJobType($zip);
	               	while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
        	       		//echo $result['job_type'] . "== or != " . $jobs[$count2] . "<br></br>";
				if($result['job_type'] == $jobs[$count2]){
					$employerId = $result['employer_id'];
					$email = getEmail($employerId);
					//echo $result['employer_id'];
					mail($email, "New Candidate in your area", "Somone has chosen a job preference in your area. Login to see potential candidate " . EMPLOGIN, 'From: CWW I.N.C <' . ADMINEMAIL . '>');
					//echo $stmnt2. "<br></br>";
				
				}
				else{
					//echo $jobs[$count2] . "<br></br>";
					//echo $result['employer_id'];
				}
				if(count($jobs) > 1){
					$count2++;
				}
			}
		
			jobPref($jobs, $zip);
	
	
			$con = dbConnectNow();
			$sesId = $_SESSION['cwwid'];
			$sql = "SELECT `job_type`, `zip` FROM `job_pref` WHERE `user_id`='$sesId'";
			$query = mysqli_query($con, $sql);
			/*if($query){
				while($results = mysqli_fetch_array($query)){
					echo"<div class='jobInfos'><strong>" . strToUpper($results['job_type']) . "</strong><br><br>";
					echo $results['zip'] . " </div>";			
				}
			}
			else{
				echo "NOT WORKING";
			}*/
		}
		else{
			echo "<script>alert('zipcode has to be an interger');</script>";
		}
	}
?>



<div style="margin: 0">

</div>




<?php require("publicfooter.php"); ?>