<?php
	require("publicheader.php");
	$cwwSesId = $_SESSION['cwwid'];
	$tr = doesPublishResumeExist($_SESSION['cwwid']);
	$tr2 = doesTempResumeExist($_SESSION['cwwid']);
	if(strcmp($tr, "no") == 0 && strcmp($tr2, "no") == 0){
	
?>
<style>
.formBox:before{
		content: "Resume Information";
		font-weight: bold;
		font-size: 24px;
		
	}
.formBox{
	margin: 2% 0 0 5%;
	left: 0;
}
input[type="submit"]{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
}
textarea{
	width: 100%;
}
#blurb{
		display: none;
}
#pointer{
	font-size: 36px;
	margin: auto;
}
@media screen and (min-width: 1000px){
	.sidebyside{
		display: inline-block;
	
	}
	.sidebyside:hover{
		cursor: pointer;
	}
	.formBox{
		position: relative;
		top: 0;
		margin: auto;
		width: 50%;
		
		
		
	}
	.formBox:before{
		content: "Resume Information";
		font-weight: bold;
		font-size: 24px;
	}
}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	 var button = $('<input  class="showH1" class="submit" type="submit" name="showH1" value="Press me to see the introduction and instructions" />');
	 button.css({"margin": "0 0 0 0", "cursor": "pointer", "border-radius": "10px", "background-color": "#feb600", "color": "#192535", "border": "1px solid #feb600", "box-shadow": "2px 2px 2px 2px grey"});
	
	 $(".footer").prepend(button);
	$("#pointer").css("cursor", "pointer");
	 button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	button.hide();
        	 $('body').scrollTop(0);
        });
    $("#pointer").click(function(){
       $("#blurb").hide();
        //$("div:nth-child(5)").append(button);
        button.show();
      	
      //  $("div").eq(1).append(button);
        button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	button.hide();
        	 $('body').scrollTop(0);
        });
       
    });
     
   
    
    
    //check browser support
    if(typeof(Storage) !== "undefined") {
    
    //get all the values in the form and store them for this session.
        if (sessionStorage.name) {
             $("#name").val(sessionStorage.getItem("name"));
        }
        if (sessionStorage.cell) {
             $("#cell").val(sessionStorage.getItem("cell"));
        }
        if (sessionStorage.achieve) {
             $("#achieve").val(sessionStorage.getItem("achieve"));
        }
        if (sessionStorage.creds) {
             $("#creds").val(sessionStorage.getItem("creds"));
        }
        if (sessionStorage.url) {
             $("#url").val(sessionStorage.getItem("url"));
        }
        
       
      
            $(".stored").keyup(function(){
            		sessionStorage.setItem($(this).attr('name'), $(this).val());
            });
      
    } else {
        document.getElementById("companyName").innerHTML = "Sorry, your browser does not support web storage...";
    }
    sessionStorage.clear();
     
});
</script>

<div style="padding: 1em 2em 0 2em">
<h1 class="shadow" style="" id="pointer">Begin Resume</h1><div class="underline"></div><br>
<h1 id="blurb" style="margin: 1em 0 1em 2em; background-color: #192535; border-radius: 10px; padding: 2em; color: #ffffff">
By uploading information to or viewing information on this site, the Job-seeker acknowledges and agrees that, to the fullest extent permitted by law, none of the Creators of this site (including but not limited to CyberWatch West, Whatcom Community College, and any employees thereof) accept any responsibility or liability for the actions of any Employer given access to information or documents uploaded to this site. <br>
Potential employers will search through resumes to find potential candidates. For better opportunities please fill out the resume to the best of your knowledge.<br></br>

The information will be saved automatically if you leave this page. 


Double click inside this box to remove introduction permanantly from view.  When the page is refreshed the introduction will show up again<br>
<span style="color: red" id="pointer"> Click to remove introduction</span><br>
</h1> </div>
<div class="formBox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
	<br></br>
		<label class="required" for="name">Full Name</label>&nbsp;
		<input  type="text" id="name" class="stored" name="name" ><br><br><br><b>
		<label class="" for="cell">Cell Phone (no dashes please)</label>&nbsp;	
		<input type="text" id="cell" class="stored" name="cell" ><br></br><br></br>
		<select type="text" id="job" name="job" /> 
			<option value="IT">IT</option>			
			<option value="Networking">Networking</option>
			<option value="Cybersecurity">Cybersecurity</option>
			<option value="Developer">Developer</option>
		</select>
		<br><br><br><br>
		<label for="achieve">Accomplishments and Achievements</label>&nbsp;<br>
		<textarea name="achieve" id="achieve" class="stored" rows="5" cols="10"> </textarea><br><br><br>
		<label for="creds">Certifications and Credentials</label>&nbsp;<br>
		<textarea name="creds" id="creds" class="stored" rows="5" cols="10"> </textarea><br><br><br>
		<label for="url">LinkedIn Profile</label>&nbsp;
		<input type="url" id="url" class="stored" name="url"><br><br><br><br>
		
	
		<input  class="sidebyside" type="submit" name="home" value="Home">
		<input  class="sidebyside" type="submit" name="submit" value="Next">
		
		
	
		
	</form>
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='get' onSubmit="return confirm('are you sure?')">
		<input  class="sidebyside" type="submit" name="delete" value="Delete Resume">	
	</form>
