
<?php include("authentication.php");?>
<?php
//session_start();
include("../connection.php");
	
	//print_r($_POST);
	$user_id=$_GET['id'];
	
		$qry="DELETE from `user` where `user_id`='$user_id'";
		$run=mysqli_query($con,$qry);
		if($run){
			$_SESSION['success']=" Data deleted successfully !";
			header("location:dashboard.php");
		}else{
			echo "Unable to DELETE!";
		}
	

?>