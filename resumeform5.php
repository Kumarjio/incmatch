<?php
	require("publicheader.php");
	
?>


<script>
$(document).ready(function() {

 if(typeof(Storage) !== "undefined") {
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
    
    
});
});
</script>



<style>
.formBox:before{
	content: "Employment History";
	font-weight: bold;
}
.underline{
	border-bottom: 2px solid grey;
	 width: 100%;
	 position: relative;
	 top: -3em;
}
.shadow{
}
.formBox{
	margin: 0 0 0 5%;
	left: 0;
}
#pointer{
	font-size: 36px;
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
		margin: 0 0 2% 25%;
	}
	.formBox{
		position: relative;
		top: 0;
		margin: auto;
		width: 50%;
		
		
		
	}
}
</style>
<h1 class="shadow" style="" id="pointer"> Add Work Experience</h1><div class="underline"></div><br>
<h1 style="font-size: 24px">Employer Information</h1>
<div class="formbox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<div class="resumeform">
			
		<input type="text" id="emp" class="stored" name="emp" /><br><br><br>
		<label class="" for="supervisor">Supervisor name</label>&nbsp;
		<input type="text" id="supervisor" class="stored" name="supervisor" /><br><br><br>
		<label class="" for="address">Company address</label>&nbsp;
		<input type="text" id="address" class="stored" name="address" /><br><br><br>
		
		<label class="" for="zip">ZIPCODE</label>&nbsp;
		<input type="text" id="zip" class="stored" name="zip" /><br><br><br>
		<label class="" for="phone">Company phone number</label>&nbsp;
		<input type="tel" id="phone" class="stored" name="phone" /><br></br><br></br>
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
	
	$zip = mysqli_real_escape_string($con, $_POST['zip']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']); 
	$begin = mysqli_real_escape_string($con, $_POST['begin']);
	$end = mysqli_real_escape_string($con, $_POST['end']);	
	$position = mysqli_real_escape_string($con, $_POST['pos']);
	$leave = mysqli_real_escape_string($con, $_POST['leave']);
	
	
	$zipLength = zipLengthCheck($zip);
	if(strcmp("no", $zipLength) == 0){
		echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
	}
	else{	
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
					
				$sqlUpdate = "CREATE TABLE IF NOT EXISTS `temp_user_employer` (
					id int PRIMARY KEY AUTO_INCREMENT,
					user_id int,
					employer varchar(60) NOT NULL, 				
					supervisor varchar(60) NOT NULL, 
					employer_address varchar(60) NOT NULL, 
					e_city varchar(60) NOT NULL,
					e_state varchar(2) NOT NULL, 
					e_zip varchar(5) NOT NULL, 
					employer_phone_number varchar(10) NOT NULL,
					length_of_job int NOT NULL,
					position_held varchar(30) NOT NULL, 
					reason_for_leaving varchar(30) NOT NULL,
					begin_date date NOT NULL,
					end_date date NOT NULL)";
				$queryAlter = mysqli_query($con, $sqlUpdate); 
				//if($queryAlter){
					$lenz = strtotime($end) - strtotime($begin);
					$len = 34;
					$sesId = $_SESSION['cwwid'];
					$tr = doesPublishResumeExist($_SESSION['cwwid']);	
					if(strcmp($tr, "yes") == 0){
						$sqlInsert = "INSERT INTO `user_employers`(`user_id`, `employer`, `supervisor`, `employer_address`, `e_city`, `e_state`, `e_zip`, `employer_phone_number`, `length_of_job`, `position_held`, 
						`reason_for_leaving`, 
						`begin_date`, 
						`end_date`) VALUES('$sesId', '$emp', '$super', '$addr', '$city', '$state', '$zip', '$phone', '$lenz', '$position', '$leave', '$begin', '$end')";
					}
					else{
						$sqlInsert = "INSERT INTO `temp_user_employer`(`user_id`, `employer`, `supervisor`, `employer_address`, `e_city`, `e_state`, `e_zip`, `employer_phone_number`, `length_of_job`, `position_held`, 
						`reason_for_leaving`, 
						`begin_date`, 
						`end_date`) VALUES('$sesId', '$emp', '$super', '$addr', '$city', '$state', '$zip', '$phone', '$lenz', '$position', '$leave', '$begin', '$end')";
					}
					$queryInsert = mysqli_query($con, $sqlInsert);
					if($queryInsert){
						header("location:" . VIEWRESUME . "?id=" . $_SESSION['cwwid']);
					}
					else{
						echo "<script>alert('Something went wrong. Please contact site administrator.');</script>";
					}
		
				//}
			}
			else{
				echo "<script>alert('Phone number has to be intergers only');</script>";
			}
		}
		else{
			echo "<script>alert('zipcode has to be an interger');</script>";
		}
	}
}



	
?>




<?php require("publicfooter.php"); ?>