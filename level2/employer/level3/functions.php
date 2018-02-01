<?php 
session_start(); 
ob_start();
	require("config.php");
	require("dblogin.php");
	
	define("jobLength", 60); //jobs stay up for 2 months
	define("WIDTH", 80);
	define("HEIGHT", 80);
	define("UNAUTH", 1); //member numb for non-verified employers
	define("AUTH", 8); // member number for verified employers
	define("EMAIL", "info@cyberwatchwest.org"); //admin emali that will receive all the communication emails
	define("HEADER", "FROM: info@cyberwatchwest.org"); //header to use with mailto();
	define("HOME", "http://cwwinternship.cyberwatchwest.org/inc/index.php"); //home constant
	define("LOGOUT", "http://cwwinternship.cyberwatchwest.org/inc/logout.php"); //home constant
	define("EMPLOGIN", "http://cwwinternship.cyberwatchwest.org/inc/mylogin.php"); //Employer login page constant
	define("USERLOGIN", "http://cwwinternship.cyberwatchwest.org/inc/cwwsignin.php"); //User login page constant
	define("EMPSIGNUP", "http://cwwinternship.cyberwatchwest.org/inc/employers.php"); //Employer signup page constant
	define("VERIFIED", "http://cwwinternship.cyberwatchwest.org/inc/verified.php");	 //Verified page constant
	define("GOVERIFY", "http://cwwinternship.cyberwatchwest.org/inc/goverify.php");		
	define("ACCESS", "http://cwwinternship.cyberwatchwest.org/inc/accesscodegenerator.php");	
	define("ACODE", "http://cwwinternship.cyberwatchwest.org/inc/adcode.php");	
	define("ASIGNIN", "http://cwwinternship.cyberwatchwest.org/inc/adminsignin.php");
	define("UNAUTHMSG", "http://cwwinternship.cyberwatchwest.org/inc/unauthmessage.php");	
	define("APPLICANTS", "http://cwwinternship.cyberwatchwest.org/inc/applicants.php");	
	define("SCHOOLCHECK", "http://cwwinternship.cyberwatchwest.org/inc/schoolcheck.php");
	define("ADSIGNUP", "http://cwwinternship.cyberwatchwest.org/inc/adsignup.php");
	define("EMPHOME", "http://cwwinternship.cyberwatchwest.org/inc/mypage.php");
	define("SKRHOME", "http://cwwinternship.cyberwatchwest.org/inc/home.php");
	define("SKRSIGNUP", "http://cwwinternship.cyberwatchwest.org/inc/seekersignup.php");
	define("SKRSIGNIN", "http://cwwinternship.cyberwatchwest.org/inc/cwwsignin.php");
	define("PASSRESET", "http://cwwinternship.cyberwatchwest.org/inc/passreset.php");
	define("PASSRESETTEMP", "http://cwwinternship.cyberwatchwest.org/inc/passresetemp.php");
	define("RESETPASS", "http://cwwinternship.cyberwatchwest.org/inc/resetpass.php");
	define("RESETPASSEMP", "http://cwwinternship.cyberwatchwest.org/inc/resetpassemp.php");
	define("SKRSEARCH", "http://cwwinternship.cyberwatchwest.org/inc/cwwemployersearch.php");
	define("CWWEMPS", "http://cwwinternship.cyberwatchwest.org/inc/cwwemployers.php");
	define("VIEWRESUME", "http://cwwinternship.cyberwatchwest.org/inc/viewresume.php");
	define("EDITRESUME", "http://cwwinternship.cyberwatchwest.org/inc/editresume.php");	
	define("TERMS", "http://cwwinternship.cyberwatchwest.org/inc/terms.php");
	define("TERMS2", "http://cwwinternship.cyberwatchwest.org/inc/terms2.php");	
	define("JS", "http://cwwinternship.cyberwatchwest.org/inc/inc.js");			
	define("SALT", ";slkj$FtS@&*S");
	define("GOOGLEAPIKEY", "AIzaSyCtJIZUPpK9z0U50Exx7oSZvlblmwsrvwI");															
	define("RESLENGTH", 90); //resumes will stay in the database for 90 days
	$adminEmail = getAdEmail();
	define("ADMINEMAIL", $adminEmail);
	define("INC", "INC Match");
	$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	//$currentUrls = $_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$GLOBALS['currentUrl'];
	//if(isset($_SESSION['id']) || isset($_SESSION['cwwid'])){
		//sessionTimeOutUser();
		//sessionTimeOut();
	//}
?>



<?php

function zipLengthCheck($zip){
	$zipLength = strlen($zip);
			
			
	if($zipLength != 5){
		return "no";
	}
	else{
		return "yes";
	}
}
function LengthChecks($num, $length){
	$zipLength = strlen($num);
			
			
	if($zipLength != $length){
		return "no";
	}
	else{
		return "yes";
	}
}
function getCity($zip){
	$cityCheckApi = "https://maps.googleapis.com/maps/api/geocode/xml?key=" . GOOGLEAPIKEY . "&address=" . urlencode($zip);
		
	$cityState = simplexml_load_file($cityCheckApi) or die("Error: Cannot create object");
				
	$cityName = $cityState->result->address_component[1]->long_name;
	return $cityName;
}
function getState($zip){
	$stateCheckApi = "https://maps.googleapis.com/maps/api/geocode/xml?key=" . GOOGLEAPIKEY . "&address=" . urlencode($zip);
		
	$cityState = simplexml_load_file($stateCheckApi) or die("Error: Cannot create object");
	$count = 2;
	$level = "administrative_area_level_1";
	while($count < 6){
		$actualLevel = $cityState->result->address_component[$count]->type;
		if(strcmp($level, $actualLevel) == 0){	
			$stateName = $cityState->result->address_component[$count]->short_name;
			$count++;
			
		}
		else{
			$count++;
		}
	}
		
		
	return $stateName;
		
}
function zipCityMatch($zip){
	$cityCheckApi = "https://maps.googleapis.com/maps/api/geocode/xml?key=" . GOOGLEAPIKEY . "&address=" . urlencode($zip);
		
	$cityState = simplexml_load_file($cityCheckApi) or die("Error: Cannot create object");
				
	$cityName = $cityState->result->address_component[1]->long_name;
	if(strcmp($city, $cityName) != 0){
		return "no";
	}
	else{
		return "yes";
	}
			
}

function copyRightDateCheck($currentYear){
	$thisYear = date(Y);
	if($currentYear != $thisYear){
		$currentYear = $thisYear;
		return $currentYear;
	}
	else{
		return $currentYear;
	}
}

function addDashes($phoneNumber){
	$saves = "";
		for($i = 0; $i < 2; $i++){
			
			$save = substr($phoneNumber, $i*3, 3);
			$saves = $saves . $save . "-";
			if($i == 1){
				$saves .= substr($phoneNumber, 6, 4);
			}
			
			
		}
		return $saves;
	}
	
function noDashes($phoneNumber){
	$saves = "";
		for($i = 0; $i < 2; $i++){
			
			$save = substr($phoneNumber, $i*4, 3);
			$saves = $saves . $save;
			if($i == 1){
				$saves .= substr($phoneNumber, 8, 4);
			}
			
			
		}
		return $saves;
	}
	
function hasDashes($phoneNumber){
	
			$tr = "no";
			$save = substr($phoneNumber, 3, 1);
			if($save == "-"){
				$tr = "yes";
				
			}
			return $tr;

	
}
	



/*

*/
function jobTitles($role){
?>
	
		<label for="role">Job Type:</label>  &nbsp;<br>
		<select type="text" id="role" name="role" /> 
			<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
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
			<option value="Data Center Support Specialist">Help Desk</option>
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
		
<?php
}

function jobTitles2(){
?>
	
		<label for="role">Job Type:</label>  &nbsp;<br>
		<select type="text" id="role" name="role" /> 
			
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
			<option value="Data Center Support Specialist">Help Desk</option>
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
		
<?php
}

