<?php ob_start();  require("header.php"); ?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
		<title>Employer Signup</title>
<style>
	.formbox{
		margin: 0; 
		left: 0;
		padding-left: 5%;
	}
	.inputBox{
		margin: 0;
		left: 0;
	}
	.main{
		margin-top: 2%;
	}

@media screen and (min-width: 300px) and (max-width: 640px){
	textarea{
		width: 100%;
	}

}
	
@media screen and (min-width: 1000px){
	.formbox{
		left: 15%;
	}
}	
</style>
 <script type="text/javascript">
$(document).ready(function(){
	$("#pointer").css("cursor", "pointer");
    $("#pointer").click(function(){
       $("#blurb").hide();
        var button = $('<input type="submit" name="showH1" value="Press Me to see the introduction" />');
        button.css({"margin": "0 0 0 5em", "cursor": "pointer"});
      	
        $("div").eq(1).append(button);
        button.click(function(){
        	$("#blurb").show();
        	button.hide();
        });
       
    });
     
});

</script>
</head>

<div class="main">
<h1 id="blurb" style="margin: 0 0 1em 2em; background-color: #feb600; border-radius: 10px; padding: 2em">

Create an internship or job listing<br>

To create a new listing, fill out the fields below. Including specific details in the “Description” and “Qualifications” fields will help potential candidate determine whether they should contact you about the position. 
Once you complete a listing, the application will generate a list of intern/job-seekers who might be a good match, based on the information you have submitted regarding the type of position and geographic location by zip code. 
<br></br>

<span style="color: red" id="pointer"> Click to remove introduction</span></h1> </div>