</div>

<?php
if(isset($_POST['submit'])){
	$con = dbConnectNow();
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$cell = mysqli_real_escape_string($con, $_POST['cell']);
	$role = mysqli_real_escape_string($con, $_POST['job']);
	$achieve = mysqli_real_escape_string($con, $_POST['achieve']);
	$creds = mysqli_real_escape_string($con, $_POST['creds']);
	$url = mysqli_real_escape_string($con, $_POST['url']);
	$resumes = "temp_resumes";
	$resumes2 = "resumes";
	$sqlCreate = "CREATE TABLE IF NOT EXISTS `". $resumes . "`(
				id int PRIMARY KEY AUTO_INCREMENT,
				user_id int,
				name varchar(50), 
				cell_number varchar(10), 
				role varchar(50), 
				achieve text, 
				creds text, 
				url varchar(255))";
	if(!is_numeric($cell)){
		echo "<script>alert('Cell number can only contain intergers.  Please do not use dashes.  ');</script>";
	}
	else{
	$queryCreateApplicationTable = mysqli_query($con, $sqlCreate);
	if($queryCreateApplicationTable){
		$sesId = $_SESSION['cwwid'];
		$name = strToUpper($name);
		$tf = "no";
		$tf2 = "no";
		$sqlSearch = "SELECT name FROM `temp_resumes` WHERE `user_id`='$sesId'";
		$sqlSearch2 = "SELECT name FROM resumes` WHERE `user_id`='$sesId'";
		$querySearch = mysqli_query($con, $sqlSearch);
		$querySearch2 = mysqli_query($con, $sqlSearch2);
		if(($row = mysqli_fetch_array($querySearch) > 1)){
			$tf = "yes";
		}
		if($row = mysqli_fetch_array($querySearch2) > 1){
			$tf2 = "yes";
		}
		if(strcmp("no", $tf) == 0 && strcmp("no", $tf2) == 0){
			
				$save = hasDashes($cell);
				if($save == "yes"){
					//echo $save . "<br></br>";
					$cell = noDashes($cell);
					//echo $_POST['4'];
					//echo "<br></br>" . $post[$count];
				}
		}
			$sqlInsert = "INSERT INTO `" . $resumes . "`(`user_id`, `name`, `cell_number`, `role`, `achieve`, `creds`, `url`) VALUES('$sesId', '$name', '$cell', '$role', '$achieve', '$creds', '$url')";
			$queryInsert = mysqli_query($con, $sqlInsert);
		
			header("location: resumeform2.php");
		}
		else{
			echo "<script>alert('You can only create one resume, but you can create multiple jobs and school history');</script>";
			echo strcmp("no", $tf);
			echo $tf;
		}
		/*if(strcmp("no", $tf2 )== 1 && strcmp("no", $tf) == 1 ){
			$sqlInsert = "INSERT INTO `" . $resumes2 . "`(`user_id`, `name`, `cell_number`, `role`, `achieve`, `creds`, `url`) VALUES('$sesId', '$name', '$cell', '$role', '$achieve', '$creds', '$url')";
			$queryInsert = mysqli_query($con, $sqlInsert);
		
			header("location: resumeform2.php");
		}
		else{
			echo "<script>alert('You can only create one resume, but you can create multiple jobs and school history');</script>";
		}*/

	}
	/*else{
		echo "<script>alert('failed');</script>";
	}*/
	}
}
if(isset($_POST['home'])){
	header("location: " . $_SESSION['cwwhomepage']);
}


if(isset($_POST['addEmp'])){
	header("location: resumeform5.php");
}
if(isset($_GET['delete'])){
//echo "<script>confirm('You are about to delete your resume. If this is the action you would like press ok');</script>"
	//if(){;
	$sesId = $_SESSION['cwwid'];
	$con = dbConnectNow();
	$sqlDelete = "DELETE FROM `resumes` WHERE `user_id`='$sesId'";
	$sqlDeleteSchool = "DELETE FROM `user_schools`  WHERE `user_id`='$sesId'";
	$sqlDeleteEmployer = "DELETE FROM  `user_employer` WHERE `user_id`='$sesId'";	
	$myQuery = mysqli_query($con, $sqlDelete);
	mysqli_query($con, $sqlDeleteSchool);
	mysqli_query($con, $sqlDeleteEmployer);	
	if($myQuery){
		echo "<script>alert('You have deleted your resume');</script>";
	}
	else{
		echo "<script>alert('You have not deleted your resume');</script>";
	}
	//}
}


?>



<div style="margin-top: 5%">
</div>









<?php require("publicfooter.php") ?>