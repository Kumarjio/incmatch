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
function resume($urlId){
	$stmnt = editResume($urlId);
	while($result = $stmnt->fetch(PDO::FETCH_ASSOC)){
	
		//if($_POST['type'] == $result['role']){
			
			if($result['user_id'] == $_SESSION['cwwid']){
				
				
				?>
				<div style="margin: 0 0 0 15%">
				<form action="<?php htmlspecialchars($SERVER['PHP_SELF']); ?>" method="POST"><br></br>
					<label class="" for="name">Full Name</label>&nbsp;
					<input type="text" name="3" value="<?php echo $result['name']; ?>"/><br></br><br></br>
					<label class="" for="cell">Cell Phone (no dashes please) </label>&nbsp;	<br><br>				
					<input type="text" name="4" value="<?php echo $result['cell_number'];?>"/><br></br><br></br>
					<label for="role">Job Type:</label>  &nbsp;<br>
					<select type="text" id="role" name="5" /> 
						<option value="IT">IT</option>			
						<option value="Networking">Networking</option>
						<option value="Cybersecurity">Cybersecurity</option>
						<option value="Developer">Developer</option>
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
					<input type="hidden" name="11" id="city" value="<?php echo $result['city']; ?>"/>
					<input type="hidden" name="12" id="state" value="<?php echo $result['state']; ?>"/>
					<label class="required" for="zip">ZIPDCODE</label>&nbsp;
					<input type="text" name="13" id="zip" value="<?php echo $result['zip']; ?>"/><br></br><br></br>
					<label class="required" for="yearsCompleted">Years Attended</label>&nbsp;<br>
					<input type="text" name="14" id="yearsCompleted" value="<?php echo $result['years_completed']; ?>"<br></<br><br></br><br></br>
					<label for="grad">Have you graduated?</label>&nbsp;
			<?php
				if($result['graduated'] == "yes"){ 
			?>
					<input type="checkbox" name="15" id="grad"  checked/><br></br><br></br>
			<?php 
				}
				else{ 
			
			?>
					<input type="checkbox" name="15" id="grad"   /><br></br><br></br>
			<?php
				}
			?>
					<label  for="degree">Degree Earned</label>&nbsp;
					<input type="text" name="16" id="degree" value="<?php echo $result['degree']; ?>"/><br></br><br></br>
					<label class="" for="emp">Company Name</label>&nbsp;
					<input type="text" name="17" id="emp" value="<?php echo $result['employer']; ?>"/><br></br><br></br>
					<label class="" for="supervisor">Supervisor Name</label>&nbsp;
					<input type="text" name="18" id="supervisor" value="<?php echo $result['supervisor']; ?>"/><br></br><br></br>
					
					<input type="hidden" name="19" id="ecity" value="<?php echo $result['e_city']; ?>"/>
					
					<input type="hidden" name="20"  id="estate" value="<?php echo $result['e_state']; ?>"/>
					<label class="" for="ezip">ZIPCODE</label>&nbsp;
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
		//}
		
	}
	
}
if(isset($_POST['edit']) || $urlId == $_SESSION['cwwid']){
resume($urlId);
}

//else{
//	echo "not working";
//}

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
		if($count == 1 || $count == 19){
			$save = hasDashes($post[$count]);
			if(strcmp($save, "yes") == 0){
			//echo $save . "<br></br>";
			$post[$count] = noDashes($post[$count]);
			//echo $_POST['4'];
			//echo "<br></br>" . $post[$count];
			
			}
			
			
		}
		
		
						if($count == 8 || $count == 16){
							if($count == 8){
								$post[$count] = getCity($_POST[13]);
							}
							else{
								$post[$count] = getCity($_POST[21]);
							}
						}
						if($count == 9 || $count == 17){
							if($count == 9){
								$post[$count] = getState($_POST[13]);
							}
							else{
								$post[$count] = getState($_POST[21]);
							}
						}
						if($_POST['15'] == $post[$count]){
							if($_POST['15'] == "on"){
								$post[$count] = "yes";
								//echo $_POST['15'] . " worked";
							}
							else{
								$post[$count] = "no";
								//echo $_POST['15'];
							}
						}
						//echo $post[$count];
						//echo $idea[$count] . "<br></br>";
						//echo $_POST[$i];
						$count++;
				
				
	
						//echo $post[19];
						//print_r($post);
		
		}
		$zipLength = zipLengthCheck($post[10]);
		$zipLengths = zipLengthCheck($post[18]);

		if(strcmp("no", $zipLength) == 0){
			echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
			//resume($urlId);
		}
		else if(strcmp("no", $zipLengths) == 0){
			echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
			header("Refresh: 4; url=" . $_SERVER['PHP_SELF']);
			//resume($urlId);
		}
		else{

			if(is_numeric($post[10])){
				if(is_numeric($post[18])){
					if(is_numeric($post[11])){
						if(is_numeric($post[19]) && is_numeric($post[1])){
							updateRes($_SESSION['cwwid'], $post, $idea);
							echo "<script>window.location.assign('" . 
							VIEWRESUME . "?id=" . $_SESSION['cwwid'] . 
							"')</script>";
							//echo $_SESSION['cwwhomepage'];
		
						}
						else{
							echo "<script>alert('Phone number can only contain integers.  No dashes please.');</script>";
							
							//resume($urlId);
						}
					}
					else{
						echo "<script>alert('Years have to be an interger');</script>";
						//resume($urlId);
					}
				}
				else{
					echo "<script>alert('ZIPCODE has to be an interger');</script>";
					//resume($urlId);
				}
			}
			else{
				echo "<script>alert('ZIPCODE has to be an interger');</script>";
				//resume($urlId);
			}		
	
	
	
		}
	
	
	
	

}