/*
Accepts the name of the header you would like to use
*/
	//returns a session id with the everything after equal sign in url
	function counts(){
		$id = getEverythingAfterEqualSignInUrl2($currentUrl);
		$sql = "SELECT * FROM `temp_employers`";
		$query = mysqli_query(dbConnectNow(), $sql);
		$count = 0;
		$com = "";
		if($query){
			while($results = mysqli_fetch_array($query)){
				if($_SESSION[$results['companyName']] == $results['id']){
					$com = $results['Company'];
					continue;
				}
				
			}
			return $_SESSION[$com];
		}
		
	}
	
		//This function gets everything after the equal sign in the url.
	function getEverthingAfterEqualSignInUrl2($currentUrl){
		$count = 0;
		
		//$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	
		$employerJobs = substr($currentUrl, 0);
	
	
		while($employerJobs[$count] == "="){
			$count++;
		}
		$clickedResume = substr($currentUrl, $count + 1);
		return $clickedResume;
	}
	
	function lengthCheck($password){
		$pass = str_split($password);
		if(count($pass) < 8){
			echo "<script>alert('Password has to be longer than 8 characters')";
		}
		else{
			return $password;
		}
	}
	
	function checkForSymbols($password){
		$hasSymbol = "no";
		$symbols = array("!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "_", "=", "+");
		$pass = str_split($password);
		$countPass = count($pass);
		$countSymbols = count($symbols);
		for($w = 0; $w < $countSymbols; $w++){

			for($s = 0; $s < $countPass; $s++){
				if($pass[$s] == $symbols[$w]){
					$hasSymbol = "yes";
				}
			}
		}
		if("yes" == $hasSymbol){
			return $hasSymbol;
		}
		else{
			echo "<script>alert('Password has to have at least one special character. (! @ # $ % ^ & * ( ) - _ = +)')</script>";
			return $hasSymbol;
		}
	}
	
	//takes a url and a character that seperates what you want in a url from the seperator characrer
	function getEverthingAfterEqualSignInUrl3($currentUrl, $seperator){
		$count = 0;
		
		//$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	
		$employerJobs = substr($currentUrl, 0);
	
	
		while($employerJobs[$count] == "$seperator"){
			$count++;
		}
		$clickedResume = substr($currentUrl, $count + 1);
		return $clickedResume;
	}
	
	//Takes a employer name and makes a abbreviation to store in database.  That way it is easier to call the right employer when trying to view cww employers from user page.
	function nameToSpace($name){
		$count = 0;
		$counts = 0;
		$blanks = 1;
		$blank = " ";
		$newName = substr($name, 0);
		$lenStr = strlen($name);
		//echo $newName[1];
		//echo $name[2];
		//echo count($newName);
		for($i = 0; $i < $lenStr; $i++){
			if($newName[$i] == $blank){
					$blanks++;
					break;
			}
			else{
				$counts++;
				echo $names[$i];
			}
		}
		
		
		
			$neName = substr($name, 0, $counts);
		
			return $neName;
			//echo $neName;
			//echo $blanks;
			//echo $counts;
		
	}
	
	
	
	
	//displays all the jobs that the signed in company has created.
	function getJobBoardInfo(){
		global $dbNumRowsInternship;
		global $result;
		global $result4;
		global $result5;
		global $val;
		global $count;
		 $b = 0;		
		$con = dbConnectNow();
		$sql = "SELECT * FROM `internships` WHERE `company`=" . $_SESSION['companyName'];
		$query = mysqli_query($con, $sql);
		//if($query){
			$sql2 = "SELECT * FROM `internships` WHERE `employer_id`=" . $_SESSION['id'];
			$sql3 = "SELECT * FROM `internships`";
			$query2 = mysqli_query($con, $sql2);
			$query3 = mysqli_query($con, $sql3);
			//$result = mysqli_fetch_assoc($query2);
			if($query2 == false){
				echo "";
			}
			else{
			$numRows = mysqli_num_rows($query2);
			$numCols = mysqli_num_fields($query2);		
			$count = 0;
			?>	
	<?php
			while($result4 = mysqli_fetch_array($query2)){
				$today = getdate();
				if(($result4['y_day'] + jobLength) > $today['yday']){
				?>								
				<?php				
				echo "<div class='' style='margin: 2% 0 0 0'><strong>" . strToUpper($result4['company']) . "</strong><br><br>";
				echo  "<strong>LISTING TYPE: </strong><br>" . $result4['job_type'] . "<br><br>";
				echo  "<strong>LISTING TITLE: </strong><br>". $result4['job_title'] . "<br><br>";
				if(strcmp($result4['job_or_intern'], Job) == 0){
					echo  "<strong>This is a JOB opportunity</strong><br><br>";
				}
				else{
					echo  "<strong>This is an INTERNSHIP opportunity</strong><br><br>";
				}
				echo  "<strong>LISTING DESCRIPTION: </strong><br>" . $result4['description'] . "<br><br>";
				echo  "<strong>LISTING QUALIFICATIONS: </strong><br>" . $result4['qualifications'] . "<br><br>";
				echo "<strong>LISTING LENGTH: </strong><br>Months " . $result4['months'] . " Weeks " . $result4['weeks'] . " Days "  . $result4['days'] . "<br><br>";
				echo  "<strong>LISTING LOCATION: </strong><br>" . $result4['zip'] . "<br>";
				echo "<a style='color: #000000' href=" . $result4['link'] . ">" . $result4['link'] . "</a></div>";
				echo "<div class='' style='border-bottom: 2px solid #000000;'></div>";
				?>				
				</div>
				<?php
				}
				else{
					echo "All Your Jobs are expired";
				}
			}
				
			}
	}
		
?>

<?php	
	function placeOnScreen(){
		$newArray = array();
		$newArray = getJobBoardInfo();
		foreach($newArray as $info){
			echo $info;
		}
		
	}
	
	
	
	
	function chkBoxOnOrOff($postName, $nameIfOn, $nameIfOff){
		if(strcmp($postName, "on") == 0){
			$name = $nameIfOn;
			return $name;
		}
		else{
			$name = $nameIfOff;
			return $name;
		}
	}
?>
<?php
	function logout(){
		mysqli_close($db);
		session_destroy();
		$store = header("location:localhost:8080/mylogin.php");
		return $store;
	}
?>
<?php
	//This function actually gets all the employers that are signed-up through our web app and places them in the browser
	global $_Session;
	function getEmployers(){
		$con = dbConnectNow();
		$sql = "SELECT * FROM `employers` ORDER BY `companyName`";
		$count = 0;
		$query = mysqli_query($con, $sql);
		while($result = mysqli_fetch_array($query)){
			$count = 0;	
		        $info = mysqli_real_escape_string($con, $result["companyName"]);
		        $infoId = mysqli_real_escape_string($con, $result["id"]);
		        $abbrev = mysqli_real_escape_string($con, $result["abbrev"]);		        
			//$inf = htmlentities($info);
			//$_SESSION['choosen'] = 
			$compName[$count] = $info;
			$compId[$count] = $infoId;
			$compAbbrev[$count] = $abbrev;
			
				
				//$_Session[$compId] = $compName;
			
			//$link = "<a href=" . "joblistings.php?company=" . $compName[$count] . ">";
			//header("Content-type: image/png");
			//header('Content-Disposition: Attachment;filename=image.png'); 
			//header('Content-type: image/png'); 
			$im = imagecreatefrompng($result['Image']);
			imagepng($im);
			$imgs = $result['Image'];
			//echo "<img src='$imgs' >";
			if($imgs){
				$compName[$count] = str_replace(" ", "", $compName[$count]);
				//echo "alkjdf;laksdjf;aslkdfja;sdklfja;skldfjas;dklfja;sklfjas;klfjas";
				echo "<div class='jobInfo' style='display: inline-block'><a   style='color: #000000' href=" . "joblistings.php?company=" . $compAbbrev[$count] . "><img class='empLogo' src='data:image/png;base64," . base64_encode( $result['Image'] ) . "' style='padding: 1em' alt='cyberwatch west logo' /><br>" . $info . "</a></div>";
				//echo $compName[$count];
				$count++;
				$id = $result['id'];
				$_SESSION['id'] = $result['id'];
				//$_Session[$compId] = $compName;
				//echo $id;
			}
			else{
				echo "<div class='jobInfo' style='display: inline-block'><a  style='padding: 5px; color: #000000' href=" . "joblistings.php?company=" . $compAbbrev[$count] . ">" . $info . "</a></div>";
				//echo $compName[$count];
				$count++;
				$id = $result['id'];
				$_SESSION['id'] = $result['id'];
				//echo $id;
			}
			
		}
		$_SESSION['company'] = $result['Company'];
		//mysqli_close($con);

		//echo "<img src='$imgs' >";

	}
?>

<?php
	function getEmployer(){
		$count = 0;
		$info = getInternship();
		
		while($count < count($info)){
			
			
			echo "<div class='jobInfos'><a href='joblistings.php?employer=' . $info[$count] . >" . $info[$count] . "</a></div>";
			$count++;
		}
		//$_SESSION['company'] = $result['Company'];



	}
?>
<?php
	function getEmployerPage(){
		$sql = "SELECT * FROM `employers`";
		$query(dbConnectNow, $sql);
		while($result = mysqli_fetch_array($query)){
			$_SESSION['homepage'];
		}
	}
?>

<?php
	function getJobs($sesId){
		$count = 0;
		$con = dbConnectNow();
		$sql = "SELECT * FROM `internships` WHERE `employer_id`='$sesId'";
		$query = mysqli_query($con, $sql);
		//echo $_SESSION['id'];
		$res = array();
		if($query){
			while($result = mysqli_fetch_array($query)){
			
				$res[$count] = $result['job_title'];
				//echo $_Session[$res];
				$count++;
			
			
			}
			return $res;
		}
		return "";
	}
	function getJobPref($sesId){
		$count = 0;
		$con = dbConnectNow();
		$sql = "SELECT * FROM `job_pref` WHERE `user_id`='$sesId'";
		$query = mysqli_query($con, $sql);
		//echo $_SESSION['id'];
		$res = array();
		if($query){
			while($result = mysqli_fetch_array($query)){
			
				$res[$count] = $result['job_type'];
				//echo $_Session[$res];
				$count++;
			
			
			}
			return $res;
		}
		return "";
	}
	function getResume($sesId){
		$count = 0;
		$con = dbConnectNow();
		$sql = "SELECT role FROM `resumes` WHERE `user_id`='$sesId'";
		$query = mysqli_query($con, $sql);
		//echo $_SESSION['id'];
		$res = array();
		if($query){
			while($result = mysqli_fetch_array($query)){
			
				$res[$count] = $result['role'];
				//echo $_Session[$res];
				$count++;
			
			
			}
			return $res;
		}
		return "";
	}
	
	function getResume2($sesId, $resId){
		$count = 0;
		$con = dbConnectNow();
		$tr = doesPublishResumeExist($_SESSION['cwwid']);		
		if(strcmp($tr, "yes") == 0){
			$sql = "SELECT role FROM `resumes` WHERE `id`='$resId'";
		}
		
		else{
			$sql = "SELECT role FROM `temp_resumes` WHERE `id`='$resId'";
		}
		
		$query = mysqli_query($con, $sql);
		//echo $_SESSION['id'];
		$res = array();
		if($query){
			while($result = mysqli_fetch_array($query)){
			
				$res[$count] = $result['role'];
				//echo $_Session[$res];
				$count++;
			
			
			}
			return $res;
		}
		return "";
	}
	
	function getID($company){
		$sqlQuery = "SELECT * FROM `internships`";
		$con = dbConnectNow();
		$query = mysqli_query($con, $sqlQuery);
		while($result = mysqli_fetch_array($query)){
			if($company == $result['company']){
?>
			<div class="jobBoard">
<?php
				echo "<h3 class='jobInfo'>" . $result['job_type'] . "</h3> <br>"; 
				echo "<h4 class='jobInfo'>" . $result['internship_length'] . "</h4>";
				echo "<a href=" . $result['link'] . "><h3 class='jobInfo'>" . $result['company'] . "</h3></a>";
			}
?>
			</div>
<?php
			
		}
		mysqli_close($con);
	}
	
?>

<?php
	//Signs in all the people who are looking for employment.  You have to have a certain member number in order to sign in to the web app.
	function cwwSignIn($username, $password){
	
		$user = mysqli_real_escape_string(dbConnectNow(), $username);
		$pass = mysqli_real_escape_string(dbConnectNow(), $password);
		//echo $user . "&" . $pass;
		//$hashPass = password_hash($pass);
		$secure = sha1($pass);
		
		$salt = ";slkj@&*S";
		$secure .= $salt;
		//echo $secure;
		$sql1 = "SELECT * FROM `seekers`";
		$query1 = mysqli_query(dbConnectNow(), $sql1);
		if($query1){
		
			while($result = mysqli_fetch_array($query1)){
				//if(password_verify($pass, $result['password']) == 1)
				if($result['Username'] == $user){
					$_SESSION['cwwid'] = $result['id'];
					$sql = "SELECT * FROM `seekers` WHERE `Username`= '$user'";
					$con = dbConnectNow();
					$query = mysqli_query($con, $sql);
					if($result['Password'] == $secure){
						/*$sqlRegistered = "SELECT * FROM `cwwn_user_usergroup_map`";
						$queryRegistered = mysqli_query($con, $sqlRegistered);
						while($results2 = mysqli_fetch_array($queryRegistered)){
							if($_SESSION['cwwid'] == $results2['user_id'] && $results2['group_id'] == 9){
								$_SESSION['registered'] = "9";
								
							}
							
						}*/
								$_SESSION['cwwhomepage'] = SKRHOME . "?id=" . $_SESSION['cwwid'];
								$_SESSION['cwwusername'] = $user;
								$_SESSION['user_time'] = time(); 
								//echo "<script>location='home.php?id=' </script>";
								//echo "it's working " . $result['id'];
								//echo $_SESSION['cwwid'];
								$_SESSION['header'] = "publicheader.php";
								header("location:" . $_SESSION['cwwhomepage']);
					}
					else{
						echo "<script type=text/javascript> alert('Credentials are incorrect or you're not a registered member of CYBERWATCH WEST please try again') </script>";
		
					}
				}
				else{
			
					echo "<script type=text/javascript> alert('Credentials are incorrect or you're not a registered member of CYBERWATCH WEST please try again') </script>";
				}
				
				//mysqli_close(dbConnectNow());
			}
		}
		else{
			echo "query not working";
		}
}

?>
<?php
	function passwordDecrypt($password){
		
	}
?>



<?php
	//displays a specific job that the user clicks on.
	function getJobBoardInfos($clickedJob){
		global $dbNumRowsInternship;
		global $result;
		global $result4;
		global $result5;
		global $val;
		global $count;
		$name = "";
		 $b = 0;
		$con = dbConnectNow();
		
		if($con){
			$sql = "SELECT * FROM `employers`";
			$query = mysqli_query($con, $sql);
			if($query){
				while($result = mysqli_fetch_array($query)){
					if(strcmp($result['abbrev'], $clickedJob) == 0){
						$val = $result['id'];
						$name = $result['companyName'];
						
					}
					else{
						//echo "comparison failed";
					}					
				}
			}
			else{
				echo "nope query did not work";
			}
		}
		else{
			echo "not working";
		}
		
			$sql2 = "SELECT * FROM `internships` WHERE `employer_id`='$val'";
			$sql3 = "SELECT * FROM `internships` WHERE `employer_id`='$val'";
			$query2 = mysqli_query($con, $sql2);
			$query3 = mysqli_query($con, $sql3);
			//$result = mysqli_fetch_assoc($query2);
		if($query2){
				
						
			
			while($result5 = mysqli_fetch_array($query2)){
				if(strcmp($result5['company'], $name) == 0){
					$hasListing = "yes";
				}
				else{
					$hasListing = "no";
				}
			}
			if(strcmp($hasListing, "yes") == 0){
				while($result4 = mysqli_fetch_array($query3)){
				
							
		
					$date = dateFormat($result4['closing_date'], 1);
					echo "<div class='jobInfo' style='display: inline-block'><span style='font-weight: bold'>" . strToUpper($result4['company']) . "</span><br><br>";
					echo  "<strong>JOB TYPE: </strong><br>" . $result4['job_type'] . "<br><br>";
					echo  "<strong>JOB TITLE: </strong><br>". $result4['job_title'] . "<br><br>";
					if(strcmp($result4['job_or_intern'], Job) == 0){
						echo  "<strong>JOB opportunity</strong><br><br>";
					}
					else{
						echo  "<strong>INTERNSHIP opportunity</strong><br><br>";
					}
					echo  "<strong>PAID: </strong><br>" . $result4['paid_or_not'] . "<br></br>";
					echo  "<strong>JOB QUALIFICATIONS: </strong><br>" . $result4['qualifications'] . "<br><br>";
					if($result4['months'] == 1){
						echo "<strong>Internship Length: </strong><br>" . $result4['months'] . " month "  . $result4['weeks'] . " weeks  "  . $result4['days'] . "  days<br><br>";
					}
					else{
						echo "<strong>Internship Length: </strong><br>" . $result4['months'] . " months "  . $result4['weeks'] . " weeks  "  . $result4['days'] . "  days<br><br>";
					}
					echo  "<strong>Opportunity Closes: </strong><br>" . $date . "<br></br>";
					echo  "<strong>JOB LOCATION: </strong><br>" . $result4['zip'] . "<br>";
					echo "<a style='color: #000000' href=" . $result4['link'] . ">" . $result4['link'] . "</a></div>";
				
				
				
				
				
			
				
				}
				
			
			}
			else{
				echo "<h3 style='margin: auto'>This employer has not created a job or internship listing.</h3>";	
			}
		}
	}
		
?>





<?php





	//This function is used to create our indeed search engine.
	function createQuery($internship, $zip, $numOfJobs){
	
		/*foreach (getallheaders() as $name => $value) {
			if($name == User-Agent){
		    		echo "$name: $value\n";	
    			}
    		}*/
		$url = "http://api.indeed.com/ads/apisearch?publisher=5026351919726122&q=". $internship . "&l=" . $zip . "&sort=&radius=50&st=&jt=&start=&limit=" . $numOfJobs . "&fromage=&filter=&latlong=1&co=us&chnl=&userip=" . $_SERVER['REMOTE_ADDR'] . "&useragent=" . $_SERVER['HTTP_USER_AGENT'] . "&v=2";
		//echo $_SEVER['HTTP_USER_AGENT'];
		//echo $_SEVER['REMOTE_ADDR'];
		//$url = "http://api.indeed.com/ads/apisearch?publisher=5026351919726122&q=java&l=austin%2C+tx&sort=&radius=&st=&jt=&start=&limit=&fromage=&filter=&latlong=1&co=us&chnl=&userip=" . $_SEVER['REMOTE_ADDR'] . "&useragent=" . $_SEVER['HTTP_USER_AGENT'] . "&v=2";
		//$urlBeginning .= $internship . "&" . $zip;
		return $url;
	}
	




	function createQueryIndeed($internship, $zip){
	
		/*foreach (getallheaders() as $name => $value) {
			if($name == User-Agent){
		    		echo "$name: $value\n";	
    			}
    		}*/
    		
		$url = "http://api.indeed.com/ads/apisearch?publisher=5026351919726122&q=". $internship . "&l=" . $zip. "&sort=&radius=50&st=&jt=&start=&limit=40&fromage=&filter=&latlong=1&co=us&chnl=&userip=" . $_SERVER['REMOTE_ADDR'] . "&useragent=" . $_SERVER['HTTP_USER_AGENT'] . "&v=2";
		//echo $_SEVER['HTTP_USER_AGENT'];
		//echo $_SEVER['REMOTE_ADDR'];
		//$url = "http://api.indeed.com/ads/apisearch?publisher=5026351919726122&q=java&l=austin%2C+tx&sort=&radius=&st=&jt=&start=&limit=&fromage=&filter=&latlong=1&co=us&chnl=&userip=" . $_SEVER['REMOTE_ADDR'] . "&useragent=" . $_SEVER['HTTP_USER_AGENT'] . "&v=2";
		//$urlBeginning .= $internship . "&" . $zip;
		return $url;
	}	
?>

<?php
	function jobs($xml){
		//echo $xml;
		$xmlString = simplexml_load_string($xml) or die("Error: Cannot create object");
		echo $xmlString;
	}
?>

<?php
	function getLogoWH($width, $height){
		$logo = "<img src='/images/CWW.png' style='width: " . $width . "em; height: " . $height . "em; float: left' alt='cyberwatch west logo />";
		return $logo;
	}
	
	function getLogo(){
		$logo = "<img src='/images/CWW.png'  alt='cyberwatch west logo' />";
		return $logo;
	}
	
	
	
	
	//This function kills the session if the user has been idle for to long.
	function sessionTimeOut(){
		$ses = "yes";
		
			
			if(isset($_SESSION['userName'])){
				if(((time() - $_SESSION['last_time']) > 3000)){
					//$session_unset();
					echo "<script>alert('You are being logged out because of inactivity.'); </script>";
					echo "<script>window.location = '" . LOGOUT . "';</script>";
					//exit;
					$ses = "no";
				}
				else{
					$_SESSION['last_time'] = time();
					$ses = "no";
				}
				
			}
		
			else{
				
				if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == HOME){
					$ses = "no";	
				}
			 	if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == USERLOGIN){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == EMPSIGNUP){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == EMPLOGIN){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == VERIFIED){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == GOVERIFY){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == ACCESS){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == ACODE){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == ASIGNIN){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == UNAUTHMSG){
					$ses = "no";
				}
				else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SKRLOGIN){
				$ses =  "no";
				}
				else{
					$ses = "yes";
				}
			}
		
		
		if(strcmp($ses, "yes") == 0){
			//header("Location: index.php"); 
			echo "<script> window.location = '". LOGOUT . "';</script>";
		}
		
		
		
	}
	
	
	//This function kills the session if the user has been idle for to long. also lets certain pages be seen.
	function sessionTimeOutUser(){
		$ses = "yes";
		
		if(isset($_SESSION['cwwusername'])){
			if(((time() - $_SESSION['user_time']) > 3000)){
				//$session_unset();
				echo "<script>alert('You are being logged out because of inactivity.'); </script>";
					echo "<script>window.location.assign = '" . LOGOUT . "';</script>";
					$ses = "no";
				//exit;
			}
			else{
				$_SESSION['user_time'] = time();
				//sessionTimeOutUser();
				$ses =  "no";
				
			}
			
		}
		else{
			if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == HOME){
				$ses =  "no";	
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == USERLOGIN){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == EMPSIGNUP){
				$ses = false;
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == EMPLOGIN){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == VERIFIED){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == GOVERIFY){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == ACCESS){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == ACODE){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == ASIGNIN){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == UNAUTHMSG){
				$ses =  "no";
			}
			else if((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SKRLOGIN){
				$ses =  "no";
			}
			else{
				
			}
		}
		if(strcmp($ses, "yes") == 0){
			
			//echo "<script type='text/javascript'>document.location.href='" . $URL . "'</script>";
				//echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				
				echo "<script> window.location = '". LOGOUT . "';</script>";
				
				
		}
		
	
}
	//This function sets a time length on how long the resume stays in the database.
	function sessionTimeResume(){
		if(isset($_SESSION['cwwusername'])){
			if(((time() - $_SESSION['resume_time']) > 7884000000)){
				$con = dbConnectNow();
				$sql;
			}
			else{
				$_SESSION['resume_time'] = time();
			}
		}
		
	}
	
