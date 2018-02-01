<?php require("publicheader.php"); ?>

	
<div>
	






<?php
	$count = 0;
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	
	$employerJobs = substr($actual_link, 0);
	
	
	while((strcmp($employerJobs[$count], "="))){
		$count++;
	}
	$clickedJob = substr($actual_link, $count + 1);
	getJobBoardInfos($clickedJob);
?> 
	

</div>
<?php require("publicfooter.php"); ?>