<?php
	require("publicheader.php");
	
?>
<style>
.jobBoard{
		background-color: #ffffff;
		position: relative;
		color: #000000;
		border-radius: 5px;
		display: inline-block;
		width: auto;
		top: 64px;
		text-align: center;
		border: 2px solid #fffff9;
		padding: 2em;
		box-shadow: 4px 5px 5px grey;
		
		
		
	}

</style>


<div class="">

<div class="jobInfos" style="overflow: auto; margin-bottom: 5%">
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">



<input type="hidden" name="MAX_FILE_SIZE" value="200000000">
<label for="userfile">Resume DOCX ONLY!</label> &nbsp;
<input style="margin-left: 2em" id="userfile" name="userfile" type="file" id="userfile"> <br><br>

<input name="upload" type="submit" class="" id="upload" value=" Upload "></td>
</form>

</div>

<?php
if($_SESSION['resume']){
	echo "<div class='' style='overflow: auto; margin-bottom: 5%; padding: 2em'>" . $_SESSION['resume'] . "</div>";
}
//This uploads the resume to the system so that employers can view it later.
if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0){
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	$fp      = fopen($tmpName, 'r+');
	$content = fread($fp, filesize($tmpName));
	$_SESSION['content'] == $content;
	$content = addslashes($content);
	fclose($fp);
	$documents = new DocxConversion($tmpName); //This class converts docx and doc to viewable text
	$reflector = new ReflectionObject($documents); //Makes the read_docx function availabe because it is private.
	$method = $reflector->getMethod('read_docx');
	$method->setAccessible(true);
	$newDoc = $method->invoke($documents);
	$newDoc = addslashes($newDoc);
	$_SESSION['resume'] = $newDoc;
	if(!get_magic_quotes_gpc()){
	    $fileName = addslashes($fileName);
	}
	$today = getdate();
	$y_day = $today['yday'];
	$sql = "CREATE TABLE if not exists `upload`(
		id int not null AUTO_INCREMENT PRIMARY KEY,
		name varchar(50),
		user_id int,
		size int,
		type varchar(256),
		content longblob NOT NULL,
		tempName varchar(100),
		resume varchar(65535),
		y_day int)";
	$con = dbConnectNow();
	$query2 = mysqli_query($con, $sql);
	if($query2){
	$user_id = $_SESSION['cwwid'];
	$folder="uploads/";
 	mkdir($folder);
 	//$content = base64_encode($content);
 	//$_SESSION
 	move_uploaded_file($tmpName,$folder.$fileName);
	$query = "INSERT INTO `upload`(name, `user_id`, size, type, content, tempName, resume, y_day ) VALUES('$fileName', '$user_id', '$fileSize', '$fileType', '$content', '$tmpName', '$newDoc', '$y_day')";
	mysqli_query($con, $query) or die('Error, query failed'); 
	mysqli_close($con);
	$_SESSION['resume_time'] = time();
			echo "<div class='' style='overflow: auto; margin-bottom: 5%; padding: 2em'>" . $newDoc . "</div>";
			//echo "<div class='jobInfos' style='overflow: auto'>" . $results['resume'] . "</div>";
		
	//header("location: " . $_SESSION['cwwhomepage']);
	}
} 

?>
<div class="" style="background: #fffff9; overflow: auto; padding: 2em; width: auto">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" methood="GET">
<label for="resume" class="required">Delete Resume:</label>  &nbsp; <br>
<input type="hidden" name="userId" value="<?php echo $_SESSION['cwwid']; ?>" />
<input type="text" name="filename" /><br><br><br></br>
<input class="submit" type="submit" name="submit_resume" value="submit" />
<input class="submit" type="submit" name="delete_all" value="delete all" />	
</form>
</div>
<?php
if(isset($_GET['submit_resume'])){
		$con = dbConnectNow();
		$userId= mysqli_real_escape_string($con, $_GET['userId']);	
		$fileName = mysqli_real_escape_string($con, $_GET['filename']);			
		$sql = "DELETE FROM `upload` WHERE `name`= '$fileName'";
		$query = mysqli_query($con, $sql);
		
		if($query){
			echo "<script type='text/javascript'>alert('Your resume has been deleted.');</script>";
			echo "<script type='text/javascript'>document.location.href='http://cwwinternship.cyberwatchwest.org/internship/home.php?id=" . $_SESSION['cwwid'] . "'</script>";
			//header("location: http://cwwinternship.cyberwatchwest.org/internship/home.php?id=" . $_SESSION['cwwid']);

		}
		else{
			echo"<div class='jobInfos' style='float: right'>" . $userId. " not deleted</div>";
		}
		
	}
if(isset($_GET['delete_all'])){
		$con = dbConnectNow();
		$userId= mysqli_real_escape_string($con, $_GET['userId']);	
		$fileName = mysqli_real_escape_string($con, $_GET['filename']);			
		$sql = "DELETE FROM `upload` WHERE `user_id`= '$userId'";
		$query = mysqli_query($con, $sql);
		
		if($query){
			unset($_SESSION['resume']);
			echo "<script type='text/javascript'>alert('All your resumes have been deleted.  Please upload another resume.');</script>";
			echo "<script type='text/javascript'>document.location.href='http://cwwinternship.cyberwatchwest.org/internship/upload.php'</script>";			
			
		}	
		else{
			echo"<div class='jobInfos' style='float: right'>" . $userId. " not deleted</div>";
		}
		
	}	

?>



</div>

<div style="margin-top: 25%">

</div>

<?php require("footerrelative.php"); ?>