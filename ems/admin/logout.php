<?php include("authentication.php");?>
<?php 
	session_start();
	unset($_SESSION['auth']);
	
	header("location:../login.php");

?>