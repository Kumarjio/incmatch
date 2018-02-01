<?php require("header.php"); ?>
<style>
h2{
	color: #000000;
}
.shadow{
	margin: auto;
}
@media screen and (min-width: 400px) and (max-width: 475px){
	.jobInfo{
		width: 99%;
		margin: 0;
		left: 0;
	}
}
@media screen and (min-width: 476px) and (max-width: 775px){
	.jobInfo{
		width: 48%;
		margin: 0;
		left: 0;
	}
}

@media screen and (min-width: 776px) and (max-width: 1300px){
	.jobInfo{
		width: 28%;
	}
}
@media screen and (min-width: 1301px) and (max-width: 2500px){
	.jobInfo{
		width: 18%;
	}
}
</style>

<h1 class="shadow" style="font-size: 36px" id="pointer"> Candidates In Your Area</h1>
<!--<p style="color: #000000">If a candidate appears in your company's zipcode matches then that candidate will not appear again under your listing's zipcode matches. You will see the same candidate in different areas if the zipcode is different.--><div class="underline"></div>
<?php
$id = getEverythingAfterEqualSignInUrl("?");
$zipArray = zipMatch($id);
$zipEmp = zipMatchEmp($id);?>
<h2 style="color: #000000">Candidates that match your Company's ZIPCODE</h2>
<?php
 matchZip($zipEmp);

 //print_r($zipArray);
//print_r($zipEmp);
 ?>
<h2 style="color: #000000">Candidates that match your Listing's ZIPCODE</h2>
<?php
matchZip($zipArray);



?>
<?php require("footerrelative.php");