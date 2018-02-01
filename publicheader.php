<?php 

//require("dblogin.php");
//require("config.php");
require("functions.php");
if($_SESSION['cwwid']){
sessionTimeOutUser();
?>

<!DOCUTYPE html>
<html lang="en">
<head>
<title>WCC CISS INTERNSHIPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="internshipv1.css">
<script type="text/javascript"
src="https://gdc.indeed.com/ads/apiresults.js"></script>                                   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>src="https://code/jquery.com/jquery-3.1.1.1.js"></script>
<script>src="http://cwwinternship.cyberwatchwest.org/inc/inc.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Montserrat|Raleway|Indie+Flower|Lobster|Oswald|Slabo" rel="stylesheet">

<style>

.hider{
	display: none;
    position: absolute;
    background-color: #192535;
   	width: 12em;
    border-radius: 10px;
    
    
    color: #192535;
    z-index: 99;
}
.menuss:hover > .hider{
	display: block;
	color: #ffffff;
}
.hider a:hover{
	color: #feb600;
	
	
}
.hider a{
	color: #ffffff;
}

a{
	
		text-decoration: none;
		color: #ffffff;
		font-family: Anton, "Indie Flower", Lobster;
	
}

a:hover{
	
	border-radius: 20px;
}


.menuss{
		position: relative;
		display: inline-block;
		
		width: 12em;
		left: 0;
		text-decoration: none;
}
.menuss:hover{
		background-color: #FEBF00;
		
}
.head{
	background: #febf00;
	box-shadow: 4px 4px 5px grey;	
	text-align: center;
		
}

#hamburger{
	display: none;
	width: 15%;
    	height: 1%;
    	background-color: red;
   	margin: 0 0 6px 0;
   	
}


a{
	color: #192535;
	display: inline-block;
}
a:hover{
	color: #ffffff;
	text-decoration: none;
}
a:active{
	background-color: grey;
}
#welcome{
	left: 0;
	margin: 0;
}

/*img.image{
	width: auto;
	top: 0;
	left: 0;
	margin: 0;
	float: left;
}*/
.image{
	margin: 0;
	left: 0;
	float: left;
}


@media screen and (min-width: 300px) and (max-width: 840px){
	#hamburger{
		display: block;
	}
	li.menuss{
		display: none;
		text-decoration: none;
	}
	li{
		text-decoration: none;
	}
	.small_screen{
		text-align: center;
	}
	.image{
		display: none;
	}
	
}

@media screen and (min-width: 841px) and (max-width: 991px){
	.menuss, .hider{
		width: 7em;
	}
	
}

@media screen and (min-width: 992px) and (max-width: 1024px){
	.menuss, .hider{
		width: 8em;
	}
	
}
	
@media screen and (min-width: 1025px) and (max-width: 1480px){
	.head{
		margin: 0 0 5% 0;
		
	}
	
	
	img.imgae{
		left: 0;
		margin: 0;
		width: auto;
	}
	
	.menuss{
		position: relative;
		display: inline-block;
		margin: 0 .2% 0 .2%;
		left: 0;
		text-decoration: none;
	}
	.menuss, .hider{
		width: 8em;
	}
	
}


</style>
<script>
	$(document).ready(function(){
		$("#hamburger").click(function(){
			$(".menuss").toggle();	
			$(".menuss").css("text-decoration", "none");
			//$("li").toggle();
			//$("li").css("display", "inline-block");
			$(".small_screen").css({"width": "100%", "text-align": "center"});	
			
			
			
		});
		
		
	});
</script>
</head>
<body>

<?php 	
	$_SESSION['header'] = "publicheader.php";
?>

<div class="head">
<div class="conatain">
	<div id='hamburger'></div>
	<div id='hamburger'></div>
	<div id='hamburger'></div>
</div>	

<div class="small_screen">
	<a href="https://cyberwatchwest.org"><img class="image" src="images/CWW.png" alt="cyberwatch west logo" width="250" /></a>
	<div style="padding: .2%">
<h1 class="menuss" id="welcome" style="color: #000000">
	 WELCOME  <?php echo strToUpper($_SESSION['cwwusername']); ?>
	</h1>
	
	<br></br><br></br>

	
	

	
	<?php if($_SESSION['cwwid']){ ?>
		<li class="menuss"><a href="<?php echo SKRHOME; ?>?id=<?php echo $_SESSION['cwwid']; ?>">Home</a></li>		
		<li class="menuss"><a href="jobpref.php">Set Preference</a></li>		
		<li class="menuss"><a href="<?php echo CWWEMPS; ?>">Participating Employers</a></li>
		<li class="menuss"><a href="startresume.php">Create Resume</a>
			<div class="hider">
				<a href="<?php echo VIEWRESUME; ?>?id=<?php echo $_SESSION['cwwid']; ?>">View Resume</a>
				
			</div>
		</li>
		<li class="menuss"><a href="cwwemployersearch.php">Search External Listings</a></li>
		<li class="menuss"><a href="indeedjobs.php">IT Listings From Indeed.com</a></li>		
		<li class="menuss"><a href="logout.php" >Log Out</a></li>
	</div>
	</div>
	<?php } 
		else{
			$admin = checkForAdmin();
			if($admin){	
						
	?>			

			
							
				<li class="menu"><a href="logout.php" >Home</a></li>
				
				
	<?php 		}
			else{			
				
								
				
				header("location: ". HOME);			
			}
		} 
	?>
</div>			
<?php
}
else{
	//header("location: ". HOME);	
	echo "<script>window.location = " . HOME . ";<script>";
	
}
?>