//This function is used to let job seekers create a job preference so that they can see employers who have jobs in the field and with the title that they are looking for.
function jobPref($job, $zip){
		$con = dbConnectNow();
		$userid = $_SESSION['cwwid'];
		$sql = "CREATE TABLE if not exists `job_pref`(
			id int AUTO_INCREMENT PRIMARY KEY,
			job_type varchar(50),
			zip varchar(5),
			user_id int)";
			
		 $query = mysqli_query($con, $sql);
		if($query){
			$sqlCheck = "SELECT * FROM `job_pref`";
			$queryCheck = mysqli_query($con, $sqlCheck);
			$check = false;
			$checkId = false;
			$newCount = 0;
			while($result = mysqli_fetch_array($queryCheck)){
				if($result['job_type'] == $job[$newCount] && $result['zip'] == $zip){
					$check = true;
					
					if($check){
						if($result['user_id'] == $userid){
							$checkId == true;
						}
						else{
							$check = false;
						}
					}
					$newCount++;
					
				}
				
			}
			
			if($check){
				echo "<script> alert('That preference has already been set for you. You are more than welcome to add more job preferences, but there cannot be duplicate preferences') </script>";
			}
			else if($checkId){
				echo "<script> alert('That preference has already been set for you. You are more than welcome to add more job preferences, but there cannot be duplicate preferences') </script>";
			}
			else{
				foreach ($job as $selectedOption){

				$sql2 = "INSERT INTO `job_pref`(`job_type`, `zip`, `user_id`) VALUES('$selectedOption', '$zip', '$userid')";
				
				$query2 = mysqli_query($con, $sql2);
				}
				//header("location: http://cwwinternship.cyberwatchwest.org/internship/home.php?id=" . $_SESSION['cwwid']);
				$URL= SKRHOME . "?id=" . $_SESSION['cwwid'];
				echo "<script type='text/javascript'>document.location.href='" . $URL . "'</script>";
				echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
				
			}
					
		}
		
			
			
		
		
	}
	
	
	//Match employers with potential candidates and display those employers on the home page of the user.  The user will only see employers that match their job preferences.  If the user has not picked a job preference then there will be
	//no employers to match to.
	function applicantMatch(){
		$conIntern = dbConnectNow();
		$count = 0;
		$counts = 0;				
		$job= "";
		$zip = "";
		$name = "";
		$compName = "";
		$sesId = $_SESSION['cwwid'];
		$sqlPref = "SELECT * FROM `job_pref` WHERE `user_id`='$sesId'";
		$queryPref = mysqli_query($conIntern, $sqlPref);
		$sqlemployers = "SELECT * FROM `employers`";
		$queryEmployers = mysqli_query($conIntern, $sqlemployers);
		
		if($queryPref){
			
			while($result = mysqli_fetch_array($queryPref)){
				/*echo "<div class='jobInfos'>" . $result['job_type'] . "</div>";*/
				//if($_SESSION['cwwid'] == $result['user_id']){
					$job = $result['job_type'];
					$zip = $result['zip'];
					
					
				//}
				
				
				$sqlIntern = "SELECT * FROM `internships` ORDER BY `created_at` DESC";
				$queryIntern = mysqli_query($conIntern, $sqlIntern);
				if($queryIntern){
					
					while($myResults = mysqli_fetch_array($queryIntern)){
						$close = date('F d, Y', strtotime($myResults['closing_date']));
						if($close > $myResults['created_at']){
							
							if(strcmp($myResults['job_type'], $job) == 0){
								
								if($myResults['zip'] == $zip){
									
									
								//internshipCheck($myResults['employer_id'], $myResults['y_day']);
									$daysLeft = internshipCheck($myResults['employer_id'], $myResults['y_day'], $myResults['job_title']);
									//$internTimeLeft = $today - $myResults['y_day'];
									//$actualTime = RSLENGTH - $interTimeLeft;
									?>
									<?php		
									//echo "<div class='' style='display: inline-block; margin: 1.5em 4em 1.5em 1em'>&nbsp;";
									echo "<div class='' style='margin-top: 2%; border-radius: 10px; padding: 2%; color: #ffffff; border-bottom: 8px solid #000000; background-color: #192535'>Posted on  <span 
									style='color: #ff0'> " . $myResults['created_at'] . "  </span> By<span style='color: #febf00'><strong>  " . strToUpper($myResults['company']) . "</strong></span><br><br>";
									echo  "<strong>JOB TYPE: </strong><div style='display: inline-block'> " . $myResults['job_type'] . "</div><br><br>";
									echo  "<strong>JOB TITLE: </strong>". $myResults['job_title'] . "<br><br>";
									if(strcmp($myResults['job_or_intern'], Job) == 0){
										echo  "<span style='color: #febf00'><strong>Job opportunity</strong></span><br><br>";
									}
									else{
										echo  "<span style='color: #febf00'><strong>Internship opportunity</strong></span><br><br>";
									}
									echo  "<strong>PAID: </strong>" . $myResults['paid_or_not'] . "<br><br>";
									echo  "<strong>JOB DESCRIPTION: </strong><br></br><span style='float: '>" . $myResults['description'] . "</span><br></br><br></br>";
									echo  "<strong>JOB QUALIFICATIONS: </strong><br></br><span style='float: '>" . $myResults['qualifications'] . "</span><br><br>";
									echo "<strong>INTERNSHIP LENGTH: </strong>";
									if($myResults['months'] == 1){
									echo $myResults['months'] . " Month ";
									}
									elseif($myResults['months'] > 1){
										echo $myResults['months'] . " Months ";
									}
									else{
									
									}
									if($myResults['weeks'] == 1){
									echo  $myResults['weeks'] . " Week ";
									}
									elseif($myResults['weeks'] > 1){
										echo $myResults['weeks'] . " Weeks ";
									}
									else{
									
									}
									if($myResults['days'] == 1){
									echo $myResults['days'] . " Day ";
									}
									elseif($myResults['days'] > 1){
										echo $myResults['days'] . " Days ";
									}
									else{
									
									}
									echo "<br><br>";
									echo  "<strong>JOB LOCATION: </strong>" . $myResults['zip'] . "<br><br>";
									echo "<a style='color: #febf00' href=" . $myResults['link'] . ">Apply Now<br>" . $myResults['link'] . "</a><br></br>";
									
									echo "<strong>Opportunity Closes:  " . $daysLeft . "</strong></div></div></div>";
									?>
									
									<?php
									$description[$count] =  $myResults['description'];
									$count++;
								}
								else{
									
								}
							}
						}
						
						
					}
				}
			
			}
		
		}
		//return $description;
	}
	//format 1 is month day year, format 2 is day of the week month day year
	function dateFormat($date, $format){
		switch($format){
			case 1:
				$newDate = date('F d, Y', strtotime($date));
				return $newDate;
				break;
			case 2:
				 $newDate = date('l F d, Y', strtotime($date));
				 return $newDate;
				 break;
			default:
				return $date;
				break;
		}
		
	}
	
	function internshipCheck($userId, $y_day, $jobTitle){
	$internEndLength = $y_day + RESLENGTH;
	$daysAfterNewYear;
	$date = getdate();
	$today_yday = $date['yday'];
	
	if($internEndLength > 365){
		$daysAfterNewYear =  $internEndLength - 365;
		$timeLeftInYear = 365 - $y_day;
	}
	$con = dbConnectNow();
	$sql = "SELECT * FROM `internships` WHERE `employer_id`='$userId'";
	$query = mysqli_query($con, $sql);
	if($query){
		$today = date("Y-m-d");
		
		
		while($results = mysqli_fetch_array($query)){
			 $orderdate = explode('-',$results['closing_date']);
			 $close = date('l F d, Y', strtotime($results['closing_date']));
			
			 $todayOrder = explode('-',$today);
			 $ty = $todayOrder[0];
			  $tm = $todayOrder[1];
			   $td = $todayOrder[2];
        		$year = $orderdate[0];
        		$month = $orderdate[1];
        		$date = $orderdate[2];
        		
			if($results['closing_date'] < $today){
				$id = $results['user_id'];
				$sql2 = "DELETE FROM `internships` WHERE `employer_id`='$userId' AND `job_type`='$jobTitle'";
				$query2 = mysqli_query($con, $sql2);
				if($query2){
					echo "<script> alert(" . $results['closing_date'] . " " . $today . "' That Internship has expired') </script>";
				}
				
			}
			elseif($daysAfterNewYear > 0){
			
				
				$daysLeft = $daysAfterNewYear + (365 - $today_yday);
				return $close;
				//return $daysLeft . " until this Internship opportunity closes!";
			}
			else{
				$daysLeft = 365 - $y_day;
				//return $daysLeft . " until this Internship opportunity closes!";
				return $close;
			}
		}
	}
}


