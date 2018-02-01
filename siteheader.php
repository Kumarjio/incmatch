<?php 	
ob_start();
//require("dblogin.php");
//require("config.php");
 require("functions.php");


?>

<!DOCUTYPE html>
<html lang="en">

<head>
<title>CWW INTERNSHIPS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="internshipv1.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>src="https://code/jquery.com/jquery-3.1.1.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Anton|Indie+Flower|Lobster|Oswald|Slabo" rel="stylesheet">
<style>

.head{
		
		
		background: #192535;
		
		text-align: center;
		overflow: auto;
		
		
	}
.image{
	margin: .5% 0 0 0;
}
h1{
	margin: 0;
	left: 0;
}
.sbs{
	color: #feb600; 
	margin: 0 0 .5em 0;
	
	
}
.menu{
		
		display: inline-block;
		background-color: #192535;
		color: #febf00;
		float: left;
		margin: 0 0 0 48.5%;
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


@media screen and (min-width: 100px) and (max-width: 299px){

	
	h1{
		font-size: 12px;
	}
	.image{
		display: none;
	}
	.menu{
		margin: 0 0 0 48%;
	}
	.sbs{
		margin: 0 0 0 8%;
	}
}
@media screen and (min-width: 300px) and (max-width: 350px){

	
	h1{
		font-size: 12px;
	}
	.image{
		display: none;
	}
	.menu{
		margin: 0 0 0 43%;
	}
	.sbs{
		margin: 0 0 0 3%;
	}
}
@media screen and (min-width: 351px) and (max-width: 450px){

	
	h1{
		font-size: 12px;
	}
	.image{
		display: none;
	}
	.menu{
		margin: 0 0 0 45%;
	}
	.sbs{
		margin: 0 0 0 5%;
	}
}
@media screen and (min-width: 451px) and (max-width: 550px){

	
	h1{
		font-size: 12px;
	}
	.image{
		display: none;
	}
	.menu{
		margin: 0 0 0 46%;
	}
	.sbs{
		margin: 0 0 0 5%;
	}
}
@media screen and (min-width: 551px) and (max-width: 640px){

	
	h1{
		font-size: 12px;
	}
	.image{
		display: none;
	}
	.menu{
		margin: 0 0 0 46%;
	}
	.sbs{
		margin: 0 0 0 4%;
	}
}
@media screen and (min-width: 641px) and (max-width: 800px){

	.head{
		padding: .5%;
	}
	h1{
		font-size: 12px;
	}
	.image{
		display: none;
	}
	.menu{
		margin: 0 0 0 48%;
	}
	.sbs{
	}
}
@media screen and (min-width: 801px) and (max-width: 899px){
	.sbs{
		margin: 0 0 0 4%;
	}
	.menu{
		margin: 0 0 0 50%;
	}
}


@media screen and (min-width: 900px) and (max-width: 999px){
	.sbs{
		margin-left: 4%;
	}
	.menu{
		margin: 0 0 0 50%;
	}
}

@media screen and (min-width: 1100px) and (max-width: 1200px){

	
	img.image{
		left: 0;
		margin: .8% 0 0 0;
		width: auto;
		
		
	}
	.menu{
		border-right: none;
		border-left: none;
		width: 10em;
		/*margin: 0;
		left: 0;*/
		margin: 0 0 0 43%;
	}
	.sbs{
		position: relative;
		right: 2%;
	}
	
	.sb{
		font-size: 36px;
	}
	
}
@media screen and (min-width: 1201px) and (max-width: 1400px){
	.menu{
		margin: 0 0 0 48.5%;
	}
	.sbs{
		position: relative;
		right: 10%;
	}
	
	img.image{
		left: 0;
		margin: .8% 0 0 0;
		width: auto;
		
		
	}
}
@media screen and (min-width: 1401px){
	.sbs{
		margin-right: 1%;
	}
}
</style>
</head>
<body>
<div class="head">

	<!--<a href="index.php"><img class="image" src="images/CWW.png" alt="cyberwatch west logo" width="100" /></a>-->
	<h1 class="sbs" style=""><?php echo INC; ?></h1><br></br>
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


