<?php  require("header.php"); 
 ?>
 
 
 
 
 <?php /*sessionCheck(); */?>
 
 
 
 
  

<?php
	/*echo "<div class='jobInfos'>" . readfile("example.txt") . "</div>";
	if(!file_exists("cssc.txt")){
		die("Nope keep trying");
	}
	clearstatcache();
	$myfile = fopen("example.txt", "r") or die("File cannot be opened");
	echo "<div class='jobInfos'>" ; 
	echo fread($myfile, filesize("example.txt")) . "</div>";
	while(!feof($myfile))
	{
	  echo fgetc($myfile)." <br />";
	}
 
	fclose($myfile);
	*/
	
	
	
	
	
	$con = dbConnectNow();
	$sql = "SELECT * FROM `upload`";
	$query = mysqli_query($con, $sql);
	$emparray = array();
	$count = 0;
	$idUrl = getEverthingAfterEqualSignInUrl();
	while($results = mysqli_fetch_array($query)){
	
		
		/*if($results['name'] == "example.docx"){
			function wordDecoder($docx){
				return readZipXml($docx, "word/document.xml");
			}
			
			function readZipXml($archivedFile, $dataFile){
				$zip = new ZipArchive();
				if(true === $zip->open($archivedFile)){
					if(($index = $zip->locatName($dataFile)) !== false){
					
					        $data = $zip->getFromIndex($index);
					        $zip->close();
					        $xml = new DOMDocument();
					    $xml->loadXML($data, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
						return strip_tags($xml->saveXML());
    					}
					$zip->close();
				}
				return "";
			}
			//header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');

			//echo wordDecoder($results['content']);
		}*/

		if($results['user_id'] == $idUrl){
			
				//echo $results['content'];
				//echo $_SESSION['resId' . $results['user_id']];
			
			$str = substr($results['name'], 0);
			while(strcmp($str[$count], ".")){
				$count++;
			}
			$extension = substr($str, $count + 1);
			if($extension == "docx"){
				//displayDocx($results['name']);
				//$docs = zip_opens($results['name']);
				//echo "<div class='jobInfos'>" . $docs . "</div>";
				/*$document = new DocxConversion($results['tempName']);
				
				$reflector = new ReflectionObject($document);
				$method = $reflector->getMethod('read_docx');
				$method->setAccessible(true);*/
				//echo "<div class='jobInfos'>" . $method->invoke($document) . "</div><br>";
				
				echo "<div class='jobInfos' style='width: 50%'>" . $results['resume'] . "</div><br>";

				//echo "<div class='jobInfos'>" . $results['tempName'] . "</div><br>";
				//$newDoc = $document->read_docx();
				//echo $results['name'] . "<br>";
				//echo $extension . "<br>";
				//echo $newDoc;
				
				//$filename = $results['content'];
				//$handle = fopen($filename, "rb");
				//$contents = fread($handle, filesize($filename));
				//fclose($handle);
				//echo $contents;
				//echo base64_decode($results['content']);
				//echo "<div class='jobInfos'>";
				//echo $results['content'] . "</div>";
				//echo $_SESSION['content'];
				//echo file_get_contents($results['name']);
				//echo file_get_contents($results['content']);				
				//echo $results['name'];
				//echo $results['content'];
				
				
			}
			else if(strcmp($extension, "doc")){
				/*$document = new DocxConversion("results['name']");
				$reflector = new ReflectionObject($document);
				$method = $reflector->getMethod('read_doc');
				$method->setAccessible(true);
				echo $method->invoke($document) . "<br>";*/
				echo "<div class='jobInfos' style='width: 60%'>" . $results['resume'] . "</div><br>";
				//$newDoc = $document->read_docx();
				//echo "docx document <br>";
				//echo $results['name'] . "<br>";
				//echo $extension . "<br>";
				//echo $newDoc;
			}
			else{
				echo $results['content'];
	
			}
		}
		//echo phpinfo();
		
	}
	
?>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<?php require("footerrelative.php"); 
?>