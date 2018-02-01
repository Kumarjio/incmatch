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
.main{
	margin: 0 25% 0 25%;
	text-align: center;
}
h1{
	margin: 0;
	padding: 0;
	left: 0;
}
@media screen and (min-width: 1000px) and (max-width: 1350px){
	.buttons{
		width: 30%;
		left: 0;
	}
	.main{
		width: 100%;
		margin: 1% 0 1% 0;
	}
}
@media screen and (min-width: 1351px) and (max-width: 1750px){
	.buttons{
		width: 20%;
		left: 0;
	}
	.main{
		width: 100%;
		margin: 1% 0 1% 0;
	}
}
@media screen and (min-width: 1751px) and (max-width: 2500px){
	.buttons{
		width: 20%;
		left: 0;
	}
	.main{
		text-align: left;
		width: 100%;
		margin: 1% 0 1% 0;
	}
	
}
</style>
<?php


$jobTitle = getEverythingAfterEqualSignInUrl("?");
$jobPrefMatch = jobPrefMatch($_SESSION['id']);
$employerMatch = employerMatch($_SESSION['id']);
$jobTitle = urldecode($jobTitle);


?>
<div class="main">


<?php


$zip = grabZipEmp($_SESSION['id']);
$empZip;
while($results = $zip->fetch(PDO::FETCH_ASSOC)){
	$empZip = $results['zip'];
}
$appArray = displayApplicants($jobTitle, $empZip);
$count = 0;
$countZip = 0;

$zipCount = count($zipArray);
if(strcmp($appArray[0]['name'], "") != 0){
	if($jobTitle == $appArray[$count]['jobType']){?>
	<h1 style="color: #01579B">Here are the potential candidates for your <?php echo $jobTitle; ?> Listing</h1>
	<?php
		while($count < count($appArray)){
			//while($countZip < $zipCount){
				//if($zipArray[$countZip] == $jobPrefMatch[$count]['jobZip']){
				echo "<div class='buttons'>" . $appArray[$count]['name'] . "<br>" . $appArray[$count]['jobType'] . "<br><strong>" . $appArray[$count]['zip'] . "</strong><br>"  . $appArray[$count]['relocate'] . "<br><a style='color: #000000' href='mailto:" . $appArray[$count]['email'] . "'>" . $appArray[$count]['email'] . "</a>	
				<br><a style='color: #000000' href='viewresume2.php?" . $appArray[$count]['userId'] . "&" . $appArray[$count]['jobType'] . "'>View Resume</a></div> ";
				//$countZip++;
				//}
			//}
			
			$count++;
		}	
	}
	else{
		
	}
}

else{
	$msg = "There are no applicants looking for <span style='color: blue'>" . strToUpper($jobTitle) . " </span>listings at the moment.";
	echo "<div style='border-bottom: 1px solid grey; margin: 15%'><h1 style='text-align: center; font-size: 24px; font-family: Oswald; margin: 0; left: 0'>" . $msg . "</h1></div>";
}



?>

</div>










<?php require("footerrelative.php"); ?>