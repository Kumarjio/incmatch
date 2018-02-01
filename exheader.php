<?php 	
ob_start();
//require("dblogin.php");
//require("config.php");
 require("functions.php");
 //sessionTimeOutUser();

?>

<!DOCUTYPE html>
<html lang="en">

<head>
<title>CWW INTERNSHIPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="internship.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>src="https://code/jquery.com/jquery-3.1.1.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Indie+Flower|Lobster|Oswald" rel="stylesheet">
<style>
.head{
		
		background: #192535;
		
		text-align: center;
		
		
	}

.footer{
		
		text-align: center;
		background-color: #192535;
		color: #a3a5a8;
		
		
	}


</style>
</head>
<body>
<div class="head">

<header>
<a href="index.php"><img class="image sbs" style="float: left; margin: 1em 0 0 0" src="images/CWW.png" alt="cyberwatch west logo" /></a><br></br>
	<h1 class="sbs" style="color: #feb600; margin: 0 5em .5em 0">Internship Matching Program</h1><br>
		<?php 
		
			$admin = checkForAdmin();
			if($admin){	
						
	?>			
				
							
				<li class="menu"><a href="logout.php" >Home</a></li>
				
				
	<?php 		}
			else{			
				
								
				
				//header("location: ". HOME);			
				//header("location: home.php");
			}
		 
	?>
			
</header>
</div>	

<div style="clear: both"></div>
<div class="footer">
<footer>

	
	<p>Whatcom Community College</p>
	&copy; 2017 
	<h2 style="color: #ffffff; font-size: 24px">This publication was created with funds from a National Science Foundation grant, DUE-1500375. </h2>
	
</footer>
</div>
</body>
</html>