<?php
	require("publicheader.php");
?>


<?php $itQuery = "Web Developer"; 
	$state = "Missouri";
?>



<style type='text/css'> 
.jobInfo{
	width: 10%;
	text-align: center;
}
#indJobContent { padding-bottom: 5px; }
 #indJobContent .company_location{ font-size: 11px; overflow: hidden; } 
 #indJobContent .job { display:block; overflow: hidden; } 
 #indeed_widget_wrapper { border-radius: 10px; position: relative; font-family: Arial,sans-serif; font-size: 13px; font-weight: normal; line-height: 18px; padding: 5px; overflow: hidden; border: 1px solid #ffffff; color: #FFFFFF; background-color: #192535; width: 100% } #indeed_widget_wrapper, #indeed_link a{ color: #FFFFFF; text-decoration: none; } 
.indeed_search_wrapper { clear: both; font-size: 15px; } 
.indeed_search_wrapper label { line-height: inherit; text-align: left; padding: 5px; }
.indeed_search_wrapper input[type='text'] { font-size: 12px; }
.indeed_search_wrapper .qc { float:left; } 
.indeed_search_wrapper .lc { float:left; }
 #indeed_link { position: absolute; bottom: 1px; right: 5px; clear: both; font-size: 12px; }
 #results .job { padding: 5px; }
 #pagination { clear: both; font-size: 16px; padding: 5px; }
.jobtitle { font-size: 16px; } .company { font-size: 15px; }
.location { font-size: 15px; color: #FEBF00; } 
.job_age { font-size: 13px; color: #ffffff; } 
.iaLabel { color: #f60; }
#indJobContent a { color: #FEBF00; }
#indeed_widget_header{ font-size: 18px; padding-bottom: 5px; color: #FFFFFF; }
.myBox{
	padding: 0 2em 0 2em;
	margin: 3% 5% 0 5%;
}
.underline{
	border-bottom: 2px solid grey;
	 width: 100%;
	 position: relative;
	 top: -3em;
}
#pointer{
	font-size: 36px;
}
@media screen and (min-width: 199px) and (max-width: 299px){
	.underline{
		top: 0;
	}
	#pointer{
		font-size: 24px;
	}
	.jobInfo{
		width: 100%;
		margin: 0;
		left: 0;
	}
}
@media screen and (min-width: 300px) and (max-width: 800px){
	.underline{
		top: 0;
	}
	#pointer{
		font-size: 24px;
	}
	.jobInfo{
		width: 25%;
	}
}
@media screen and (min-width: 801px) and (max-width: 1144px){
	.underline{
		top: 0;
	}
}
@media screen and (min-width: 1145px){
	.underline{
		top: 0;
	}
}

</style> 




<script type="text/javascript">
$(document).ready(function(){
	$("#pointer").css("cursor", "pointer");
    $("#pointer").click(function(){
       $("#blurb").hide();
        var button = $('<input type="submit" name="showH1" value="Click to see the introduction" />');
        button.css({"margin": "0 0 5em 5em", "cursor": "pointer"});
      	
        $("div").eq(2).append(button);
        button.click(function(){
        	$("#blurb").show();
        	button.hide();
        });
       
    });
    $("#blurb").dblclick(function(){
    
    	$(this).hide();
    });
     
});

</script>



<div class="myBox">
<h1 class="shadow" style="" id="pointer"> IT Listings From Indeed.com</h1><div class="underline"></div><br>
<h1 id="blurb" style="margin: 0 0 0 2em; background-color: #; border-radius: 10px; padding: 2em; color: #">
Below is a compilation of job listings from Indeed.com, based on your current location. 
 <br></br>
 </div>




<div style='margin: auto; width: 80%; border-radius: 10px' id='indeed_widget_wrapper'>


<div id='indeed_widget_header'>Internships and Jobs Listed on Indeed.com</div><br></br><br></br>
<?php
		$ipAddr = $_SERVER['REMOTE_ADDR'];
		
		$details = json_decode(file_get_contents("https://api.ipdata.co/$ipAddr"));
		$zip= $details->postal;
		
		$keep = createqueryIndeed("IT", $zip);
		$count = 0;
		$xml = simplexml_load_file($keep) or die("Error: Cannot create object");
		while($count < 30){
			if(!$xml->results->result[$count]->company){
				//echo "<div style='font-family:'Indie Flower', Lobster, Anton, Oswald; padding: 2em; margin: 3em 0 5em 15em' class='jobInfos'>There are no available jobs</div><br>";
				
				break;
			}
			else{
			echo "<h1 style='left: 0; margin: 0; color: #FEBF00'><a style='color: #FEBF00; font-family: Oswald' href='" . $xml->results->result[$count]->url . "'>"  . $xml->results->result[$count]->jobtitle . "</a></h1><br>" . $xml->results->result[$count]->company  . " - <span style='color: #FEBF00'>" . $xml->results->result[$count]->formattedLocation . "</span><br>" . $xml->results->result[$count]->snippet. "<br><span sytle='color: #feb600'>" . $xml->results->result[$count]->formattedRelativeTime . "</span><br></br>";
			//echo $xml->results->result[$count]->company;
			//echo $xml->results->result[$count]->url;
			
			$count++;
			}

		}
		?>
		
		<?php
		echo "<div style='color: #ffffff; font-family:'Indie Flower', Lobster, Anton, Oswald; padding: 2em; margin: 3em 0 5em 15em' class='jobInfo'><a href='" . $_SESSION[cwwhomepage] . "' style='color: #ffffff'>Home</a></div>";
	

?>

</div>







 
<?php require("publicfooter.php"); ?>