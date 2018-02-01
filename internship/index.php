<?php  ob_start;
	require("siteheader.php");
	
?>



<style>
.body{
	margin: 0 auto;
	opacity: 0.3;
	width: 100%;
	
}
	div.jobInfos > a:hover{
		color: #FEBF00;
	}
	div.jobinfos{
		padding: 2em;
	}
	.buttons{
		padding: 2em;
		/*position: relative;*/
		display: inline-block;
		border: 2px solid #fffff9;
	
		text-align: center;
		background-color: #ffffff;
		border-radius: 5px;
		color: #000000;
		box-shadow: 4px 5px 5px grey;
		
		
		
		
	}
	.myLogo{
		width: 100%;
	}
	.containers{
		left: 0;
		margin: 0;
	}
	.contain_page{
		padding: 5%;
		margin: 0 0 0 0;
	}
	
	@media screen and (min-width: 300px) and (max-width: 640px){
	
		h1{
			//display: none;
			font-size: 12px;
			width: 90%;
			left: 0;
			
		}
		#indexBox{
			margin: 2em 0 0 0;
			left: -2em;
			
		}
		.buttons{
		       width: 100%;
		       margin: 0;
		}
	}

	@media screen and (min-width: 1000px){
		.myLogo{
			width: 100%;
		}
		.body{
			margin: 0 auto;
			width: 100%;
			opacity: .1;
		}
		.buttons{
			width: 15%;
			left: 6.5em;
		}
	}
	@media screen and (min-width: 1145px){
		h1{
			margin: 0 0 0 30%;
		}
	}
	@media screen and (min-width: 1550px){
		h1{
			margin: 0 0 5% 40%;
		}
		.buttons{
			width: 15%;
			left: 6em;
		}
	}
	
	

</style>

<script type="text/javascript">
	function popUp(){
		
		if(confirm("Are you sure you want to leave this page?")){
			window.location = "https://www.cyberwatchwest.org";
		}
		else{
			alert("You will not be redirected")
		}
	}
</script>
<div class="contain_page" style="">
<h1 style="margin: 0 0 0 0; background-color: #feb600; border-radius: 10px; padding: 2em">Welcome to CyberWatch West’s Internship and Job Matching Program I.N.C. <br><br>This web application connects students and recent graduates with employers seeking interns and entry-level employees. 
We invite you to follow these easy steps.<br>
Students/graduates: Create an account as a “Job Seeker” to build an online resume so potential employers can find you. Select the types of work that interest you most. Get to know the employers participating in I.N.C. <br>

Employers: Create an “Employer” account to start building internship and job descriptions. Browse posted resumes and reach out to top students or graduates with the qualifications you’re looking for. <br>

<br>


<span style="color: red">Use of the I.N.C is voluntary and at your own risk. CyberWatch West does not vet applicants or specific job listings prior to allowing information to be posted. Employers are encouraged to use the same vetting processes they would employ for any application or resume submitted to them directly. <br>

All employers who sign-up are verified before acces to the site is given.
 
</span></h1><br>
<?php 
	
	$con = dbConnectNow();
	$auth = false;
	$openSite = false;
	$query = mysqli_query($con, "SELECT * FROM `admin`");
	$verifyQuery = mysqli_query($con, "SELECT `id` FROM `employers`");
	if($query){ 
		while($results = mysqli_fetch_array($query)){
			if(strcmp($_SESSION['admin'], $results['Username']) && $results['access_code'] > 0){
				$auth = true;
				$openSite = false;
			}
			/*if($results['Username'] != ""){
				$openSite = true;
			}*/
			while($resultsVerify = mysqli_fetch_array($verifyQuery)){
				if($resultsVerify['id'] > 0){
					if($results['access_code'] > 0){
						$openSite = true;
					}
				}
			}
			
		}
	
	}
	if($auth && !$openSite){
	?>
<div class='containers'>



<div class="jobInfos" style="background-color: #192535"><a href="<?php echo EMPSIGNUP; ?>">Register as Employer</a></div>

<div class="jobInfos" style="background-color: #192535"><a href="<?php echo SCHOOCHECK; ?>">Register as Seeker</a></div>
</div>

<?php } 
	elseif(!$auth){ ?>

<div class="jobInfos" style="background-color: #192535; text-align: center"><a href="<?php echo ADSIGNUP; ?>">Admin Sign-up</a></div>

 <?php } 
 	elseif($openSite){
 ?>
 <div class="containers">
 

<div class="buttons" style="background-color: #192535"><a href="<?php echo EMPSIGNUP; ?>">Register as Employer</a></div>
<div class="buttons" style="background-color: #192535"><a href="<?php echo SCHOOLCHECK; ?>">Register as Seeker</a></div>
<div class="buttons" style="background-color: #192535; text-align: center"><a href="<?php echo EMPLOGIN; ?>">Employer Login</a></div>

<div class="buttons" style="background-color: #192535"><a href="<?php echo USERLOGIN; ?>">Seeker Login</a></div>



<div class="buttons" onclick="popUp()" onkeypress="popUp()" style="background-color: #192535"><a  href="#" onclick="popUP()" onkeypress="popUp()">CyberWatch West Homepage</a></div>
</div>




<?php }
	else{
?>
<div class="containers">
	<div class="jobInfos" style="background-color: #192535; text-align: center"><a href="<?php echo ACODE; ?>">Enter Access code</a></div>
</div>
<?php }
 ?>


<div class="body">
<img  class="myLogo" src="images/cwwlogo.png" alt="cww logo"/>
</div>

</div>

<div style="margin-top: 5em">

















<?php require("footer.php"); ?>

