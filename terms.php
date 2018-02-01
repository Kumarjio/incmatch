<?php 	
ob_start();
//require("dblogin.php");
//require("config.php");
 require("functions.php");
 //sessionTimeOutUser();
$page = getEverythingAfterEqualSignInUrl("?");
$page = $page . ".php";
?>

<!DOCUTYPE html>
<html lang="en">

<head>
<title>CWW INTERNSHIPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>src="https://code/jquery.com/jquery-3.1.1.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Indie+Flower|Lobster|Oswald" rel="stylesheet">
<style>
.terms{
	margin: 0 0 15% 40%;
}
@media screen and (min-width: 200px) and (max-width: 300px){
	.terms{
		margin: 0 0 15% 5%;
	}
	textarea{
		width: 85%;
	}
}
@media screen and (min-width: 301px) and (max-width: 600px){
	.terms{
		margin: 0 0 15% 9%;
		
	}
	textarea{
		width: 85%;
	}
	
}
@media screen and (min-width: 601px) and (max-width: 800px){
	.terms{
		margin: 0 0 15% 25%;
		
	}
	textarea{
		
	}
	
}
</style>
<?php 

$terms = "Disclaimer for employers:

By posting information to or viewing information from this site, the Employer acknowledges and agrees that, to the fullest extent permitted by law, none of the Creators of this site (including but not limited to CyberWatch West, Whatcom Community College, and any employees thereof) accept any responsibility or liability for the accuracy of information contained on the site, whether or not arising from the negligence of any of the Creators of this site or of Job-seekers contributing information to the site.
The Creators of this site do not make any warranties about the completeness, reliability, and accuracy of information obtained from this site. Any action you take upon the information on this site is strictly at your own risk, and the Creators of the site will not be held liable for any losses or damages in connection with this site. 
The Creators of this site assume no responsibility or liability for any errors or omissions in the content of this site. The information contained in this site is provided on an “as is” basis with no guarantees of completeness, accuracy, usefulness, or timeliness and without any warranties of any kind whatsoever, express or implied. The Creators of this site do not warrant that this site and any information or material posted on it will be uninterrupted, error-free, omission-free, or free of viruses or other harmful items. 
The inclusion of documents on this site, including but not limited to resumes, Curriculum Vitae (CV), and other documents containing personal and professional information, does not imply endorsement or support of specific Job-seekers or institutions of higher education by the Creators of this site. 
";

?>
<br></br>
<div class="terms" style="">
<textarea style="padding: 2% 2% 2% 2%" rows="30" cols="50" >
<?php echo $terms; ?>
</textarea><br></br>
<input type="radio" name="terms" id="yes" value="yes"><span style="color: rgba(255,255,255,1)">Agree</span>
<br></br>
<input type="radio" name="terms" id="no" value="no"><span style="color: rgba(255,255,255,1)">Disagree</span> <br></br>
<input type="submit" id="nextPage" onClick="termCheck()" name="<?php echo $page; ?>" value="Submit">
</div>



<?php

	if(isset($_POST["submit"])){
		
	}
?>
<script type="text/javascript">
	function termCheck(){
		
		var y = document.getElementById("yes").checked;
		var n = document.getElementById("no").checked;
		var ye = y.value
		var page = $("#nextPage").val();
		var pages = $("#nextPage").attr('name');
		//location = HOME;
		if(y == true && y != null){
		var window = "http://cwwinternship.cyberwatchwest.org/inc/" + pages;
		(function() {
  			if (location !== top.location) {
   			 top.location = window;
  			}
		})(this);

			location = window;
			//alert("have to agree to move on " + window);
		}
		else{
			alert("You must agree to our terms to move forward");
		}
		
	}
</script>