function internDaysCheck($employerId){
	$con = dbConnectNow();
	$sql = "SELECT * FROM `internships` WHERE `employer_id`='$employerId'";
	$query = mysqli_query($con, $sql);
	if($query){
		$date = getdate();
		$today_yday = $date['yday'];
		
		
		while($results = mysqli_fetch_array($query)){			
			$daysLeft;
			$yDay = $results['y_day'];
			$resLength = RESLENGTH + $yday;
			if($yday > 275){
				$daysLeftInYear = 365 - $yDay;
				$daysAfterNewYear = RESLENGTH - $daysLeftInYear;
				
					$daysLeft = $daysAfterNewYear - $today_yday;
				
			}
			$sqls = "SELECT `Email` FROM `admin`";
			$querys = mysqli_query($con, $sqls);
			if($daysLeft == 5){
				$nResults = mysqli_fetch_array($querys);
				$mail = mail($_SESSION['email'], "Your CWW listing is expiring soon!", "Please give " .$username . " " . $email . " an access code " . ACCESS, "From: " . $nResults['Email']);
			}
			
		}
	}
}
	/*
	We are matchin
	*/
	function employerMatch($sesId){
		$conIntern = dbConnectNow();
		$userName = "";
		$email = "";
		$myCount = 0;
		$count = 0;
		$jobCount = 0;
		$jobPrefCount = 0;
		$zipCount = 0;
		$titleCount = 0;
		$empIdCount = 0;
		$newCount = 0;
		$internship = array();
		$jobPref = array();
		$title = array();
		$empId = array();
		$uId = array();
		$hasJobs = false;
		$interEmpId = "";
		$sql = "SELECT `company`, `job_type`, `job_title`, `employer_id`, `description`, `zip` FROM `internships` WHERE `employer_id`='$sesId'";
		$query = mysqli_query($conIntern, $sql);
		if($query){
			while($results = mysqli_fetch_array($query)){
				
				$empId[$newCount] = $results['employer_id'];
					$internship[$jobCount] = array("jobType"=>$results['job_type'], "jobTitle"=>$results['job_title'], "jobZiP"=>$results['zip'], "empId"=>$results['employer_id'], "descrip"=>$results['description']);					
					$jobCount++;
					
			}
		}
		return $internship;
	}
	function jobPrefMatch($sesId){
		$conIntern = dbConnectNow();
		$userName = "";
		$email = "";
		$myCount = 0;
		$count = 0;
		$jobCount = 0;
		$jobPrefCount = 0;
		$zipCount = 0;
		$titleCount = 0;
		$empIdCount = 0;
		$newCount = 0;
		$internship = array();
		$jobPref = array();
		$title = array();
		$empId = array();
		$uId = array();
		$hasJobs = false;
		$interEmpId = "";
		$myName = "";
		$sql2 = "SELECT * FROM `job_pref`";
		$query2 = mysqli_query($conIntern, $sql2);
		if($query2){
			while($jpResults = mysqli_fetch_array($query2)){
				$jobPref[$jobPrefCount] = array("jobType"=>$jpResults['job_type'], "jobId"=>$jpResults['id'], "jobZiP"=>$jpResults['zip'], "userId"=>$jpResults['user_id']);				
				$idOfUser = $jobPref[$jobPrefCount]["userId"];
				$sqlCwws = "SELECT * FROM `cwwn_users` WHERE `id`='$idOfUser'";
		
			$cons = dbConnectToCww();
			$queryCwws = mysqli_query($cons, $sqlCwws);
			$idCount = 0;
			if($queryCwws){
				$newResults = mysqli_fetch_array($queryCwws);
				
				$myName = $newResults['name'];
				$idCount++;	
			}
			else{
				return "not working";
			}
			//array_push($jobPref[$jobPrefCount]['name'], $myName);
			$jobPref[$jobPrefCount]['name'] = $myName;
			$jobPrefCount++;
			}
		}
		
		
		
		$arrayLength = count($internship);
		$arrayLengthJobPref = count($jobPref);
		$countArray = 0;
		return $jobPref;
		
		//Goes through the internship array
		/*for($x = 0; $x < $arrayLength; $x++){
		
			//Goes through the job pref array
			for($y = 0; $y < $arrayLengthJobPref; $y++){
		
				//checks to see if the job types match up and if they do then check
				//to see if the zip codes match. If they do make those the parameters
				//for a seesion variable which will hold  the job pref id number
				if($internship[$x]["jobType"] == $jobPref[$y]["jobType"]){
					if($internship[$x]["zip"] == $jobPref[$y]["zip"]){
						$internJobType = $internship[$x]["jobType"];
						$internEmpId = $internship[$x]['emppId'];
						$userJobPId = $jobPref[$y]["userId"];
						$_SESSION[$internJobType ][$userJobPId ] = $jobPref[$y]["jobId"];
						/*
						This is go to use the arrays to place the applicants on home page.  There will be buttons to check to see if they choose an applicant.
						If they choose an applicant the applicant will be placed into the database and placed on the applicants page.
						
						//createApplicants($_SESSION[$internJobType ][$userJobPId ], $internEmpId, $userName[$y], $y);					
						
		     			}
		     		}
		     	}
		 }*/
		 
						
															
						
		
		
}
/*
Creates the applicants table in the database
*/
function createApplicants(){
	$con = dbConnectNow();
	$result = array();
	$cnt = 0;
	$count = 0;
	$user = "";
	$job = "";
	$id = "";
	
	$sqlCreate = "CREATE TABLE if not exists `applicants`(
					id int AUTO_INCREMENT PRIMARY KEY,
					Name varchar(30),
					user_id int,
					employer_id int,
					job_type varchar(80),
					job_pref_id int,
					zip text,
					relocate text,					
					Email varchar(255))";
	mysqli_query($con, $sqlCreate);
	
	
	
}

