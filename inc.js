$(document).ready(function() {
  $(".p").mouseleave(function(e) {
     
    $(".virt").css("display", "none");
    })
    .mouseenter(function(e) {
      if (window.k) {
        console.log("test");
        clearTimeout(window.k);
      }

      $("select").css("z-index", "100");
      var div = $("div:nth-child(3)");
      div.addClass("virt");
      $(".virt").css({
        border: "2px solid grey",
        "z-index": "1",
        position: "absolute",
        left: "25%",
        top: "30%",
        backgroundColor: "#ffff99",
        width: "15%",
        height: "15%",
        display: "block"
      });
      var div = $("div:nth-child(3)");
      div.addClass("virt");
      $(".virt").text(
        "Candidates will be matched to you according to this Listing type. \n You can view candidates by clicking the listings you want to view on your home page."
      );
    });
    
    
   //check browser support
    if(typeof(Storage) !== "undefined") {
    //get all the values in the form and store them for this session.
        if (sessionStorage.full) {
             $("#companyName").val(sessionStorage.getItem("full"));
        }
        if (sessionStorage.user) {
             $("#user").val(sessionStorage.getItem("user"));
        }
        if (sessionStorage.email) {
             $("#email").val(sessionStorage.getItem("email"));
        }
        if (sessionStorage.address) {
             $("#address").val(sessionStorage.getItem("address"));
        }
       
      
            $(".stored").keyup(function(){
            		sessionStorage.setItem($(this).attr('name'), $(this).val());
            });
      
    } else {
        document.getElementById("companyName").innerHTML = "Sorry, your browser does not support web storage...";
    }
    
    
    
    
 });   
    
  $(document).ready(function(){
	 var button = $('<input  class="showH1" class="submit" type="submit" name="showH1" value="Press Me to see the introduction and instructions" />');
	 button.css({"margin": "0 0 0 0", "cursor": "pointer", "border-radius": "10px", "background-color": "#feb600", "color": "#192535", "border": "1px solid #feb600", "box-shadow": "2px 2px 2px 2px grey"});
	
	 $(".footer").prepend(button);
	$("#pointer").css("cursor", "pointer");
	 button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	button.hide();
        	 $('body').scrollTop(0);
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
