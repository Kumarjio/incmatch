<?php ob_start();  require("header.php"); ?>


<div></div>


<style>
	.formbox{
		margin: 0; 
		left: 0;
		padding-left: 5%;
	}
	.inputBox{
		margin: 0;
		left: 0;
	}
	.main{
		margin-top: 2%;
	}
	input, .p, select{
		z-index: 100;
		position: relative;
	}
	.virt{
		display: block;
		overflow: auto;
		left: 90%;
		top: 0;
	}
	.hide_k{
		display: none;
	}

	#blurb{
		display: none;
	}
	.main{
		width: 100%;
	}
	.main > .formbox{
		margin: 0 25% 0 25%;
	}
	select{
		box-shadow: 0 0 2px 2px #BDBDBD;
		border: 2px solid #BDBDBD;
		font-size: 18px;
		width: 24%;
	}
	.shadow{
		margin: auto;
	}

@media screen and (min-width: 300px) and (max-width: 640px){
	textarea{
		width: 100%;
	}
	.virt{
		overflow: auto;
		left: 55%;
		z-index: 1;
	}
}
	
@media screen and (min-width: 1000px){
	.formbox{
		left: 15%;
	}
}	
</style>
 <script type="text/javascript">
$(document).ready(function(){
	 var button = $('<input class="submit" type="submit" name="showH1" value="Click here to see the introduction and instructions" />');
	 button.css({"margin": "0 0 0 0", "cursor": "pointer", "border-radius": "10px", "background-color": "#192535", "color": "#ffffff"});
	 $(".footer").prepend(button);
	$("#pointer").css("cursor", "pointer");
	 button.click(function(){
        	$("#blur").css("display", "inline-block");
        	$("#blurb").show();
        	$('body').scrollTop(0);
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

<script type="text/javascript">
$(document).ready(function() {
  $(".p").mouseleave(function(e) {
     
    $(".virt").css("display", "none");
    })
    .mouseenter(function(e) {
      if (window.k) {
        console.log("test");
        clearTimeout(window.k);
      }

     
      var div = $("div:nth-child(3)");
      div.addClass("virt");
      $(".virt").css({
        "border": "2px solid grey",
        "z-index": "1",
        "position": "absolute",
        "left": "30%",
        "top": "25%",
        "backgroundColor": "#fffff9",
        "width": "15%",
        "height": "15%",
        "display": "block"
      });
      var div = $("div:nth-child(3)");
      div.addClass("virt");
      $(".virt").text(
        "Candidates will be matched to you according to this Listing type. \n You can view candidates by clicking the listings you want to view on your home page."
      );
    });
    
    
    
    $("#title").mouseleave(function(e) {
     
    $(".virt").css("display", "none");
    })
    .mouseenter(function(e) {
      if (window.k) {
        console.log("test");
        clearTimeout(window.k);
      }

      $("input").css("z-index", "100");
      var div = $("div:nth-child(3)");
      div.addClass("virt");
      $(".virt").css({
        "border": "2px solid grey",
        "z-index": "1",
        "position": "absolute",
        "left": "37%",
        "top": "35%",
        "backgroundColor": "#fffff9",
        "width": "15%",
        "height": "15%",
        "display": "block"
      });
      var div = $("div:nth-child(3)");
      div.addClass("virt");
      $(".virt").text(
        "This is the actual title of the job that you are posting.  Candidates will see this, but listing type is how you are matched with potential candidates."
      );
    });
});
</script>

</head>

<div class="main">
<h1 class="shadow" style="font-size: 36px" id=""> Create New Listings</h1><div class="underline"></div>
<h1 id="blurb" style="margin: 0 0 1em 2em; background-color: #feb600; border-radius: 10px; padding: 2em">

Create an internship or job listing<br>

To create a new listing, fill out the fields below. Including specific details in the “Description” and “Qualifications” fields will help potential candidate determine whether they should contact you about the position. 
Once you complete a listing, the application will generate a list of intern/job-seekers who might be a good match, based on the information you have submitted regarding the type of position and geographic location by zip code. 
<br></br>

<span style="color: red" id="pointer"> Click to remove introduction</span></h1> </div>


<div class="formbox">
<form style="z-index: 9999; position: relative" class="inputBox"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<label for="type" class="required">Listing Type:</label>  &nbsp;<br>
		<select class="p" type="text" id="type" name="type"  required/> 
			<option value="IT">IT</option>			
			<option value="Networking">Networking</option>
			<option value="Cybersecurity">Cybersecurity</option>
			<option value="Developer">Developer</option>
		</select>
		<br></br>
		<label for="title" class="required">Listing Title: </label>  &nbsp;
		<input type="text" id="title" name="title" required  /> <br></br><br></br>
		<label for="description">Listing Description:</label>   <br>
		<textarea  placeholder="description" id="description" name="description" rows="10" cols="40"></textarea><br><br>
		<label for="length">Listing Length in Months: </label>  &nbsp; <br>
		<select id="length" name="length" required> 
			<?php  
				$count = 0;
				$months = 12;
				while($count <= $months){
					if($count == 1){
						echo "<option value='" . $count  . " '>" . $count . " month</option>";
						$count++;
					}
					else{
						echo "<option value='" . $count . " '>" . $count . " months</option>";
						$count++;
					}
				}
				?>
			
		</select><br><br>
		<label for="weeks">Listing Length in Weeks: </label>  &nbsp; <br>
		<select id="weeks" name="weeks" required> 
			<?php  
				$count = 0;
				$months = 24;
				while($count <= $months){
					if($count == 1){
						echo "<option value='" . $count  . " '>" . $count . " week</option>";
						$count++;
					}
					else{
						echo "<option value='" . $count . " '>" . $count . " weeks</option>";
						$count++;
					}
				}
				?>
		</select><br><br>
		<label for="days">Listing Length in Days: </label>  &nbsp; <br>
		<select id="days" name="days" required> 
			<?php  
				$count = 0;
				$months = 60;
				while($count <= $months){
					if($count == 1){
						echo "<option value='" . $count  . " '>" . $count . " day</option>";
						$count++;
					}
					else{
						echo "<option value='" . $count . " '>" . $count . " days</option>";
						$count++;
					}
				}
				?>
			
			
		</select><br><br>
		<label for="qualifications">Qualifications needed for this position: </label>  &nbsp; <br>
		
		<textarea  placeholder="qualifications" id="qualifications" name="qualifications" rows="10" cols="40"></textarea><br><br>
		<label for="zip" class="required">Listing Location ZIPCODE: </label>  &nbsp;
		<input type="text" id="zip" name="zip" required /> <br></br><br></br>
		<h3>If this is an internship please do not check the job or internship box.</h3>
		<label for="job">Job or Internship: </label>&nbsp;<br>
		<input type="checkbox" id="job" name="job" /><br><br>
		<h3>If the listing that you are creating is a paid position please click the box below.</h3>
		<label for="paidOrNot">Paid Listing: </label> &nbsp;<br>
		<input type="checkbox" id="paidOrNot" name="paidOrNot" /> <br><br><br>
		<label for="link" class="">Link for applicants to apply online: </label> &nbsp;
		<input type="url" id="link" name="link" /> <br></br><br></br>
		<label for="closing" class="required">Listing closing date:<br>(listings are automatically removed from the site after this date) </label> <br>
		<input type="date" id="closing" name="closing" required/> <br></br><br></br>
		<input class="submit" type="submit" name="submit" value="submit" />	<br><br><br>


</form>
</div>
<br>
</br>
<div style="height: 15%">

</div>

<?php 
	$sqls = "SELECT `Company` FROM `employers UNION SELECT `company`";
	
		
			//echo $_SESSION['id'];
			//echo $_SESSION['companyName'];
			
			
			
			?>


<?php
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		if(isset($_POST['submit'])){
			$con = mysqli_connect(HOST, DBUSER, DBPASS, DBNAME) or die("done");
			$jobType = mysqli_real_escape_string($con, $_POST['type']);
			$jobTitle = mysqli_real_escape_string($con, $_POST['title']);			
			$internshipLength = mysqli_real_escape_string($con, $_POST['length']);
			$weeks = mysqli_real_escape_string($con, $_POST['weeks']);
			$days = mysqli_real_escape_string($con, $_POST['days']);
			$jobDescription = mysqli_real_escape_string($con, $_POST['description']);
			$qualifications = mysqli_real_escape_string($con, $_POST['qualifications']);
			$zip = mysqli_real_escape_string($con, $_POST['zip']);
			$applicationLink = mysqli_real_escape_string($con, $_POST['link']);
			$jobOrIntern = mysqli_real_escape_string($con, $_POST['job']);
			$paidOrNot = mysqli_real_escape_string($con, $_POST['paidOrNot']);
			$closing = mysqli_real_escape_string($con, $_POST['closing']);
			$description = mysqli_real_escape_string($con, $_POST['description']);
			
			if(strcmp($paidOrNot, "on") == 0){
				$paid = "yes";
			}
			else{
				$paid = "no";
			}
			$job = chkBoxOnOrOff($jobOrIntern, "Job", "Internship");
			$zipLength = zipLengthCheck($zip);
			if(strcmp("no", $zipLength) == 0){
				echo "<script>alert('zipcode has to be exactly 5 digits');</script>";
			}
			
			

			//echo "<h1 class='jobInfos'>hi</h1>";
			//echo "<script>location='https://www.google.com'</script>";
			if(is_numeric($zip)){
				$cn =  $_SESSION['full'];
				$empId = $_SESSION['id'];
				//echo $jobType;
				//echo "<script>location=" . $_SESSION['homepage'] . "</script>";
				//header($_SESSION['homepage']);
				$today = getdate();
				$y_day = $today['yday'];
				$create = "CREATE TABLE if not exists `internships`(
				id int AUTO_INCREMENT PRIMARY KEY,
				company varchar(50),
				job_type varchar(80),
				job_title varchar(80),
				internship_length varchar(30),
				link varchar(255),
				employer_id int,
				job_or_intern text,
				paid_or_not varchar(4),
				y_day int,
				description text,
				qualifications text,
				zip varchar(5),
				created_at text,
				closing_date text,
				months int(10),
				weeks int(10),
				days int(10))";
				$created_at = date("F d, Y");
				$query2 = mysqli_query(dbConnectNow(), $create);
				if($query2){

					$sql = "INSERT INTO `internships`(`company`, `job_type`, `job_title`, `internship_length`, `link`, `employer_id`, `job_or_intern`, `paid_or_not`, `y_day`, `description`,`qualifications`, `zip`, `created_at`, 
					`closing_date`, `months`, `weeks`, `days`) VALUES('$cn', '$jobType', '$jobTitle', '$internshipLength', '$applicationLink', '$empId', '$job', '$paid', '$y_day', '$description', '$qualifications', '$zip', 
					'$created_at', 
					'$closing', '$internshipLength', '$weeks', '$days')";
					$query = mysqli_query(dbConnectNow(), $sql);
					if($query){
						header("location: " . APPLICANTS . "?" . $jobType);
					
					
					
					}
					else{
						echo "NOT WORKING";
					}
				}
				else{
					echo "not working";
				}
			
			
			}
			else{
				echo "<script>alert('zipcode has to be an interger');</script>";
			}
		
		}
	}
?>













<?php require("footerrelative.php"); ?>