//this function retrieves the correct applicant by comparing its user id to the job title.
function getApplicant($name, $email, $id, $empId, $jobTitle){
	$con = dbConnectNow();
	
		$sesJobPrefId = $_SESSION[$jobTitle][$id];
		$sqlSelect = "SELECT * FROM `applicants`";
		$querySelect = mysqli_query($con, $sqlSelect);
		if($querySelect){
				while($results = mysqli_fetch_array($querySelect)){
					if($jobTitle == $results['job_title'] && $id == $results['user_id']){
						if($sesJobPrefId){
							$_SESSION['appId'] = $results['id'];
							echo "<div class='jobInfos'><script type='text/javascript'>alert('this applicant is already in your applicants');</script></div>";
						}
					}					
				}
				if(!$_SESSION['appId']){
						if($sesJobPrefId){
						$sqlInsert = "INSERT INTO `applicants`(`Name`, `user_id`, `employer_id`, `job_title`, `job_pref_id`, `Email`) VALUES('$name', '$id', '$empId', '$jobTitle', '$sesJobPrefId', '$email')";
						$queryInsert = mysqli_query($con, $sqlInsert);
							if($queryInsert){
								$sql= "SELECT * FROM `applicants`";
								$query = mysqli_query($con, $sqlSelect);
								while($result = mysqli_fetch_array($query)){						
									$_SESSION['appId'][$cnt] == $result['id'];
									$cnt++;
								}			
							}
						}
					}	
		}
	
		
		
}
	
	//This function is to match applicants with employers and display them unto the screen
	/*function employersMatch($sesId){
		$conIntern = dbConnectNow();
		$myCount = 0;
		$count = 0;
		$newCount = 0;
		$job= "";
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
								$sqlCwws = "SELECT * FROM `cwwn_users` WHERE `id`='$userIdCount'";
								$userId = $jpResults['user_id'];
								$jobId = $jpResults['id'];
								$con = dbConnectToCww();
								$queryCwws = mysqli_query($con, $sqlCwws);
								
									while($newResults = mysqli_fetch_array($queryCwws)){
										//if($uId[$count] == $newResults['id']){	
											$userName = $newResults['name'];
											$email = $newResults['email'];									
											$_SESSION['resId'][$newCount] = $uId[$count];
											$_SESSION['resId'] = $newResults['id'];
											$userNameCnt++;
										//}
										
											
									}
								
											//echo "<div style='display: inline-block; margin: 1.5em 4em 1.5em 1em'>&nbsp;";
											echo "<div class='' style='border-bottom: 8px solid #000000; box-shadow: 3px 3px 5px grey; float: left margin-bottom: .8em; margin-top: 1.8em'>" . $userName . "<br>";
											echo "<strong>" . strToUpper($title) . "(job title)</strong><br>";
											echo $job . "(job type)<br> " . $zip ."<br>";
											echo $results['description'] . "<br><br>";
		
											echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>													
													<input id='choose" . $newCount. "' onclick='getApplicant(this)' class='submit' type='submit' name='" . $userName. "' value='" . $userName . "' /> <br><br>													
												</form>";
											echo "<form action='" . htmlspecialchars($_SERVER['PHP_SELF']) . "' method='post'>																										
													<input id='remove" . $newCount. "' onclick='deleteApplicant(this)'class='submit' type='submit' name='" . $jobId. "' value='Remove Applicant " . $userName . "' /> <br><br>
												</form>";
											//adds selected applicant to the applicant page.
											
															
											echo "<a  style='color: #000000' href='view.php?id=" . $_SESSION['resId'] . "'>View Resume</a><br>";											
											echo "<a  style='color: #000000' href='mailto:" . $email . "'>" . $email . "</a></div>";
											
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
					else{
						echo "<div class='jobInfos'> There are no candidates looking for " . $title . " jobs</div>";
					}							
					
					
					
					
				}
				
			}
			/*if(isset($_POST[$userName])){
												//if($myCount < 1){
													$con = dbConnectNow();	
													$name = mysqli_real_escape_string($con, $userName);		
													$email = mysqli_real_escape_string($con, $emai);										
													$id = mysqli_real_escape_string($con, $_SESSION['resId']);
													$empId = mysqli_real_escape_string($con, $empId);																														
													$title = mysqli_real_escape_string($con, $job);	
													getApplicant($name, $email, $id, $empId, $title);
													echo "<script type='text/javascript'>alert('You have added " . $userName . " to your applicants.  Please click the applicants tab to view you applicants');</script>";
													$myCount++;
												//}												
											}
											//Deletes applicants from the employers applicant list
											if(isset($_POST[$jobId])){
												//if($myCount < 1){
													$sql = "DELETE FROM `applicants` WHERE `user_id`='$userId'";
													$query = mysqli_query(dbConnectNow(), $sql);
													if($query){
														echo "<script type='text/javascript'>alert('Applicant " . $userName . " has been removed from your applicants');</script>";
														echo "<script type='text/javascript'>document.location.href='" . $SESSION['home'] . "'</script>";
													}
													else{
														echo "<script type='text/javascript'>alert('Query didnt work');</script>";
													}
													$myCount++;
												//}
											}
		}		
			
	}*/
	


	function sessionCheck(){
		$sess = true;
		$admin = checkForAdmin();
		if(!admin){
			//$URL="http://cwwinternship.cyberwatchwest.org/internship/index.php";
			//echo "<script type='text/javascript'>document.location.href='" . $URL . "'</script>";
			//header("location: $URL");
			$sess = false;	
		}
		if($sess){
			$URL="http://cwwinternship.cyberwatchwest.org/internship/index.php";
			//echo "<script type='text/javascript'>document.location.href='" . $URL . "'</script>";
			header("location: " . HOME);
		}
	}

	
	
	
	function getEverthingAfterEqualSignInUrl(){
		$count = 0;
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	
		$employerJobs = substr($actual_link, 0);
	
	
		while((strcmp($employerJobs[$count], "="))){
			$count++;
		}
		$clickedResume = substr($actual_link, $count + 1);
		return $clickedResume;
	}
	
	
	function getEverythingAfterEqualSignInUrl($sign){
		$count = 0;
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	
		$employerJobs = substr($actual_link, 0);
	
	
		while((strcmp($employerJobs[$count], "$sign"))){
			$count++;
		}
		$clickedResume = substr($actual_link, $count + 1);
		return $clickedResume;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
//takes a doc and docx document and puts it in a browser friendly format.
  class DocxConversion{
    public $filename;

    public function __construct($filePath) {
        $this->filename = $filePath;
    }

    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

    private function read_docx(){
        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip))
        	 return false;
		$count = 0;
        while ($zip_entry = zip_read($zip)) {
	
            if (zip_entry_open($zip, $zip_entry) == FALSE) 
            	continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") 
            	continue;

            $content = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
		//echo zip_entry_name($zip_entry);
		$contents['words'][$count] = $content;
		$count++;
		//echo "<div class='jobInfos'>" . zip_entry_name($zip_entry) . "</div>";
            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);
        $xml = new DOMDocument();
         $xml->loadXML($content, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
        
	$xmldata = $xml->saveXML();
	$xmldata = str_replace( "\r\n", "</w:t>", $xmldata);
	//echo strip_tags($xmldata);
	//echo "<br><br><br><br>";
	//echo $content;

       // $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
       // $content = str_replace('</w:r></w:p>', "\r\n", $content);
       // $striped_content = strip_tags($content);

       // return $striped_content;
       
       return $xmldata;
    }
   }
   

   

  function displayDocx($file){
  	$zip = zip_open($file);
  	/*echo "<div class='jobInfos'>" . $zip . "</div><br>";
  	echo "<div class='jobInfos'>" . $file . "</div>";  
  	$file = base64_encode($file);
  	echo "<div class='jobInfos'>" . $file . "</div>";
  	$file = base64_decode($file);
  	echo "<div class='jobInfos'>" . $file . "</div>";*/
  	$zip = zip_open($file);
//  	echo "<div class='jobInfos'>" . $zip . "</div><br>";
  	$count = 0;
  	global $zipRead;
  	if(is_resource($zip)){
  	//echo $file;
  	//echo $zip . "<br>";
  	while($zipRead = zip_read($zip)){
  		if($count == 3){
  			//break;
  			//echo $zip . "<br>";
  			//echo $zipRead . "<br>";
  		 	//echo zip_entry_name($zipRead);
  			//echo $count . "<br>";
  			break;
  		}
  		else{
  			//echo "<div class='jobInfos'>" . zip_entry_name($zipRead) . "</div>";
  			//echo "<div class='jobInfos'>" . $zip . "</div>";
  			//echo "<div class='jobInfos'>" . $zipRead . "</div>";
  		}
  		
  		$count++;
  		//zip_entry_close();
  		
  	}
  	if(zip_entry_open($zip, $zipRead)){
  		$contents = zip_entry_read($zipRead);
  		//$resume = array(zip_entry_read($zipRead), $contents);
  		//echo "<div class='jobInfos'>" . zip_entry_name($zipRead) . "</div>";
  		$content .= zip_entry_read($zipRead, zip_entry_filesize($zipRead));
  		// $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
       		// $content = str_replace('</w:r></w:p>', "\r\n", $content);
       		 $striped_content = strip_tags($content);

        	return $content;
		//echo  $contents;
  		//echo  zip_entry_read($zipRead);
  		//echo "<div class='jobInfos'>" . $zipRead . "</div>";
  		//echo "<div class='jobInfos'>" . $count . "</div>";
  		//echo "<div class='jobInfos'><a href='https://google.com'> click here" . zip_entry_read($zipRead) . "</a></div>";
  		//$xml = simplexml_load_file(zip_entry_name($zipRead));
  		//echo $xml->body;
  		//return $resume;
  		
  	}
  	else{
  		echo "<div class='jobInfos'>" . zipFileErrMsg($zip) . "</div>";
  		echo "<div class='jobInfos'>" . zip_entry_name($zipRead) . "</div>";
  		echo "<div class='jobInfos'>" . $count . "</div>";
  	}
  	$content = zip_entry_read($zipRead);
  	$xml = simplexml_load_file(zip_entry_name($zipRead));
  	echo $xml->body;
  	//echo "<div class='jobInfos'>" . $content . "</div>";
  	//echo "<div class='jobInfos'> wcc" . zip_entry_read($zipRead) . "</div>";
  	
	}
	else{
  		echo "<div class='jobInfos'>" . zipFileErrMsg($zip) . "  this is the error message</div>";
	
	}
	zip_close();
  	
  }
   
  
  
                      
   
  //This fucntions spits out actual error message for zip files and not just the error number.
 function zipFileErrMsg($errno) {
  // using constant name as a string to make this function PHP4 compatible
  $zipFileFunctionsErrors = array(
    'ZIPARCHIVE::ER_MULTIDISK' => 'Multi-disk zip archives not supported.',
    'ZIPARCHIVE::ER_RENAME' => 'Renaming temporary file failed.',
    'ZIPARCHIVE::ER_CLOSE' => 'Closing zip archive failed', 
    'ZIPARCHIVE::ER_SEEK' => 'Seek error',
    'ZIPARCHIVE::ER_READ' => 'Read error',
    'ZIPARCHIVE::ER_WRITE' => 'Write error',
    'ZIPARCHIVE::ER_CRC' => 'CRC error',
    'ZIPARCHIVE::ER_ZIPCLOSED' => 'Containing zip archive was closed',
    'ZIPARCHIVE::ER_NOENT' => 'No such file.',
    'ZIPARCHIVE::ER_EXISTS' => 'File already exists',
    'ZIPARCHIVE::ER_OPEN' => 'Can\'t open file', 
    'ZIPARCHIVE::ER_TMPOPEN' => 'Failure to create temporary file.', 
    'ZIPARCHIVE::ER_ZLIB' => 'Zlib error',
    'ZIPARCHIVE::ER_MEMORY' => 'Memory allocation failure', 
    'ZIPARCHIVE::ER_CHANGED' => 'Entry has been changed',
    'ZIPARCHIVE::ER_COMPNOTSUPP' => 'Compression method not supported.', 
    'ZIPARCHIVE::ER_EOF' => 'Premature EOF',
    'ZIPARCHIVE::ER_INVAL' => 'Invalid argument',
    'ZIPARCHIVE::ER_NOZIP' => 'Not a zip archive',
    'ZIPARCHIVE::ER_INTERNAL' => 'Internal error',
    'ZIPARCHIVE::ER_INCONS' => 'Zip archive inconsistent', 
    'ZIPARCHIVE::ER_REMOVE' => 'Can\'t remove file',
    'ZIPARCHIVE::ER_DELETED' => 'Entry has been deleted',
  );
  $errmsg = 'unknown';
  foreach ($zipFileFunctionsErrors as $constName => $errorMessage) {
    if (defined($constName) and constant($constName) === $errno) {
      return 'Zip File Function error: '.$errorMessage;
    }
  }
  return 'Zip File Function error: unknown';
}
 
   
   
   //FUNCTION :: read a docx file and return the string






