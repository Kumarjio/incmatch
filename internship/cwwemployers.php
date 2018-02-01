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
img{
	width: 80%;
	margin: auto;	
	padding: 0;
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
}
@media screen and (min-width: 541px){
	
	.myBox{
		margin: 5%;
	}
	img{
		width: 50%;
		margin: auto;	
		padding: 0;
	}
	.jobInfo{
		width: 35%;
		padding: 0 0 0 2%;
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
	img{
		width: 30%;
		margin: auto;	
		padding: 0;
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
<h1 id="blurb" style="background-color: #192535; border-radius: 10px; padding: 2em; color: #ffffff">
This is an all-inclusive list of potential employers who participate in the Job/Internship Matching Program I.N.C. <br> Click on a potential employer to see the job listings they have posted.<br></br><br></br>


<span style="color: red" id="pointer"> Click to remove this introduction.</span><br>
</h1> 
	<div class="sidebyside">
	<?php getEmployers();
		sessionTimeOutUser();
		
	 ?>
	</div>
	</div>

<?php nameToSpace("keith Raymond"); ?>


<?php require('publicfooter.php'); ?>