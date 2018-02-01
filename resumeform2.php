<?php
	require("publicheader.php");
	
?>
<script>
$(document).ready(function() {

 if(typeof(Storage) !== "undefined") {
    //get all the values in the form and store them for this session.
        if (sessionStorage.school) {
             $("#school").val(sessionStorage.getItem("school"));
        }
        if (sessionStorage.address) {
             $("#address").val(sessionStorage.getItem("address"));
        }
        if (sessionStorage.city) {
             $("#city").val(sessionStorage.getItem("city"));
        }
        if (sessionStorage.state) {
             $("#state").val(sessionStorage.getItem("state"));
        }
        if (sessionStorage.zip) {
             $("#zip").val(sessionStorage.getItem("zip"));
        }
        if (sessionStorage.yearsCompleted) {
             $("#yearsCompleted").val(sessionStorage.getItem("yearsCompleted"));
        }
        if (sessionStorage.grad) {
             $("#grad").val(sessionStorage.getItem("grad"));
        }
        if (sessionStorage.degree) {
             $("#degree").val(sessionStorage.getItem("degree"));
        }
       
      
            $(".stored").keyup(function(){
            		sessionStorage.setItem($(this).attr('name'), $(this).val());
            });
      
    } else {
        document.getElementById("companyName").innerHTML = "Sorry, your browser does not support web storage...";
    }
     $('.submit').submit(function() {
    sessionStorage.clear();
});
});
</script>


<style>
.formBox:before{
	content: "Education Training and Experience";
	font-weight: bold;
}
.formbox{
	margin: 2% 0 0 5%;
	left: 0;
}
#pointer{
	font-size: 36px;
	margin: auto;
}
@media screen and (min-width: 1000px){
	.resumeForm{
		display: inline-box;
		box-shadow: 4px 4xp 5px grey;
		backgroud-color: #ffff99;
		width: 310px;
		padding: .4em;
	}
	h1{
		left: 0;
		margin: 0 0 2% 28%;
	}
	.formbox{
		position: relative;
		top: 0;
		margin-top: 5%;
		margin: auto;
		width: 50%;
		
		
		
	}
}
</style>
<br></br>
<h1 class="shadow" style="" id="pointer"> Add Education</h1><div class="underline"></div><br>
<div class="formbox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="">
		<h1 style="font-size: 24px; margin: 0">School Information</h1>
		<label class="required" for="school">School name</label>&nbsp;
		<input type="text" id="school" class="stored" name="school" required/><br><br><br>
		
		<label class="required" for="address">School Address</label>&nbsp;
		<input type="text" id="address" class="stored" name="address" required/><br><br><br>
		<label class="required" for="zip">ZIPCODE</label>&nbsp;
		<input type="text" id="zip" class="stored" name="zip" required/><br><br><br>
		<label class="required" for="yearsCompleted">Years Attended</label>&nbsp;
		<input type="text" id="yearsCompleted" class="stored" name="yearsCompleted" required/><br></br><br></br>
		<label for="grad">If you have graduated from this Institution please click the box.</label>&nbsp;<br>
		<input type="checkbox" id="grad" class="stored" name="grad" /><br><br></br>
		<label  for="degree">Degree Earned</label>&nbsp;
		<input type="text" id="degree" class="stored" name="degree" /><br><br><br></br>
		</div>
		
		
		
		<input  class="submit" type="submit" name="submit" value="Next"/>
	
	</form>
	
</div>


<?php 
if(isset($_POST['submit'])){
	
	$con = dbConnectNow();
	$school = mysqli_real_escape_string($con, $_POST['school']);
	
	$addr = mysqli_real_escape_string($con, $_POST['address']);
	
	$zip= mysqli_real_escape_string($con, $_POST['zip']);
	$years = mysqli_real_escape_string($con, $_POST['yearsCompleted']); 
	$grad = mysqli_real_escape_string($con, $_POST['grad']);
	$degree = mysqli_real_escape_string($con, $_POST['degree']);
	if(strcmp($grad, "on") == 0){
		$graduated = "yes";
	}
	else{
		$graduated = "no";
	}
	
		
	
	$zipLength = zipLengthCheck($zip);
	if(strcmp("no", $zipLength) == 0){
		echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
	}
	else{
		if(is_numeric($zip)){
			if(is_numeric($years)){
				$yearsLength = lengthChecks($years, 1);
				if(strcmp($yearsLength, "no") == 0){
					echo "<script>alert('years has to be exactly 1 digit');</script>";
				}
				else{
					$city = getCity($zip);
					$state = getState($zip);
					$sqlUpdate = "ALTER TABLE `temp_resumes` ADD COLUMN `school` varchar(60) NOT NULL,  ADD COLUMN `school_address` varchar(60) NOT NULL, ADD COLUMN  `city` text NOT NULL, ADD COLUMN  `state` text NOT NULL, ADD 
					COLUMN  `zip` 
					varchar(5) NOT 
					NULL, ADD COLUMN  `years_completed` int NOT NULL, ADD COLUMN  `graduated` varchar(4) NOT NULL, ADD COLUMN  `degree` varchar(30) NOT NULL";
					$queryAlter = mysqli_query($con, $sqlUpdate); 
					
					$sesId = $_SESSION['cwwid'];
					$sqlInsert = "UPDATE `temp_resumes` SET `school`='$school', `school_address`='$addr', `city`='$city', `state`='$state', `zip`='$zip', `years_completed`='$years', `graduated`='$graduated', `degree`='$degree' WHERE 
					`user_id`='$sesId'";
					$queryInsert = mysqli_query($con, $sqlInsert);
					if($queryInsert){
						header("location: resumeform3.php");
					}
				}
			}
			else{
				echo "<script>alert('Years Attended has to be an interger');</script>";	
			}
		}
		else{
			echo "<script>alert('zipcode can only be intergers');</script>";
		}
	}
	



}



?>














<?php require("publicfooter.php"); ?>