//checks to see how long the resume has been in the database.
function resumeCheck($userId){
	$con = dbConnectNow();
	$sql = "SELECT * FROM `upload` WHERE `id`='$userId'";
	$query = mysqli_query($con, $sql);
	if($query){
		$today = getDate();
		while($results = mysqli_fetch_array($query)){
			if(($results['y_day'] + RESLENGTH) > $today['yday']){
				$id = $results['user_id'];
				$sql2 = "DELETE FROM `upload` WHERE `user_id`='$id'";
				$query2 = mysqli_query($con, $sql2);
				if($query2){
					echo "<script> alert('That resume has expired') </script>";
				}
			}
			else{
				return $today['yday'];
			}
		}
	}
}






//This function it to verify employers.  Once they have been verified we call this function to give them access to the site.
function verify($to, $from, $id){
		$Company = "";
		$Username =  "";
		$Email =  "";
		$Address =  "";
		$Password =  "";
		$Image =  "";
		$companyName =  "";
		$memberGroup =  "";
		
		$sqlUpdate = "UPDATE `temp_employers` SET `member_group`='8' WHERE `id`='$id'";
		$con = dbConnectNow();
		//echo "<div class='jobInfos'>" . $id . $to . $from . "</div><br>";
		$queryUpdate = mysqli_query($con, $sqlUpdate);
		if($queryUpdate){
			$sql2 = "SELECT * FROM `temp_employers`";
			$query2 = mysqli_query($con, $sql2);							
			if($query2){
				while($results2 = mysqli_fetch_array($query2)){
					if($results2['id'] == $id){						
						$Email = $results2['Email'];																							
					}
				
				}
				mysqli_close($con);
				
				$conn = dbConnectNow();				
				$queryInsert = mysqli_query($conn, "INSERT INTO `employers`(`id`, `Username`, `Email`, `Address`, `Password`, `Image`, `companyName`, `abbrev`, `city`, `state`, `zip`, `member_group`) SELECT * FROM `temp_employers` WHERE `id`='$id'");
				if($queryInsert){
					$sqlDelete = "DELETE FROM `temp_employers` WHERE `id`='$id'";
					$deleteQuery = mysqli_query($conn, $sqlDelete);
				
					if($deleteQuery){
						
						$header = "From: ". $from;
						$subject = "Your account for the CyberWatch West Internship Application has been verified.";
						$url = HOME;
						$message = "You have been verified as an employer." . "\n" . "Please follow this link to login and start creating job listings " . EMPLOGIN;
						$mail = mail($to, $subject, $message, $header);
						
							
						if($mail){
							header("location: " . $url);
						}
						else{
							header("loaction: ". $url);
						}
					}
					else{
						echo "Delete query isn't working";
					}
				}
				else{
					echo "Insert query isn't working" . mysqli_error($queryInsert);
				}
				
				
			}
			else{
				echo "query2 did not work";
			}
			
		}
		else{
			echo "verify is not working";
		}
}



