if ( isset( $_POST["pass"] ) && $_POST["name"] != "" ) {
	$table = $wpdb->prefix. "my_table";
	$name = strip_tags($_POST["name"], "");
	$pass = strip_tags($_POST["pass"], "");
	$salt = "80!'kkg#";
	$encryptedPassword = md5($pass . $salt);
	$results= $wpdb->get_results("SELECT * FROM " . $table . " WHERE `pass` = " . $encryptedPassword);
	$result = $wpdb->num_rows;
	foreach( $results as $r){
		$count = 0;
		if($results[$count] == $encryptedPassword){
			wp_redirect("http://cwwinternship.cyberwatchwest.org/employers-page/");
			//header("Location:  http://cwwinternship.cyberwatchwest.org/employers-page/");
		}
		else{
			echo "not moving";
		
		}
	}
	
	
}



if ( isset( $_POST["pass"] ) && $_POST["name"] != "" ) {
	$table = $wpdb->prefix. "my_table";
	$name = strip_tags($_POST["name"], "");
	$pass = strip_tags($_POST["pass"], "");
	$salt = "80!'kkg#";
	$encryptedPassword = md5($pass . $salt);
	$results= $wpdb->get_col($wpdb->prepare("SELECT * FROM  %s  WHERE `pass` = %s", $table, $encyrptedPassword ));
	if($results){
	foreach( $results as $r){