<div class="formbox">
<form class="inputBox" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for="type" class="required">Internship Type:</label>  &nbsp;<br>
		<select type="text" id="type" name="type"  required/> 
			<option value="Application Developer">App Developer</option>			
			<option value="Application Support Analyst">Application Support Analyst</option>
			<option value="Applications Engineer">Applications Engineer</option>
			<option value="Associate Developer">Associate Developer</option>
			<option value="Chief Technology Officer (CTO)">Chief Technology Officer (CTO)</option>
			<option value="Chief Information Officer (CIO)">Chief Information Officer (CIO)</option>
			<option value="Computer and Information Systems Manager">Computer and Information Systems Manager</option>
			<option value="Computer Systems Manager">Computer Systems Manager</option>
			<option value="Customer Support Administrator">Customer Support Administrator</option>
			<option value="Customer Support Specialist">Customer Support Specialist</option>
			<option value="Data Center Support Specialist">Data Center Support Specialist</option>
			<option value="Data Quality Manager">Data Quality Manager</option>
			<option value="Database Administrator">Database Administrator</option>
			<option value="Database Specialist">Database Specialist</option>
			<option value="Desktop Support Manager">Desktop Support Manager</option>
			<option value="Desktop Support Specialist">Desktop Support Specialist</option>
			<option value="Director of Technology">Director of Technology</option>
			<option value="Front End Developer">Front End Developer</option>
			<option value="Help Desk">Help Desk</option>
			<option value="Help Desk Specialist">Help Desk Specialist</option>
			<option value="Help Desk Technician">Help Desk Technician</option>
			<option value="Information Technology Coordinator">Information Technology Coordinator</option>
			<option value="Information Technology Director">Information Technology Director</option>
			<option value="Information Technology Manager">Information Technology Manager</option>
			<option value="IT Support Manager">IT Support Manager</option>
			<option value="IT Support Specialist">IT Support Specialist</option>
			<option value="IT Systems Administrator">IT Systems Administrator</option>
			<option value="IT Networking">IT Networking</option>
			<option value="IT Security">IT Security</option>
			<option value="Java Developer">Java Developer</option>
			<option value="Junior Software Engineer">Junior Software Engineer</option>
			<option value="Management Information Systems Director">Management Information Systems Director</option>
			<option value=".NET Developer">.NET Developer</option>
			<option value="Network Architect">Network Architect</option>
			<option value="Network Engineer">Network Engineer</option>
			<option value="Network Systems Administrator">Network Systems Administrator</option>
			<option value="Programmer">Programmer</option>
			<option value="Programmer Analyst">Programmer Analyst</option>
			<option value="Security Specialist">Security Specialist</option>
			<option value="Senior Applications Engineer">Senior Applications Engineer</option>
			<option value="Senior Database Administrator">Senior Database Administrator</option>
			<option value="Senior Network Architect">Senior Network Architect</option>
			<option value="Senior Network Engineer">Senior Network Engineer</option>
			<option value="Senior Network System Administrator">Senior Network System Administrator</option>
			<option value="Senior Programmer">Senior Programmer</option>
			<option value="Senior Programmer Analyst">Senior Programmer Analyst</option>
			<option value="Senior Security Specialist">Senior Security Specialist</option>
			<option value="Senior Software Engineer">Senior Software Engineer</option>
			<option value="Senior Support Specialist">Senior Support Specialist</option>
			<option value="Senior System Administrator">Senior System Administrator</option>
			<option value="Senior System Analyst">Senior System Analyst</option>
			<option value="Senior System Architect">Senior System Architect</option>
			<option value="Senior System Designer">Senior System Designer</option>
			<option value="Senior Systems Analyst">Senior Systems Analyst</option>
			<option value="Senior Systems Software Engineer">Senior Systems Software Engineer</option>
			<option value="Senior Web Administrator">Senior Web Administrator</option>
			<option value="Senior Web Developer">Senior Web Developer</option>
			<option value="Software Architect">Software Architect</option>
			<option value="Software Developer">Software Developer</option>
			<option value="Software Engineer">Software Engineer</option>
			<option value="Software Quality Assurance Analyst">Software Quality Assurance Analyst</option>
			<option value="Support Specialist">Support Specialist</option>
			<option value="Systems Administrator">Systems Administrator</option>
			<option value="Systems Analyst">Systems Analyst</option>
			<option value="System Architect">System Architect</option>
			<option value="Systems Designer">Systems Designer</option>
			<option value="Systems Software Engineer">Systems Software Engineer</option>
			<option value="Technical Operations Officer">Technical Operations Officer</option>
			<option value="Technical Support Engineer">Technical Support Engineer</option>
			<option value="Technical Support Specialist">Technical Support Specialist</option>
			<option value="Technical Specialist">Technical Specialist</option>
			<option value="Telecommunications Specialist">Telecommunications Specialist</option>
			<option value="Web Administrator">Web Administrator</option>
			<option value="Web Developer">Web Developer</option>
		</select>
		<br></br> &nbsp;
		<label for="title" class="required">Internship Title: </label>  &nbsp;
		<input type="text" id="title" name="title" required  /> <br></br><br></br>
		<label for="description">Internship Description:</label>   <br>
		<textarea  placeholder="description" id="description" name="description" rows="10" cols="40"></textarea><br><br>
		<label for="length">Internship Length in Months: </label>  &nbsp; <br>
		<select id="length" name="length" required> 
			<?php  
				$count = 0;
				$months = 12;
				while($count <= $months){
					if($count == 1){
						echo "<option value='" . $count  . " '>" . $count . " month</option>";
						$count++;
					}
					else{
						echo "<option value='" . $count . " '>" . $count . " months</option>";
						$count++;
					}
				}
				?>
			
		</select><br><br>
		<label for="weeks">Internship Length in Weeks: </label>  &nbsp; <br>
		<select id="weeks" name="weeks" required> 
			<?php  
				$count = 0;
				$months = 24;
				while($count <= $months){
					if($count == 1){
						echo "<option value='" . $count  . " '>" . $count . " week</option>";
						$count++;
					}
					else{
						echo "<option value='" . $count . " '>" . $count . " weeks</option>";
						$count++;
					}
				}
				?>
		</select><br><br>
		<label for="days">Internship Length in Days: </label>  &nbsp; <br>
		<select id="days" name="days" required> 
			<?php  
				$count = 0;
				$months = 60;
				while($count <= $months){
					if($count == 1){
						echo "<option value='" . $count  . " '>" . $count . " day</option>";
						$count++;
					}
					else{
						echo "<option value='" . $count . " '>" . $count . " days</option>";
						$count++;
					}
				}
				?>
			
			
		</select><br><br>
		<label for="qualifications">Qualifications needed for this position: </label>  &nbsp; <br>
		
		<textarea  placeholder="qualifications" id="qualifications" name="qualifications" rows="10" cols="40"></textarea><br><br>
		<label for="zip" class="required">Internship Location Zipcode: </label>  &nbsp;
		<input type="text" id="zip" name="zip" required /> <br></br><br></br>
		<label for="paidOrNot">Paid Internship: </label> &nbsp;
		<input type="checkbox" id="paidOrNot" name="paidOrNot" /> <br><br><br>
		<label for="link" class="required">Link to your desired Application: </label> &nbsp;
		<input type="url" id="link" name="link" required/> <br></br><br></br>
		<label for="closing" class="required">Listing closing date:<br>(listings are automatically removed from the site after this date) </label> <br>
		<input type="date" id="closing" name="closing" required/> <br></br><br></br>
		<input class="submit" type="submit" name="submit" value="submit" />	<br><br><br>


