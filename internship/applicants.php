<?php require("header.php"); ?>
<style>
.buttons{
		padding: 2em;
		position: relative;
		display: inline-block;
		border: 2px solid #fffff9;
		width: 80%;
		text-align: center;
		background-color: #ffffff;
		border-radius: 5px;
		color: #000000;
		box-shadow: 4px 5px 5px grey;
		margin: 1% 0 0 0;
		left: 1em;
		
	}
@media screen and (min-width: 1000px){
	.buttons{
		width: 25%;
		left: 0;
	}
}

</style>
<?php


$jobTitle = getEverythingAfterEqualSignInUrl("?");
$jobPrefMatch = jobPrefMatch($_SESSION['id']);
$employerMatch = employerMatch($_SESSION['id']);
$jobTitle = urldecode($jobTitle);


?>
<div style="margin: 0 25% 0 25%">
<h1 style="margin: 0; left: 0; padding: 0; color: #01579B">Here are the potential candidates for your <?php echo $jobTitle; ?> Listing</h1>

<?php



$appArray = displayApplicants($jobTitle);
$count = 0;

if(strcmp($appArray[0]['name'], "")){
	if($jobTitle == $appArray[$count]['jobType']){
		while($count < count($appArray)){
			echo "<div class='buttons'>" . $appArray[$count]['name'] . "<br>" . $appArray[$count]['jobType'] . "<br><a style='color: #000000' href='mailto:" . $appArray[$count]['email'] . "'>" . $appArray[$count]['email'] . "</a><br><a style='color: #000000' href='viewresume2.php?id=" . $appArray[$count]['userId'] . "'>View Resume</a></div> ";
			$count++;
		}	
	}
	else{
		
	}
}

else{
	$msg = "There are no applicants looking for <span style='color: blue'>" . strToUpper($jobTitle) . " </span>internships at the moment.";
	echo "<div style='border-bottom: 1px solid grey; margin: 15%'><h1 style='text-align: center; font-size: 24px; font-family: Oswald; margin: 0; left: 0'>" . $msg . "</h1></div>";
}



?>

</div>










<?php require("footerrelative.php"); ?>