//shows all employers who have not been verified
function showTempEmployers($con){
	$sql = "SELECT * FROM `temp_employers`";
	$query = mysqli_query($con, $sql);
	echo "<div style='margin: auto; width: 90%; flex-direction: column'>";
	if($query){
		while($results = mysqli_fetch_array($query)){
			echo "<div class='jobInfos'>" . $results['companyName'] . "</div>";
		}
	}
	echo "</div>";
}




function getAdEmail(){
	$sql = "SELECT * FROM `admin`";
	$con = dbConnectNow();
	$query = mysqli_query($con, $sql);
	$email = "";
	$cnt = 0;
	while($results = mysqli_fetch_array($query)){
		$email = $results['Email'];
	}
	return $email;
}



/*
With this function we are attempting to select the correct applicant to put into the database of applicants.  
The intention is to check to see if anyone is in the database and if they are does there job title match
the job title of the job that was selected/brought in as a parameter. Also the id of the user has the to match the id brought in throught paramerters. 
The last check is to see if the session job id matches.
*/

	


function displayApplicants($jobTitle){
	$con = dbConnectNow();
	$sql = "SELECT * FROM `applicants` WHERE `job_type`='$jobTitle'";
	$query = mysqli_query($con , $sql);
	$count = 0;
	$applicantArray = array(array());
	//$userId = getDbArray("cwwn_users", dbConnectToCww());
	if($query){
		while($results = mysqli_fetch_array($query)){
			$applicantArray[$count] = array("name"=>$results['Name'], "email"=>$results['Email'], "jobType"=>$results['job_type'], "userId"=>$results['user_id'], "zip"=>$results['zip'], "relocate"=>$results['relocate']);
			$count++;
		}
		return $applicantArray;	
	}
	return "";
}


   
function checkForAdmin(){
		$con = dbConnectNow();
		$sql = "SELECT * FROM `admin`";
		$query = mysqli_query($con, $sql);
		if($query){
			
			return $admin = true;
		}
		else{
			return $admin = false;
		}
}
   
 
 