</form>
</div>
<br>
<br>
<div style="height: 15%">

</div>

<?php 
	$sqls = "SELECT `Company` FROM `employers UNION SELECT `company`";
	
		
			//echo $_SESSION['id'];
			//echo $_SESSION['companyName'];
			?>


<?php
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		if(isset($_POST['submit'])){
			$con = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME) or die("done");
			$jobType = mysqli_real_escape_string($con, $_POST['type']);
			$jobTitle = mysqli_real_escape_string($con, $_POST['title']);			
			$internshipLength = mysqli_real_escape_string($con, $_POST['length']);
			$weeks = mysqli_real_escape_string($con, $_POST['weeks']);
			$days = mysqli_real_escape_string($con, $_POST['days']);
			$jobDescription = mysqli_real_escape_string($con, $_POST['description']);
			$qualifications = mysqli_real_escape_string($con, $_POST['qualifications']);
			$zip = mysqli_real_escape_string($con, $_POST['zip']);
			$applicationLink = mysqli_real_escape_string($con, $_POST['link']);
			$paidOrNot = mysqli_real_escape_string($con, $_POST['paidOrNot']);
			$closing = mysqli_real_escape_string($con, $_POST['closing']);
			$description = mysqli_real_escape_string($con, $_POST['description']);
			
			if(strcmp($paidOrNot, "on") == 0){
				$paid = "yes";
			}
			else{
				$paid = "no";
			}
			
			$cn =  $_SESSION['full'];
			$empId = $_SESSION['id'];
			//echo $jobType;
			//echo "<script>location=" . $_SESSION['homepage'] . "</script>";
			//header($_SESSION['homepage']);
			$today = getdate();
			$y_day = $today['yday'];
			$create = "CREATE TABLE if not exists `internships`(
			id int AUTO_INCREMENT PRIMARY KEY,
			company varchar(50),
			job_type varchar(80),
			job_title varchar(80),
			internship_length varchar(30),
			link varchar(255),
			employer_id int,
			paid_or_not varchar(4),
			y_day int,
			description text,
			qualifications text,
			zip varchar(5),
			created_at text,
			closing_date text,
			months int(10),
			weeks int(10),
			days int(10))";
			$created_at = date("F d, Y");
			$query2 = mysqli_query(dbConnectNow(), $create);
			if($query2){
				$sql = "INSERT INTO `internships`(`company`, `job_type`, `job_title`, `internship_length`, `link`, `employer_id`, `paid_or_not`, `y_day`, `description`,`qualifications`, `zip`, `created_at`, `closing_date`, `months`, `weeks`, `days`) VALUES('$cn', '$jobType', '$jobTitle', '$internshipLength', '$applicationLink', '$empId', '$paid', '$y_day', '$description', '$qualifications', '$zip', '$created_at', '$closing', '$internshipLength', '$weeks', '$days')";
				$query = mysqli_query(dbConnectNow(), $sql);
				if($query){
					header("location: " . APPLICANTS . "?" . $jobType);
					
					
					
				}
				else{
					echo "NOT WORKING";
				}
			}
			else{
				echo "not working";
			}
			
			
		}
		
	}
?>















<?php require("footerrelative.php"); ?>