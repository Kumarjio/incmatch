<?php
	require("publicheader.php");
	
?>



<style>
.descrip{
	color: #ffffff; 
	margin-left: 5%; 
	font-size: 24px;
}
.screen{
	width: 100%;
	margin: 3% 5% 0 5%;
	padding: 0;
	left: 0;
	
}
.underline{
	border-bottom: 2px solid grey;
	 width: 100%;
	 position: relative;
	 top: -3em;
}
.h1s{
	margin: 2% 0 2% 0;
}
.formBox:before{
		content: "Resume Information ";
		font-weight: bold;
		font-size: 24px;
		color: #ffffff;
	}
.sidebyside{
	width: 20%;
}
.formBox{
	margin: 0 0 0 5%;
	left: 0;
	background-color: #192535;
	border-radius: 10px;
	padding: 5px;
}
textarea{
	width: 100%;
}
input[type="submit"]{
	background-color: #feb600;
	border-radius: 10px;
	paddin: 5px;
	box-shadow: 4px 4px 4px #000000;
	border: 2px solid #192535;
}
#pointer{
		font-size: 36px;
}
@media screen and (min-width: 199px) and (max-width: 299px){
	.underline{
		top: 0;
	}
	

}
@media screen and (min-width: 300px){
	.h1s{
		margin: 1% 0 0 0;
		width: 100%;
		padding: 0;
		
	}
	.sidebyside{
		width: 100%;
	}
	.underline{
		top: 0;
	}
	#pointer{
		
	}
}
@media screen and (min-width: 1000px){
	.sidebyside, input[type='submit']{
		display: inline-block;
		//background-color: #192535;
		//color: #febf00;
		width: 35%;
	
	}
	.h1s{
		margin: 1% 0 1% 0;
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
		content: "Resume Information ";
		font-weight: bold;
		font-size: 24px;
		color: #ffffff;
	}
	.underline{
		top: 0;
	}
	
}	

@media screen and (min-width: 1001px) and (max-width: 1151px){
	.descrip{
		font-size: 14px;
	}
}
@media screen and (min-width: 1152px) and (max-width: 1537px){
	.descrip{
		font-size: 18px;
	}
}

</style>

<div class="screen">
<h1 class="shadow" style="" id="pointer"> Create Resume</h1><div class="underline"></div><br>
<h1 class="h1s">By uploading information to or viewing information on this site, the Job-seeker acknowledges and agrees that, to the fullest extent permitted by law, none of the Creators of this site<br> (including but not limited to CyberWatch West, Whatcom Community College, and any employees thereof) accept any responsibility or liability for the actions of any Employer given access to information or documents uploaded to this site. <br></br>
Posting a resume on <?php echo INC; ?> allows employers to review your qualifications for available internships and entry-level jobs.<br></br>
Job Seekers can post one resume at a time. To replace an existing resume, click “Delete resume” and start over with “Enter contact information.”  <br></br> Review your existing resume or make any necessary changes by selecting "View Resume" under the "Create Resume" menu tab above. <br></br> The "Edit Resume" button is at the bottom of the View Resume page. To make your resume visible to employers you will have to publish it.  Just click the publish button below when you are ready.

</div>


</h1><br></br>
		

<div class="formBox" style="width: 90%">

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
<?php
/*
This checks to see if there is a resume.  If there is a resume then it will not show the enter contact information because we are only allowing one resume.
*/
	$tr = doesPublishResumeExist($_SESSION['cwwid']);		
	if(strcmp($tr, "yes") == 0){
		
	}
	else{
		?>
		<input  class="sidebyside" type="submit" name="start" value="Enter contact information">
	<?php } ?><br></br>
	
		<input  class="sidebyside" type="submit" name="addSchool" value="Add education"><span id="btnDescrp" class="descrip" style="">Want to list more than one school or educational experience? Click the button again.	</span><br></br>
		<input  class="sidebyside" type="submit" name="addEmp" value="Add a work experience"> <span class="descrip"> Want to list more than one work experience? Click the button again. </span><br></br>
		
		<?php
			$tr = doesPublishResumeExist($_SESSION['cwwid']);
	if(strcmp($tr, "yes") == 0){
		
	}
	else{
		?>
		<input  class="sidebyside" type="submit" name="publish" value="Publish Resume"> <span class="descrip" style="">Publish your resume to make it available to employers. </span>	<br></br>
	<?php } ?>
		

</form>		
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='get' onSubmit="return confirm('are you sure?')">
			
		<input  class="sidebyside" type="submit" name="deletes" value="Delete Resume"> <span class="descrip" style="">Permanently deletes your existing resume—<span style="color: red; font-weight: bold">Warning</span> this cannot be undone. </span>
</form>	



	
</div>		
<?php

if(isset($_POST['start'])){
//	header("location: resumeform.php");
//echo "start";
	echo "<script>window.location.assign('resumeform.php')</script>";
}

if(isset($_POST['edit'])){
	//header("location: " . $_SESSION['cwwhomepage']);
	echo "<script>window.location.assign('editresume.php?" . $_SESSION['cwwid'] . "')</script>";
}
if(isset($_POST['addSchool'])){
	//header("location: resumeform4.php");
	echo "<script>window.location.assign('resumeform4.php')</script>";
}

if(isset($_POST['addEmp'])){
	//header("location: resumeform5.php");
	echo "<script>window.location.assign('resumeform5.php')</script>";
}
if(isset($_GET['deletes'])){

	$sesId = $_SESSION['cwwid'];
	deletResume($sesId);
	/*$con = dbConnectNow();
	$sqlDelete = "DELETE FROM `resumes` WHERE `user_id`='$sesId'";
	$sqlDelete2 = "DELETE FROM `temp_resumes` WHERE `user_id`='$sesId'";
	$sqlDeleteSchool = "DELETE FROM `user_schools`  WHERE `user_id`='$sesId'";
	$sqlDeleteEmployer = "DELETE FROM  `user_employer` WHERE `user_id`='$sesId'";	
	$sqlDeleteTempEmployer = "DELETE FROM  `temp_user_employer` WHERE `user_id`='$sesId'";	
	$sqlDeleteTempSchool = "DELETE FROM `temp_user_schools`  WHERE `user_id`='$sesId'";
	$myQuery = mysqli_query($con, $sqlDelete);
	$myQuery2 = mysqli_query($con, $sqlDelete2);
	mysqli_query($con, $sqlDeleteSchool);
	mysqli_query($con, $sqlDeleteEmployer);	
	mysqli_query($con, $sqlDeleteTempSchool);
	mysqli_query($con, $sqlDeleteTempEmployer);	
	if($myQuery){*/
		//deleteResume($_SESSION['cwwid']);
		echo "<script>alert('You have deleted your resume');</script>";
		echo "<script>window.location.assign('" . $_SESSION['cwwhomepage'] . "')</script>";
	/*}
	else{
		echo "<script>alert('You have not deleted your resume');</script>";
	}*/
	
	
}
if(isset($_POST['publish'])){
	
	publishResume($_SESSION['cwwid']);
	echo "<script>alert('You have published your resume');</script>";
	echo "<script>window.location.assign('" . $_SESSION['cwwhomepage'] . "')</script>";
	
}
?>




<div style="margin-top: 5%">
</div>








<?php require("publicfooter.php") ?>



<script>
$(document).ready(function() {
    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);
    var $pane = $('span');

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize < 974) {
            //if the window is greater than 440px wide then turn on jScrollPane..
            $pane.hide();
        }
        else{
        	$pane.show();
        }
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
});

</script>