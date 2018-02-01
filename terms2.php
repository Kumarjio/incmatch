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

$terms = "Disclaimer for job-seekers:
By uploading information to or viewing information on this site, the Job-seeker acknowledges and agrees that, to the fullest extent permitted by law, none of the Creators of this site (including but not limited to CyberWatch West, Whatcom Community College, and any employees thereof) accept any responsibility or liability for the actions of any Employer given access to information or documents uploaded to this site. 
The Creators of this site have implemented measures designed to secure your personal information from accidental loss and from unauthorized access, use, alteration, and disclosure. Where we have given you (or where you have chosen) a password for access to certain parts of our Website, you are responsible for keeping this password confidential. Job-seekers are asked not to share their password with anyone.
Unfortunately, the transmission of information via the internet is not completely secure. Although the Creators of this site will do their best to protect your personal information, they cannot guarantee the security of personal information transmitted to the site. Any transmission of personal information is at your own risk. The Creators of the site are not responsible for circumvention of any privacy settings or security measures contained on the site.
Job-seekers are encouraged to follow online safety best practices in deciding whether to contribute information to this site and/or to respond to queries stemming from their use of this site. Job-seekers should protect their personal information by never providing social security, credit card, or bank account numbers to prospective employers.
The information contained in this site is provided on an “as is” basis with no guarantees of completeness, accuracy, usefulness, or timeliness and without any warranties of any kind whatsoever, express or implied. The Creators of this site do not make any warranties about the completeness, reliability, and accuracy of information obtained from this site.
Because user authentication online is difficult, the Creators of this site cannot and do not confirm that individuals using this site are who they claim to be. The Creators of this site are not responsible for the quality, safety, or legality of the listings posted, the truth or accuracy of the listings, or the ability of employers to offer internships or job opportunities to candidates.

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