<?php
	require("publicheader.php");
	
?>


<div style="margin: 5% 15% 5% 15%">

<?php
	if(isset($_POST['submit'])){
	
		$keep = createQuery($_POST['job'], $_POST['zip'], $_POST['num']);
		$count = 0;
		$xml = simplexml_load_file($keep) or die("Error: Cannot create object");
		while($count < $_POST['num']){
			if(!$xml->results->result[$count]->company){
				//echo "<div style='font-family:'Indie Flower', Lobster, Anton, Oswald; padding: 2em; margin: 3em 0 5em 15em' class='jobInfos'>There are no available jobs</div><br>";
				
				break;
			}
			else{
			echo "<div style='padding: 2em; margin: 3em; width: 80%' class='jobInfo'><h1 style='left: 0; margin: 0'>" . $xml->results->result[$count]->company. "</h1><br>" . $xml->results->result[$count]->snippet. "<br><br>" . "<a style='color: #000000' href='" . $xml->results->result[$count]->url . "'>" . $xml->results->result[$count]->jobtitle. "</a></div>";
			//echo $xml->results->result[$count]->company;
			//echo $xml->results->result[$count]->url;
			
			$count++;
			}

		}
		echo "<div  style='text-align: center; color: #000000; font-family: Lobster, Anton, Oswald; padding: .2%; width: 10%; margin: 3em; background-color: #ffffff; box-shadow: 2px 2px 4px grey' class=''><a href='" . SKRSEARCH . "' style='color: #000000'>Back</a></div>";
	}

?>





</div>


<?php require("publicfooter.php"); ?>