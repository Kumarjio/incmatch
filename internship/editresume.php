<style>
input[type="submit"]{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
	cursor: pointer;
}
</style>

<?php require('publicheader.php'); 
$urlId = getEverythingAfterEqualSignInUrl("?");

if(isset($_POST['edit']) || $urlId == $_SESSION['cwwid']){

	$stmnt = editResume($urlId);
	while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
	
		if($_POST['type'] == $result['role']){
			
			if($result['user_id'] == $_SESSION['cwwid']){
				
				
				?>
				<div style="margin: 0 0 0 15%">
				<form action="<?php htmlspecialchars($SERVER['PHP_SELF']); ?>" method="POST">
					<label class="" for="name">Full Name</label>&nbsp;
					<input type="text" name="3" value="<?php echo $result['name']; ?>"/><br></br><br></br>
					<label class="" for="cell">Cell Phone (no dashes please) <br>ex:<br> (777777777) excepted<br>(777-777-777) not excepted</label>&nbsp;					
					<input type="text" name="4" value="<?php echo $result['cell_number'];?>"/><br></br><br></br>
					
					<label for="role">Job Type:</label>  &nbsp;<br>
		<select type="text" id="role" name="5" /> 
			<option value="<?php echo $result['role']; ?>"><?php echo $result['role']; ?></option>
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
		</select><br></br><br></br>
					<label for="achieve">Accomplishments and Achievements</label>&nbsp;<br>
					<textarea id="achieve" name="6" id="achieve" rows="5" cols="10"><?php echo $result['achieve']; ?> </textarea><br><br><br>
					<label for="creds">Certifications and Credentials</label>&nbsp;<br>
					<textarea id="creds" name="7" rows="5" cols="10" ><?php echo $result['creds']; ?></textarea><br></br><br></br>
					<label for="url">LinkedIn Profile</label>&nbsp;
					<input type="text" id="url" name="8" value="<?php echo $result['url']; ?>"/><br></br><br></br>
					<label class="required" for="school">School name</label>&nbsp;
					<input type="text" name="9" id="school" value="<?php echo $result['school']; ?>"/><br></br><br></br>
					<label class="required" for="address">School Address</label>&nbsp;
					<input type="text" name="10" id="address" value="<?php echo $result['school_address']; ?>"/><br></br><br></br>
					<label class="required" for="city">City</label>&nbsp;
					<input type="text" name="11" id="city" value="<?php echo $result['city']; ?>"/><br></br><br></br>
					<label class="required" for="state">State</label>&nbsp;
					<input type="text" name="12" id="state" value="<?php echo $result['state']; ?>"/><br></br><br></br>
					<label class="required" for="zip">Zip</label>&nbsp;
					<input type="text" name="13" id="zip" value="<?php echo $result['zip']; ?>"/><br></br><br></br>
					<label class="required" for="yearsCompleted">Years Attended</label>&nbsp;<br>
					<input type="text" name="14" id="yearsCompleted" value="<?php echo $result['years_completed']; ?>"<br></<br><br></br><br></br>
					<label for="grad">Have you graduated?</label>&nbsp;
					<input type="checkbox" name="15" id="grad" value="<?php echo $result['graduated']; ?>"/><br></br><br></br>
					<label  for="degree">Degree Earned</label>&nbsp;
					<input type="text" name="16" id="degree" value="<?php echo $result['degree']; ?>"/><br></br><br></br>
					<label class="" for="emp">Company Name</label>&nbsp;
					<input type="text" name="17" id="emp" value="<?php echo $result['employer']; ?>"/><br></br><br></br>
					<label class="" for="supervisor">Supervisor Name</label>&nbsp;
					<input type="text" name="18" id="supervisor" value="<?php echo $result['supervisor']; ?>"/><br></br><br></br>
					<label class="" for="ecity">City</label>&nbsp;
					<input type="text" name="19" id="ecity" value="<?php echo $result['e_city']; ?>"/><br></br><br></br>
					<label class="" for="estate">State</label>&nbsp;
					<input type="text" name="20"  id="estate" value="<?php echo $result['e_state']; ?>"/><br></br><br></br>
					<label class="" for="ezip">Zip</label>&nbsp;
					<input type="text" name="21" id="ezip" value="<?php echo $result['e_zip']; ?>"/><br></br><br></br>
					<label class="" for="ephone">Company Phone Number</label>&nbsp;
					<input type="text" name="22" id="ephone" value="<?php echo $result['employer_phone_number'];?>"/><br></br><br></br>
					<label class="" for="length">Begin Date</label>&nbsp;	<br>	
					<input type="date" name="25" id="length" value="<?php echo $result['begin_date']; ?>"/><br></br><br></br>
					<label class="" for="lengthEnd">End Date</label>&nbsp;	<br>	
					<input type="date" id="lengthEnd" name="26" value="<?php echo $result['end_date']; ?>"/><br></br><br></br>
					<label class="" for="pos">Position and Duties</label>&nbsp;
					<input type="text" name="23" id="pos" value="<?php echo $result['position_held']; ?>"/><br></br><br></br>
					<label for="leave">Reason for Leaving</label>&nbsp;
					<input type="text" name="24" id="leave" value="<?php echo $result['reason_for_leaving']; ?>"/><br></br><br></br>
					
					<input type="submit" name="submit" value="Submit Changes"/>
				
				</form>
				</div>
				<?php
				
			}
		}
		
	}
	
}
else{
	echo "not working";
}

if(isset($_POST['submit'])){
	//print_r($_POST);
	//echo "<br></br><br></br><br></br>";
	$idea[0] = "name";
		$idea[1] = "cell_number";
		$idea[2] = "role";
		$idea[3] = "achieve";
		$idea[4] = "creds";
		$idea[5] = "url";
		$idea[6] = "school";
		$idea[7] = "school_address";
		$idea[8] = "city";
		$idea[9] = "state";
		$idea[10] = "zip";
		$idea[11] = "years_completed";
		$idea[12] = "graduated";
		$idea[13] = "degree";
		$idea[14] = "employer";
		$idea[15] = "supervisor";
		$idea[16] = "e_city";
		$idea[17] = "e_state";
		$idea[18] = "e_zip";
		$idea[19] = "employer_phone_number";
		
		$idea[20] = "position_held";
		$idea[21] = "reason_for_leaving";
		$idea[22] = "begin_date";
		$idea[23] = "end_date";
	$post;
	$count = 0;
	$stmnt = editResume($_SESSION['cwwid']);
	$con = dbConnectNow();
	for($i = 3; $i <= 26; $i++){
		//if($i == 5){
		//	$post[$count] = mysqli_real_escape_string($con, $_POST['role']);
			//echo $post[$count];
			//echo $idea[$count] . "<br></br>";
		//}
		$post[$count] = mysqli_real_escape_string($con, $_POST[$i]);
		if($_POST['4'] == $post[$count]){
			$save = hasDashes($post[$count]);
			if($save == "yes"){
			echo $save . "<br></br>";
			$post[$count] = noDashes($post[$count]);
			echo $_POST['4'];
			echo "<br></br>" . $post[$count];
			}
		}
		//echo $post[$count];
		//echo $idea[$count] . "<br></br>";
		//echo $_POST[$i];
		$count++;
	
	}
	
		//echo $post[2];
		//print_r($post);
		
		
		updateRes($_SESSION['cwwid'], $post, $idea);
		echo "<script>window.location.assign('" . $_SESSION['cwwhomepage'] . "')</script>";
		//echo $_SESSION['cwwhomepage'];
	//echo $post5;
		
	//}
	
	
	
	
	
	
	
	
	
	
	
	
	
}