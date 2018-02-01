<?php
  session_start();
  unset($_SESSION['userName']); // remove individual session var
  session_unset();
  session_destroy();
  if($_SESSION['id'] && !$_SESSION['cwwid']){
  	header('location: index.php'); // redirct to certain page now
  }
  else{
  	header('location: index.php');
  }
?>