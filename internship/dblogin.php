<?php
	
	global $hostname;
	global $dbuser;
	global $dbname;
	global $dbpass;
	global $redirect;
	global $con;
	define("CWWHOST", "181.224.141.112");
	define("CWWDBUSER", "cyberwat_cwws");
	define("CWWDBNAME", "cyberwat_cwws");
	define("CWWDBPASS", "yXw,eVp+4k9O");
	define("REDIRECT", "employers.php");
	define("HOST", "181.224.141.112");
	define("DBUSER", "cyberwat_keith");
	define("DBNAME", "cyberwat_intern");
	define("DBPASS", "tahlia01");
	$host = "181.224.141.112";
	
	
		

	function dbConnect(){
		
		 /*$newArray = array($hostname => $_POST['hostName'],
		 $dbuser => $_POST['dbUser'],
		 $dbname => $_POST['dbName'],
		 $dbpass => $_POST['dbPass'],
		 $redirect => $_POST['redirect'],
		 $con => mysqli_connect($hostname, $dbuser, $dbpass));*/
		 $con = mysqli_connect(HOST, DBUSER, DBPASS);
		 return $con;
		/*if(isset($_POST['submit'])){
			return $newArray;
		}*/
	}
	
	
	
	
	function dbConnectNow(){
		$con = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME) or die('done_deal');
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $con;
	}
	
	function dbConnectToCww(){
		$con = mysqli_connect(CWWHOST, CWWDBUSER, CWWDBPASS, CWWDBNAME);
		return $con;
	}
	
	function getInternship(){
		$conn = dbConnectNow();
		$sql = "SELECT * FROM `employers`";
		$query = mysqli_query($conn, $sql);
		$count = 0;
		while($result = mysqli_fetch_array($query)){
			
			 $compName[$count] = $result['Company'];
			 $count++;
		}
		return $compName;
	}
	
	function accessTempInsertPrepare($accessCode){
		$con = dbConnectNow();
		$tempAccess = $con->prepare("INSERT INTO temp_access(access) VALUES(?)");
		$tempAccess->bind_param('i', $access);
		$access = $accessCode;
		$tempAccess->execute();
	}
	
	function doesJobPrefExist($sessionId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		$stmnt = $conn->prepare("SELECT job_type, user_id FROM job_pref");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt->execute();
		
		$tr = false;
		while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
			if($result['user_id'] == $sessionId){
				$tr = true;
			}
			
			
			
		}
		return $tr;
		
	}
	function doesIntrnshpExist($sessionId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		$stmnt = $conn->prepare("SELECT job_type, employer_id FROM internships");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt->execute();
		
		$tr = false;
		while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
			if($result['employer_id'] == $sessionId){
				$tr = true;
			}
			
			
			
		}
		return $tr;
		
	}
	function doesResumeExist($sessionId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		$stmnt = $conn->prepare("SELECT * FROM resumes WHERE user_id='$sessionId'");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt->execute();
		$stmnt2 = $conn->prepare("SELECT * FROM temp_resumes WHERE user_id='$sessionId'");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt2->execute();
		$tr = "no";
		while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
			if($result['user_id'] == $sessionId){
				$tr = "yes";
			}
			
			
			
		}
		while($results = $stmnt2->fetch(PDO::FETCH_ASSOC)){
			if($results['employer_id'] == $sessionId){
				$tr = "yes";
			}
			
			
			
		}
		return $tr;
		
	}
	function doesTempResumeExist($sessionId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		
		$stmnt2 = $conn->prepare("SELECT * FROM temp_resumes WHERE user_id='$sessionId'");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt2->execute();
		$tr = "no";
		while($results = $stmnt2->fetch(PDO::FETCH_ASSOC)){
			if($results['user_id'] == $sessionId){
				$tr = "yes";
				return $tr;
			}
			
			
			
		}
		return $tr;
		
	}
	function doesPublishResumeExist($sessionId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		$stmnt = $conn->prepare("SELECT * FROM resumes WHERE user_id='$sessionId'");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt->execute();
		
		$tr = "no";
		while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
			if($result['user_id'] == $sessionId){
				$tr = "yes";
				return $tr;
			}
			
			
			
		}
		
		return $tr;
		
	}
	
	function editResume($sessionId){
		$con = dbConnectNow;
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$tr = doesPublishResumeExist($_SESSION['cwwid']);		
		if(strcmp($tr, "yes") == 0){
			$stmnt = $conn->prepare("SELECT * FROM resumes WHERE user_id=$sessionId");
		}
		else{
			$stmnt = $conn->prepare("SELECT * FROM temp_resumes WHERE user_id=$sessionId");
		}
		
		//$stmnt->bind_param(':user_id', $sesId);
		//$sesId = $sessionId;
		//$stmnt->bind_param(':resumeId', $resumeId);		
		$stmnt->execute();
		
		return $stmnt;
	
	}
	function editResume2($sessionId){
		$con = dbConnectNow;
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmnt = $conn->prepare("SELECT * FROM resumes WHERE id=$sessionId");
		//$stmnt->bind_param(':user_id', $sesId);
		//$sesId = $sessionId;
		//$stmnt->bind_param(':resumeId', $resumeId);		
		$stmnt->execute();
		//$result = $stmnt->fetch(PDO::FETCH_ASSOC);
		return $stmnt;
	
	}
	function updateRes($sesId, $post, $idea){
		$sql;
		$results;
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$i = 0;
		$tr = doesPublishResumeExist($_SESSION['cwwid']);
		while(count($post) > $i){
			$new = $post[$i];
			if($post[$i] == ""){
			
			}
			else{
						
				if(strcmp($tr, "yes") == 0){
					$sql = "UPDATE resumes SET " . $idea[$i] . "='$new' WHERE user_id='$sesId'"; 
					$stmnt = $conn->prepare($sql);
					$stmnt->execute();
				}
				else{
					$sql = "UPDATE temp_resumes SET " . $idea[$i] . "='$new' WHERE user_id='$sesId'"; 
					$stmnt = $conn->prepare($sql);
					$stmnt->execute();
				}
			
			$stmnt = $conn->prepare($sql);
			$stmnt->execute();
			}
			$i++;
		}
		
	}
	function publishResume($sesId){
		$sql;
		
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			$sql = "INSERT INTO resumes SELECT * FROM temp_resumes WHERE user_id='$sesId'"; 
			$sql2 = "INSERT INTO user_schools SELECT * FROM temp_user_schools WHERE user_id='$sesId'"; 
			$sql3 = "INSERT INTO user_employers SELECT * FROM temp_user_employer WHERE user_id='$sesId'"; 
			$stmnt = $conn->prepare($sql);
			$stmnt3 = $conn->prepare($sql2);
			$stmnt4 = $conn->prepare($sql3);
			$stmnt->execute();
			$stmnt3->execute();
			$stmnt4->execute();
			$sql4 = "DELETE FROM temp_resumes WHERE user_id='$sesId'";
			$stmnt2 = $conn->prepare($sql4);
			$stmnt2->execute();
		
		
	}
	function deletResume($sesId){
		$sql;
		
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql2 = "DELETE FROM resumes WHERE user_id='$sesId'";
			$stmnt2 = $conn->prepare($sql2);
			$stmnt2->execute();
		
			$sql = "DELETE FROM temp_resumes WHERE user_id='$sesId'"; 
			
			$stmnt = $conn->prepare($sql);
			$stmnt->execute();
		
		
	}
	
	function updatePassSeeker($pass, $id){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE seekers SET Password='$pass' WHERE id='$id'";
		$stmnt = $conn->prepare($sql);
		//$stmnt->bindParam("s", $password);
		//$password = $pass;
		$stmnt->execute();
	}
	
	function updatePassEmployer($pass, $id){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE employers SET Password='$pass' WHERE id='$id'";
		$stmnt = $conn->prepare($sql);
		//$stmnt->bindParam(":Password", $pass);
		$stmnt->execute();
	}
	
	function resetPassInitChk($email){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM seekers WHERE Email='$email'";
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		return $stmnt;
	}
	
	function resetPassInitChkEmployer($email){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM employers WHERE Email='$email'";
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		return $stmnt;
	}
	
		

		 
		 
		
		
		
								
		
		
		
?>