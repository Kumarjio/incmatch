<?php  require("header.php"); 
 ?>

 <script type="text/javascript">
$(document).ready(function(){
	 var button = $('<input class="submit" type="submit" name="showH1" value="Click here to see the introduction and instructions" />');
	 button.css({"margin": "0 0 0 0", "cursor": "pointer", "border-radius": "10px", "background-color": "#192535", "color": "#ffffff"});
	// $(".footer").prepend(button);
	$("#pointer").css("cursor", "pointer");
	 button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	button.hide();
        });
    $("#pointer").click(function(){
       $("#blurb").hide();
        //$("div:nth-child(5)").append(button);
        button.show();
      	
      //  $("div").eq(1).append(button);
        button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	button.hide();
        });
       
    });
     
});

</script>
<style>
.main{
	padding: 0 2% 0 2%;
	width: 100%;
	margin-top: 2%;
}
.shadow{
	margin: auto;
}	
#blurb{
		display: none;
		
	}
@media screen and (min-width: 100px) and (max-width: 600px){
	.main{
		width: 100%;
	}

}
@media screen and (min-width: 601px) and (max-width: 750px){
	.main{
		width: 75%;
	}

}
@media screen and (min-width: 751px) and (max-width: 900px){
	.main{
		width: 55%;
	}

}

</style>

<div class="main">
<h1 class="shadow" style="font-size: 36px" id=""> Existing Listings</h1><div class="underline"></div>
<h2 style="color: #000000">
Here are all the listings that you have posted! <br> </br> 

</h2> 

<?php 	
	 getJobBoardInfo();
	//echo $_SESSION['id'];
	
	
?>








<?php require("footerrelative.php"); ?>