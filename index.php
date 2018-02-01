<?php  ob_start;
	require("siteheader.php");
	/*$dir = __DIR__;
	$empDir = $dir . "/employer";
	echo $empDir;
	*/
	
	
?>



<style>







/**************************************************************************************************************************************/
.body{
	margin: 0 auto;
	opacity: 0.3;
	width: 100%;
	
}
p{
	color: #ffffff;
}
.abox{
	border: 2px solid #ffffff;
	
}
.buttons:nth-child(5){
	width: 87%;
}
h1{
	text-align: center;
}
	div.jobInfos > a:hover{
		color: #FEBF00;
	}
	div.jobinfos{
		padding: 2em;
	}
	.btndiv{
		padding: 0 2% 0 2%;
	}
	.buttons{
		padding: 10%;
		/*position: relative;*/
		display: inline-block;
		border: 2px solid #fffff9;
	
		text-align: center;
		/*background-color: #ffffff;*/
		/*background:  linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/employerspic.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;*/
		border-radius: 5px;
		color: #000000;
		box-shadow: 4px 5px 5px grey;
		width: 45%;
		height: 45%;
		margin: 0 1% 1% 0;
		
		
		
		
		
	}
	.buttons:first-child{
		background:  linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/conf.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}
	.buttons:nth-child(2){
		background:  linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/coffe.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}
	.buttons:nth-child(3){
		background:  linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/datacenter.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}
	.buttons:nth-child(4){
		background:  linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/pic2.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;
	}
	.buttons:nth-child(5){
		background:  linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url("images/pic6.jpg");
		background-size: 100% 100%;
		background-repeat: no-repeat;
		
	}
	.buttons2{
		padding: 2%;
		/*position: relative;*/
		display: inline-block;
		border: 2px solid #fffff9;
	
		text-align: center;
		background-color: #ffffff;
		border-radius: 5px;
		color: #000000;
		box-shadow: 4px 5px 5px grey;
		overflow: auto;
	
	}
	.h2s{
		color: #000000;
		display: inline-block;
	}
	.heading{
		padding: 0 0 0 8%;
	}
	.myLogo{
		width: 100%;
	}
	.containers{
		left: 0;
		margin: 0 0 0 4%;
	}
	.contain_page{
		padding: 5%;
		margin: 0 0 0 0;
	}
	.frame{
		display: none;
		z-index: 1;
		position: absolute;
		overflow: auto;
		height: 100%;
		width: 100%;
		background-color: rgb(0,0,0); /* Fallback color */
    		background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
    		
	}
	@media screen and (min-width: 100px) and (max-width: 640px){
	
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
		.buttons, .buttons:nth-child(5){
		   /*    width: 100%;*/
		   	position: relative;
		       margin: 0;
		       width: 100%;
		       left: 0;
		       
		}
		.containers{
			margin: 0;
		}
		.heading{
			padding: 0;
		}
		.buttons2{
			position: relative;
			width: 100%;
			
		}
	}
	@media screen and (min-width: 641px) and (max-width: 799px){
		.buttons{
			/*width: 20%;*/
			/*height: 10%;*/
			
			width: 85%;
			
		}
		.heading{
			padding: 0;
			margin: 2%;
		}
		.buttons2{
			position: relative;
			width: 75%;
			left: 0;
			margin: 0 0 0 0;
			padding: 0;
			
		}
		.btndiv, .containers{
			position: relative;
			margin: 0;
			left: 0;
		}
	}
	@media screen and (min-width: 800px) and (max-width: 1144px){
		.buttons2{
			position: relative;
			width: 25%;
			
		}
		.buttons{
			width: 45%;
		}
		.buttons:nth-child(5){
			width: 91.5%;
		}
		.btndiv, .containers{
			position: relative;
			margin: 0;
			left: 0;
		}
	}
