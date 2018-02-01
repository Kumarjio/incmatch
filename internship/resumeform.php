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
	margin: 0 0 0 5%;
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
	$("#pointer").css("cursor", "pointer");
    $("#pointer").click(function(){
       $("#blurb").hide();
        var button = $('<input type="submit" name="showH1" value="Press Me to see the introduction" />');
        button.css({"margin": "0 0 5em 5em", "cursor": "pointer"});
      	
        $("div").eq(2).append(button);
        button.click(function(){
        	$("#blurb").show();
        	button.hide();
        });
       
    });
    $("#blurb").dblclick(function(){
    
    	$(this).hide();
    });
     
});
</script>

<div style="padding: 0 2em 0 2em">
<h1 id="blurb" style="margin: 1em 0 1em 2em; background-color: #192535; border-radius: 10px; padding: 2em; color: #ffffff">
Potential employers will search through resumes to find potential candidates. For better opportunities please fill out the resume to the best of your knowledge.<br></br>


Double click inside this box to remove introduction permanantly from view.  When the page is refreshed the introduction will show up again<br>
<span style="color: red" id="pointer"> Click to remove introduction</span><br>
</h1> </div>
<div class="formBox">

	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
	<br></br>
		<label class="required" for="name">Full Name</label>&nbsp;
		<input  type="text" id="name" name="name" ><br><br><br><b>
		<label class="" for="cell">Cell Phone (no dashes please)</label>&nbsp;	
		<input type="tel" id="cell" name="cell" ><br></br><br></br>
		<?php jobTitles2(); ?>
		<br><br><br><br>
		<label for="achieve">Accomplishments and Achievements</label>&nbsp;<br>
		<textarea name="achieve" id="achieve" rows="5" cols="10"> </textarea><br><br><br>
		<label for="creds">Certifications and Credentials</label>&nbsp;<br>
		<textarea name="creds" id="creds"rows="5" cols="10"> </textarea><br><br><br>
		<label for="url">LinkedIn Profile</label>&nbsp;
		<input type="url" id="url" name="url"><br><br><br><br>
		
	
		<input  class="sidebyside" type="submit" name="home" value="Home">
		<input  class="sidebyside" type="submit" name="submit" value="Submit">
		
		
	
		
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
	$role = mysqli_real_escape_string($con, $_POST['role']);
	$achieve = mysqli_real_escape_string($con, $_POST['achieve']);
	$creds = mysqli_real_escape_string($con, $_POST['creds']);
	$url = mysqli_real_escape_string($con, $_POST['url']);
	$resumes = "temp_resumes";
	$resumes2 = "resumes";
	$sqlCreate = "CREATE TABLE IF NOT EXISTS `". $resumes . "`(
				id int PRIMARY KEY AUTO_INCREMENT,
				user_id int,
				name varchar(50), 
				cell_number int, 
				role varchar(50), 
				achieve text, 
				creds text, 
				url varchar(255))";
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