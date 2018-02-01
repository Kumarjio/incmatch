<?php  require("header.php"); 
 ?>

 <script type="text/javascript">
$(document).ready(function(){
	$("#pointer").css("cursor", "pointer");
    $("#pointer").click(function(){
       $("#blurb").hide();
        var button = $('<input type="submit" name="showH1" value="Press Me to see the introduction" />');
        button.css({"margin": "0 0 2em 5em", "cursor": "pointer"});
      	
        $("div").eq(1).append(button);
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
<style>
.main{
	padding: 0 2% 0 2%;
	width: 25%;
	margin-top: 2%;
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
<h1 id="blurb" style="background-color: #feb600; border-radius: 10px; padding: 2em">
Here are all the listings that you have posted! <br> </br> 
<span style="color: #300" id="pointer"> Click to remove introduction</span><br>
</h1> </div>
<div style="width: 90%; border: 2px solid #ffffff9; margin: auto; box-shadow: 4px 5px 5px grey; margin-bottom: .8em">
<?php 	
	 getJobBoardInfo();
	//echo $_SESSION['id'];
	sessionTimeOut();
	
?>
</div>








<?php require("footerrelative.php"); ?>