function getDbArray($tblName, $con){
	$sql = "SELECT * FROM `" . $tblName . "`";
	
		$query = mysqli_query($con, $sql);
		if($query){
			return $results = mysqli_fetch_array($query);
		}
		else{
			return "";
		}
	
}
   
   
   
   
function applicantCheck(){
	$inDb = false;
	$sql = "SELECT * FROM `applicants`";
	$query = mysqli_query(dbConnectNow(), $sql);
	if($query){
		while($results = mysqli_fetch_array($query)){
			if($results['job_type'] == $_SESSION['job']){
				if($results['Name'] == $_SESSION['username']){
					$inDb = true;
				}
						
			}
			
			
		}
	}
	return $inDb;
	
}   
   
function zipMatch($id){
	$stmnt = grabZip($id);
	$myZips = array();
	$count = 0;
	while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
		$myZips[$count] = $result['zip'];
		$count++;
	}
	return $myZips;
} 
function zipMatchEmp($id){
	$stmnt = grabZipEmp($id);
	$myZips = array();
	$count = 0;
	while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
		$myZips[$count] = $result['zip'];
		$count++;
	}
	return $myZips;
} 
   






?>








<script type="text/javascript">

</script>
<script type="text/javascript">
	function descrip(des){
		
		if(confirm("Are you sure you want to leave this page?")){
			window.location = "https://www.cyberwatchwest.org";
		}
		else{
			alert("You will not be redirected")
		}
	}
</script>
