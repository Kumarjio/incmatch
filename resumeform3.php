<?php
	require("publicheader.php");
	
?>


<script>
$(document).ready(function() {
 if(typeof(Storage) !== "undefined") {
 sessionStorage.clear();
    //get all the values in the form and store them for this session.
        if (sessionStorage.emp) {
             $("#emp").val(sessionStorage.getItem("emp"));
        }
        if (sessionStorage.supervisor) {
             $("#supervisor").val(sessionStorage.getItem("supervisor"));
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
        
        if (sessionStorage.phone) {
             $("#phone").val(sessionStorage.getItem("phone"));
        }
        if (sessionStorage.begin) {
             $("#length").val(sessionStorage.getItem("begin"));
        }
        if (sessionStorage.end) {
             $("#lengthEnd").val(sessionStorage.getItem("end"));
        }
        if (sessionStorage.pos) {
             $("#pos").val(sessionStorage.getItem("pos"));
        }
        if (sessionStorage.leave) {
             $("#leave").val(sessionStorage.getItem("leave"));
        }
       
      
            $(".stored").keyup(function(){
            		sessionStorage.setItem($(this).attr('name'), $(this).val());
            });
      
    } else {
        document.getElementById("companyName").innerHTML = "Sorry, your browser does not support web storage...";
    }
     $('.submit').submit(function() {
    sessionStorage.clear();
    localStorage.clear();
});
});
</script>


<style>
.formBox:before{
	content: "Employment History";
	font-weight: bold;
}
.formBox{
	margin: 0 0 0 5%;
	left: 0;
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
		margin: 0 0 2% 0;
	}
	.formBox{
		position: relative;
		top: 0;
		margin: auto;
		width: 50%;
		
		
		
	}
}
</style>
<br></br>
<div class="formbox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="resumeform">
			<h1 style="font-size: 24px">Most Recent Employer</h1>
		<label class="" for="emp">Company name</label>&nbsp;
		<input type="text" id="emp" class="stored" name="emp" /><br><br><br>
		<label class="" for="supervisor">Supervisor name</label>&nbsp;
		<input type="text" id="supervisor" class="stored" name="supervisor" /><br><br><br>
		<label class="" for="address">Company address</label>&nbsp;
		<input type="text" id="address" class="stored" name="address" /><br><br><br>
		<label class="" for="zip">ZIPCODE</label>&nbsp;
		<input type="text" id="zip" class="stored" name="zip" /><br><br><br>
		<label class="" for="phone">Company phone number(No dashes please)</label>&nbsp;
		<input type="text" id="phone" class="stored" name="phone" /><br></br><br></br>
		<label class="" for="length">Begin Date</label>&nbsp;	<br>	
		<input type="date" id="length" class="stored" name="begin" /><br></br><br></br>
		<label class="" for="lengthEnd">End Date</label>&nbsp;<br>
		<input type="date" id="lengthEnd" class="stored" name="end" /><br></br>
		<label class="required" for="pos">Position and Duties</label>&nbsp;
		<textarea rows="4" cols="20" id="pos" class="stored" name="pos" required> </textarea><br><br></br>
		<label for="leave">Reason for Leaving</label>&nbsp;
		<textarea rows="4" cols="20" id="leave" class="stored" name="leave" > </textarea><br><br></br>
		</div>
		
		
		
		<input  class="submit" type="submit" name="submit" value="submit"/>
	
	</form>
	
</div>
		
		
<?php 
if(isset($_POST['submit'])){
	$con = dbConnectNow();
	$emp= mysqli_real_escape_string($con, $_POST['emp']);
	$super= mysqli_real_escape_string($con, $_POST['supervisor']); 
	$addr = mysqli_real_escape_string($con, $_POST['address']);
	$zip= mysqli_real_escape_string($con, $_POST['zip']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']); 
	$begin = mysqli_real_escape_string($con, $_POST['begin']);
	$end= mysqli_real_escape_string($con, $_POST['end']);	
	$position = mysqli_real_escape_string($con, $_POST['pos']);
	$leave = mysqli_real_escape_string($con, $_POST['leave']);
	
	
	
	$zipLength = zipLengthCheck($zip);
	if(strcmp("no", $zipLength) == 0){
		echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
	}	
	if(is_numeric($zip)){
		if(is_numeric($phone)){
			$save = hasDashes($phone);
			if($save == "yes"){
				//echo $save . "<br></br>";
				$phone = noDashes($phone);
				//echo $_POST['4'];
				//echo "<br></br>" . $post[$count];
			}
			$city = getCity($zip);
			$state = getState($zip);
			$sqlUpdate = "ALTER TABLE `temp_resumes` ADD COLUMN `employer` varchar(60) NOT NULL, ADD COLUMN `supervisor` varchar(60) NOT NULL, ADD COLUMN  `e_city` text NOT NULL, ADD COLUMN  `e_state` text NOT NULL, ADD COLUMN  `e_zip` 
			varchar(5) 
			NOT NULL, ADD COLUMN  `employer_phone_number` text NOT NULL, ADD COLUMN `length_of_job` int NOT NULL, ADD COLUMN  `position_held` varchar(30) NOT NULL, ADD COLUMN  `reason_for_leaving` varchar(30) NOT NULL, ADD COLUMN  
			`begin_date` 
			date NOT NULL, ADD COLUMN  `end_date` date NOT NULL";
			$queryAlter = mysqli_query($con, $sqlUpdate); 
	
			$lens =strtotime($begin) - strtotime($end);
			$len = 34;
			$sesId = $_SESSION['cwwid'];
			$sqlInsert = "UPDATE `temp_resumes` SET `employer`='$emp', `supervisor`='$super', `e_city`='$city', `e_state`='$state', `e_zip`='$zip', `employer_phone_number`='$phone', `length_of_job`='$len', `position_held`='$position', 
			`reason_for_leaving`='$leave', `begin_date`='$begin', `end_date`='$end' WHERE `user_id`='$sesId'";
			$queryInsert = mysqli_query($con, $sqlInsert);
			if($queryInsert){
				header("location:" . VIEWRESUME . "?id=" . $_SESSION['cwwid']);
				
			}
		}
		else{
			echo "<script>alert('zipcode has to be an interger');</script>";
		}

	}
	else{
		echo "<script>alert('zipcode has to be an interger');</script>";
	}
	



}



?>		














<?php require("publicfooter.php"); ?>