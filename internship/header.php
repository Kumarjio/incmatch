<?php 
ob_start();
//require("dblogin.php");
//require("config.php");
 require("functions.php");
?>

<!DOCUTYPE html>
<html lang="en">

<head>
<title>WCC CISS INTERNSHIPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="internshipv1.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>src="https://code/jquery.com/jquery-3.1.1.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Montserrat|Raleway|Indie+Flower|Lobster|Oswald" rel="stylesheet">
<style>

.menuss{
		position: relative;
		display: inline-block;
		
		margin: 0;
		left: 0;
		text-decoration: none;
}
.menuss:hover{
		background-color: #FEBF00;
		
}
.head{
	background: #192535;
		
		text-align: center;
		overflow: auto;
}

#hamburger{
	display: none;
	width: 15%;
    	height: 1%;
    	background-color: red;
   	margin: 0 0 6px 0;
   	
}

.image{
	float: left;
}
.contain{
	float: left;
}

@media screen and (min-width: 300px) and (max-width: 640px){
	#hamburger{
		display: block;
	}
	li.menuss{
		display: none;
		text-decoration: none;
	}
	.small_screen{
		z-index: 1;
		background-color: #192525;
		width: 50%;
	}
	.image{
		display: none;
	}
	h2.menuss{
		float: right;
		margin: 0;
		right: 0;
		left: 0;
	}
	h2 > .menuss{
		float: right;
	}
	
}

@media screen and (min-width: 1000px){
	
	
	.small_screen{
		
		width: 90%;
	}
	
	
	.menuss{
		position: relative;
		display: inline-block;
		width: 10%;
		margin: 0;
		padding: 0;
		left: 0;
		text-decoration: none;
	}
	
	
}
</style>
<script>
	$(document).ready(function(){
		$("#hamburger").click(function(){
			$(".menuss").toggle();	
			$(".menuss").css({"text-decoration": "none"});
			//$("li").toggle();
			//$("li").css("display", "inline-block");
			$(".small_screen").css({"background-color": "#192525", "width": "99%", "text-align": "center"});	
			
			
			
		});
		
	});
</script>
</head>
<body>


<div class="head">
			
<div class="conatain">
	<div id='hamburger'></div>
	<div id='hamburger'></div>
	<div id='hamburger'></div>
</div>	

	<?php if($_SESSION['id']){ ?>
		
	<div class="small_screen">
	<a href="index.php"><img class="image" src="images/CWW.png" alt="cyberwatch west logo" width="150" /></a>
	<div style="padding: .2%">
	<h2 class="menuss" style="color: #ffffff"> WELCOME <?php echo strToUpper($_SESSION['full']); ?></h2>
	
	
		<li class="menuss"><a href="<?php echo $_SESSION['home']; ?>">Home</a></li>
		<li class="menuss"><a href="createjob.php">Create New Listings</a></li>
		<li class="menuss"><a href="mylistings.php">Existing Listings</a></li>		
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



<?php 	 /*sessionCheck();*/ sessionTimeOut();
?>