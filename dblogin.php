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
	function getInternships($sesId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmnt = $conn->prepare("SELECT * FROM internships WHERE employer_id='$sesId'");
		$stmnt->execute();
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
	function getEmployersWithThisJobType($zipcode){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		$stmnt = $conn->prepare("SELECT * FROM internships WHERE zip='$zipcode'");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt->execute();
		
		
		return $stmnt;
		
	}
	function getEmail($employerId){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$con = dbConnectNow();
		$stmnt = $conn->prepare("SELECT * FROM employers WHERE id='$employerId'");
		//$stmnt->bind_param('i', $sessionId);
		$stmnt->execute();
		while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
			$newResult = $result['Email'];
			
			
			
			
		}
		
		return $newResult;
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
			$sql5 = "DELETE FROM temp_user_schools WHERE user_id='$sesId'"; 
			
			$stmnt5 = $conn->prepare($sql5);
			$stmnt5->execute();
			
			$sql6 = "DELETE FROM temp_user_employer WHERE user_id='$sesId'"; 
			
			$stmnt6 = $conn->prepare($sql6);
			$stmnt6->execute();
		
		
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
			$sql3 = "DELETE FROM temp_user_schools WHERE user_id='$sesId'"; 
			
			$stmnt3 = $conn->prepare($sql3);
			$stmnt3->execute();
			
			$sql4 = "DELETE FROM temp_user_employer WHERE user_id='$sesId'"; 
			
			$stmnt4 = $conn->prepare($sql4);
			$stmnt4->execute();
			$sql5 = "DELETE FROM user_schools WHERE user_id='$sesId'"; 
			
			$stmnt5 = $conn->prepare($sql5);
			$stmnt5->execute();
			
			$sql6 = "DELETE FROM user_employers WHERE user_id='$sesId'"; 
			
			$stmnt6 = $conn->prepare($sql6);
			$stmnt6->execute();
		
		
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
	
	function grabZip($id){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT DISTINCT zip FROM internships WHERE employer_id='$id'";
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		return $stmnt;
	}
	function grabZipEmp($id){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT zip FROM employers WHERE id='$id'";
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		return $stmnt;
	}
	function matchZip($zipArray){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$count = 0;
		$stmnt;
	?>
	<div class="" style="margin: 0 0 0 15%">
	<?php
		
		foreach($zipArray as $zip){
			$sql = "SELECT zip, user_id FROM job_pref WHERE zip='$zip'";
			$do = "no";
			$stmnt = $conn->prepare($sql);
			$stmnt->execute();
			$user_id;
			echo "<h1 style='margin: 0 0 0 2%'>Candidates in the " . $zip . " ZIPCODE</h1>";
			while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
				echo "<script type='text/javascript'>sessionStorage.setItem('userId'" . $result['user_id'] . ", " . $result['user_id'] . ");</script>";		
				$idArray[$count] = $result['zip'];
				$idArray[$count + 1] = $result['user_id'];				
				$_SESSION['user_id'] = $result['user_id'];
				
				//print_r($idArray);
				$uniqueIdArray = array_unique($idArray);
				
				$count += 2;
			}	
			//unset($idArray);
			
			$unique = array_values($uniqueIdArray);
			for($i = 0; $i < count($uniqueIdArray); $i++){?>
				<input type="hidden" name="<?php echo $unique[$i]; ?>" value="<?php echo $unique[$i]; ?>" >
	<?php
				echo "<script type='text/javascript'>sessionStorage.setItem('userId" . $unique[$i] . "', " . $unique[$i] . ");</script>";	
			}
			//echo "<script type='text/javascript'>alert(sessionStorage.getItem('userId17'));</script>";
			
			//echo "<br>" . count($uniqueIdArray);
			for($i = 1; $i < count($unique); $i++){
			$sql2 = "SELECT id, Name, Email FROM seekers WHERE id='$unique[$i]'";
			$stmnts = $conn->prepare($sql2);
			$stmnts->execute();
				
				while($results = $stmnts->fetch(PDO::FETCH_ASSOC)){	
					
					
					echo "<div class='jobInfo' style='margin: 2%'>";
					echo $results['Name'] . "<br> " . $results['Email'] . "<br>";	
				
					echo "<a style='color: #000000' href='viewresume2.php?" . $results['id'] . "&c'>View Resume</a>";
					echo "</div>";
				}
			}
			unset($idArray);	
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			/*while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
				/*if($_SESSION['zipps'] == $zip){
					$do = "no";
				}
				else{
					$do = "yes";
				}
				
				$jobType[$result['job_type']] = $result['user_id'];
				//echo $_SESSION['zipps'] . "==" . $zip ." do == " . $do . "<br>";
				$user_id = $result['user_id'];
				$_SESSION['zipps'] = $result['zip'];
				$_SESSION['areaId'] = $result['user_id'];
				$sql2 = "SELECT id, Name, Email FROM seekers WHERE id='$user_id'";
				$stmnts = $conn->prepare($sql2);
				$stmnts->execute();
				
				while($results = $stmnts->fetch(PDO::FETCH_ASSOC)){
				//echo $results['id'] . "==" . $_SESSION['areaId'] . " do == ". $do . "<br>";
					if($jobType[$result['job_type']] == $results['id'] && strcmp($do, "no") == 0) {
						echo "<div class='jobInfo' style='width: 15%; margin: 2%'><strong>" . $result['zip'] . "</strong><br>" . $result['job_type'] . "<br>" . $result['user_id'] . "<br>";
			
						echo $results['Name'] . "<br> " . $results['Email'] . "<br>";	
				
						echo "<a style='color: #000000' href='viewresume2.php?id=" . $result['user_id'] . "'>View Resume</a>";
				
						echo "</div>";
						$do = "yes";
						
					
					}
					else{
				
						$do = "no";
						
					}
				
				}
			}*/
			
			
		}
		?>
		</div>
		<?php
		//return $stmnt;
		
	}
	
	function grabZip2($id){
		$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBUSER, DBPASS);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT DISTINCT zip FROM internships WHERE employer_id='$id'";
		$stmnt = $conn->prepare($sql);
		$stmnt->execute();
		$myArray;
		$count = 0;
		while($results = $stmnt->fetch(PDO::FETCH_ASSOC)){
			$myArray[$count] = $results['zip'];
			$count++;	
		}
		return $myArray;
	}
	
		

		 
		 
		
		
		
								
		
		
		
?>