/*	@media screen and (min-width: 892px) and (max-width: 924px{
		.heading{
			margin: 2%;
		}
		.buttons2{
			position: relative;
			width: 25%;
			
		}
	}
	@media screen and (min-width: 925px) and (max-width: 999px){
		.containers{
			margin: 0 0 0 5%;
		}
		.buttons2{
			position: relative;
			width: 25%;
			
		}
	}
	@media screen and (min-width: 1000px) and (max-width: 1144px){
		.myLogo{
			width: 100%;
		}
		.body{
			margin: 0 auto;
			width: 100%;
			opacity: .1;
		}
		.buttons{
		
			margin: 0;
			width: 100%;
			
		}
		.buttons2{
			position: relative;
			width: 25%;
			
		}
	}*/
	@media screen and (min-width: 1145px) and (max-width: 1411px){
		h1{
			margin: 0 5% 0 5%;
			text-align: center;
		}
		.buttons{
			position: relative;
			
			width: 45%;
			
			
		}
		.btndiv{
			padding: 0 0 0 1%;
		}
		.containers{
			margin: 0;
		}
	}
	@media screen and (min-width: 1412px){
		.buttons{
			position: relative;
			
			width: 43%;
			
			
		}
		.btndiv{
			padding: 0 0 0 1%;
		}
		.containers{
			margin: 0;
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
<iframe class="frame" src="" name="iframe_a"></iframe>

<div class="contain_page" style="">

<h1>Welcome to CyberWatch West’s IT, Networking and Cybersecurity Job/Internship Matching Program <?php echo INC; ?> <br>

This web application connects students and recent graduates with employers seeking interns and entry-level employees. We invite you to follow these easy steps.<br>
<!--Students/graduates: Create an account as a “Job Seeker” to build an online resume so potential employers can find you. Select the types of work that interest you most. Get to know the employers participating in <?php echo INC; ?>.<br>
Employers: Create an “Employer” account to start building internship and job descriptions. <br>Browse posted resumes and reach out to top students or graduates with the qualifications you’re looking for. </h1>-->

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



	<div class="btndiv">

		<div class="buttons" style="">
			<div class="abox">
				<a style="" href="<?php echo TERMS . '?employers'; ?>" id="reg" target="iframe_a">Register as Employer</a>
			</div>
			<p style="color: #ffffff">Create an “Employer” account. Start building internship and job descriptions. </p>
		</div>
		<div class="buttons" style="">
			<div class="abox">
				<a href="<?php echo TERMS2 . '?schoolcheck'; ?>" id="regs" target="iframe_a">Register as Seeker</a>
			</div>
			<p style="color: #ffffff">Create a “Job Seeker” account to build an online resume for employers to view.</p>
		</div>
	</div>
</div>

<?php } 
	elseif(!$auth){ ?>

<div class="jobInfos" style="background-color: #192535; text-align: center"><a href="<?php echo ADSIGNUP; ?>">Admin Sign-up</a></div>

 <?php } 
 	elseif($openSite){
 ?>
 
<div class="containers">
	<div class="btndiv">

		<div class="buttons" style="">
			<div class="abox">
				<a style="" href="<?php echo TERMS . '?employers'; ?>" id="reg" target="iframe_a">Register as Employer</a>
			</div>
			<p style="color: #ffffff">Create an “Employer” account. Start building internship and job descriptions. </p>
		</div>
		<div class="buttons" style="">
			<div class="abox">
				<a href="<?php echo TERMS2 . '?schoolcheck'; ?>" id="regs" target="iframe_a">Register as Seeker</a>
			</div>
			<p style="color: #ffffff">Create a “Job Seeker” account to build an online resume for employers to view.</p>
		</div>
		<div class="buttons" style="; text-align: center">
			<div class="abox">
				<a href="<?php echo EMPLOGIN; ?>">Employer Login</a>
			</div>
			<p style="color: #ffffff">Browse posted resumes and reach out to top students or graduates. </p>
			
		</div>

		<div class="buttons" style="background-color: #192535">
			<div class="abox">
				<a href="<?php echo USERLOGIN; ?>">Seeker Login</a>
			</div>
			<p style="color: #ffffff">Select types of work that interest you most. Search employers.</p>
			
		</div>



		<div class="buttons" onclick="popUp()" onkeypress="popUp()" style="background-color: #192535">
			<div class="abox">
				<a  href="#" onclick="popUP()" onkeypress="popUp()">CyberWatch West Homepage</a>
			</div>
			<p style="color: #ffffff">Looking to become a CyberWatch West member or learn more about CyberWatch West please click the link.</p>	
			
		</div>
	</div>
</div>
<div class="containers heading" style="">

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











<script type="text/javascript">
$(document).ready(function(){

	$("#reg").click(function(){
		$(".frame").css("display", "block");
		$("html").css("overflow", "hidden");
		
	});
	var window = "http://cwwinternship.cyberwatchwest.org/inc/index.php";
		(function(window) {
  			if (window.location !== window.top.location) {
   			 window.top.location = window.location;
  			}
		})(this);
		
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#regs").click(function(){
		$(".frame").css("display", "block");
		$("html").css("overflow", "hidden");
		
		//$(".buttons").css("display", "none");
	});
	var window = "http://cwwinternship.cyberwatchwest.org/inc/schoolcheck.php";
		(function(window) {
  			if (window.location !== window.top.location) {
   			 window.top.location = window.location;
  			}
		})(this);
		
});
</script>

<?php require("footer.php"); ?>

