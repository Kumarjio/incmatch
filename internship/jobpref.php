<?php
	require("publicheader.php");
	
?>

<style>
h1{
	margin: 0;
	padding: 0;
	left: 0;
	right: 0;
}
/*.main{
	margin: 0 5% 0 8%;
	padding: 15%;
	left: 0;
	right: 0;
}*/
.myBox{
	display: inline-block;
	position: relative;
	margin: 5% 0 5% 0;
	
}
.myBox{
		
		
	}
	.main{
		padding: 0 15%;
	}
	.jp2{
		
	}
.contain{
	background-color: 192535;
	width: 50%;
	padding: .2%;
}
.jobs{
	float: left;
	background-color: #192535;
	border-radius: 10px;
	padding: 2%;
	width: 25%;
	color: #ffffff;
}

.jp2:before{
		font-family: Oswald;
		content: "ADD JOB PREFERENCES";
		color: #ffffff;
	}
.sidebyside{
	display: inline-block;
	padding: 0 5% 0 5%;
	position: relative;
	/*left: 2.5em;*/
}
.jobInfos{
	left: 0;
	display: inline-block;
	position: relative;
	width: 15%;
	
	
}
label{
	color: #ffffff;
}
input[type="submit"]{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
	cursor: pointer;

}
input{
	
	
}
.jp{
	background-color: #BDBDBD; 
	position: relative;
	
	padding: 0 5% 10% 15%; 
	text-align: center;
	display: inline-block;
	
}
.jp2{
	background-color: #192535; 
	background: rgba(25, 37, 53, 0.9);
	/*background: rgba(8, 43, 118, 0.32);*/
	padding: 0 15% 10% 5%; 
	text-align: center;
	display: inline-block;
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
	]
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
		margin: 5% 0 5% 0;
	}

}
@media screen and (min-width: 660px) and (max-width: 845px){
	.jobs{
		width: 100%;
		
	}
	.main{
		padding: 15%;
	}
	.jp2{
		padding: 0;
		margin: 0;
		right: 0;
		width: 100%;
	}
	input[type="text"]{
		margin-left: 15%;
	}
}
@media screen and (min-width: 850px) and (max-width: 1092px{
	.jp2{
		text-align: left;
		width: 30%;
		margin: 2% 0 0 0;
	}
	.main{
		padding: 0;
		
	}
	.sidebyside{
		width: 35%;
		margin: 0;
		padding: 0;
	}
}
@media screen and (min-width: 1093px) and (max-width: 1700px){
	
	.myBox{
		width: 30%;
		
	}
	.main{
		padding: 15%;
	}
	.jp2{
		width: 50%;
	}
	
}
</style>
<div class="main">
<div class="myBox">
<div class="sidebyside" style="">
	<h1>In order to select multiple Internship/Job preferences use the<span style="color: red"> CTRL </span> button for windows and the <span style="color: red">COMMAND </span>button for macs.</h1>

	<h1 >Potential employers are being matched to you by<span style="color: red"> Job Type</span> and <span style="color: red">zipcode</span></h1>
	<h1 >Please refrain from choosing preferences that are not in a <span style="color: red">50 </span>mile radius of your physical location.</h1><br></br>
</div></div>
<div class="myBox">
<div class="jp2" style="color: #ffffff">

	<form action="<?php $_SERVER['PHP_SELF']?>" method="post">
		
		<label for="job">Job Type:</label>  &nbsp; <br></br>
		<select type="text" id="job" name="job[]" multiple="multiple" /> 
			<option value="Application Developer" >App Developer</option>
			
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
		<br></br> &nbsp;<br>
		<label for="zipcode">Zipcode</label>
		<input type="text" id="zipcode" name="zip"><br><br><br><br>
		<input type="submit" name="submit" value="SUBMIT" />
	</form>


</div>
</div>


<div class="mybox" style="">
<div class="jp" style=''><h2 style="margin: 0 0 0 0">Your current job preferences </h2>
<?php
$con = dbConnectNow();
	$sesId = $_SESSION['cwwid'];
	$sql = "SELECT `job_type`, `zip` FROM `job_pref` WHERE `user_id`='$sesId'";
	$query = mysqli_query($con, $sql);
	if($query){
		while($results = mysqli_fetch_array($query)){
			
			echo"<div class='jobs' style='margin: 1% 0 0 3%'><strong>" . strToUpper($results['job_type']) . "</strong><br><br>";
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
		$jobs = array();
		$job = mysqli_real_escape_string($con, $_POST['job']);
		foreach ($_POST['job'] as $selectedOption){
		$jobs[$count] = $selectedOption;
   	 
   		 $count++;
    }
		$zip= mysqli_real_escape_string($con, $_POST['zip']);
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
?>



<div style="margin: 0">

</div>




<?php require("publicfooter.php"); ?>