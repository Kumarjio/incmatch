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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="internshipv1.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>src="https://code/jquery.com/jquery-3.1.1.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Indie+Flower|Lobster|Oswald" rel="stylesheet">
<style>

.head{
		
		
		background: #192535;
		
		text-align: center;
		overflow: auto;
		
	}
.sbs{
	
}
.menu{
		
		display: inline-block;
		
		background-color: #192535;
		color: #febf00;
		
		text-align: center; 
		text-decoration: none;
			
		
		
	}
	a{
		text-decoration: none;
		color: #ffffff;
		font-family: Anton, "Indie Flower", Lobster;
	}
	a:hover{
		text-decoration: underline;
	}
	
	.menu:hover{
		background-color: #FEBF00;
		
	}
	.image{
		float: left;
	}


@media screen and (min-width: 360px) and (max-width: 999px){

	
	h1{
		font-size: 12px;
	}
	.imgae{
		display: none;
	}
}
@media screen and (min-width: 1000px){

	
	img.image{
		left: 0;
		margin: 0;
		width: auto;
		
		
	}
	.menu{
		border-right: none;
		border-left: none;
		width: 10em;
		margin: 0;
		left: 0;
	}
	
	.sb{
		font-size: 36px;
	}

}
</style>
</head>
<body>
<div class="head">

	<a href="index.php"><img class="image" src="images/CWW.png" alt="cyberwatch west logo" width="100" /></a>
	<h1 class="sbs" style="color: #feb600; margin: 0 0 .5em 0">I.N.C Matching Program</h1>
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
			

</div>	

<?php sessionTimeOut(); ?>
