<?php
	require("publicheader.php");
	
?>

<style>
.sidebyside{
	display: block;
	margin: 0;
	
}
.jobInfos{
	margin: 0 0 5% 15%;
	left: 0;
	width: auto;
	padding: 0;
	display: inline-block;
}
#blurb{
	margin: 3% 0 0 0;
}

.empLogo{
	width: 80%;
	margin: auto;	
	padding: 0;
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

}
@media screen and (min-width: 300px) and (max-width: 540px){
	#blurb{
		width: 100%;
		margin: 3% 0 0 0;
	}
	.jobInfo{
		width: 100%;
		margin: 0;
		left: 0;
		right: 0;
		
		
	}
	.underline{
		top: 0;
	}
	#pointer{
		font-size: 24px;
	}
}
@media screen and (min-width: 541px) and (max-width: 640px){
	
	.myBox{
		margin: 5%;
	}
	.empLogo{
		width: 50%;
		margin: auto;	
		padding: 0;
	}
	.jobInfo{
		width: 35%;
		padding: 0 0 0 2%;
	}
	.underline{
		top: 0;
	}
}
@media screen and (min-width: 641px) and (max-width: 1144px){
	.underline{
		top: 0;
	}

}
@media screen and (min-width: 1145px){
	
	 #blurb{
		
		left: 0;
		padding: 0;
		right: 0;
	}
	.myBox{
		margin: 3% 15% 15% 15%;
	}
	
	.jobInfo{
		width: 25%;
	}

}
@media screen and (min-width: 1000px){
	.sidebyside{
		display: inline;
		float: none;
		padding: none;
	}
	
	.box{
		width: 25%;
		display: inline-block;
		margin-left: 5em;
		overflow: auto;
		
	}
	.jobInfos{
		margin: 0 0 5% 5%;
	}
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
        var button = $('<input type="submit" name="showH1" value="Press me to see the introduction" />');
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
<h1 class="shadow" style="" id="pointer"> Participating Employers</h1><div class="underline"></div><br>
<h2 id="blurb" style="border-radius: 10px; padding: 2em; color: #000000">
This is an all-inclusive list of potential employers who participate in the Job/Internship Matching Program (<?php echo INC; ?>) <br> Click on a potential employer to see the job listings they have posted.<br></br><br></br>



</h2> 
	<div class="sidebyside">
	<?php getEmployers();
		sessionTimeOutUser();
		
	 ?>
	</div>
	</div>

<?php nameToSpace("keith Raymond"); ?>


<?php require('publicfooter.php'); ?>