<?php include("authentication.php");?>
<?php
session_start();
include("../connection.php");
	
	//print_r($_POST);
	if(isset($_REQUEST['email'])){
		$user_id=$_POST['user_id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=md5($_POST['password']);
		$depart=$_POST['depart'];
		$role=$_POST['role'];
		if($pass==''){
			$qry="UPDATE `user` SET `name`='$name',`email`='$email',`department`='$depart',`role`='$role' where `user_id`='$user_id'";
		}else{
		$qry="UPDATE `user` SET `name`='$name', `email`='$email', `password`='$pass',`department`='$depart',`role`='$role' where `user_id`='$user_id'";
		$run=mysqli_query($con,$qry);
		}
		if($run){
			$_SESSION['success']=" Details Updated successfully !";
			header("location:dashboard.php");
		}else{
			echo "Unable to update your details!";
		}
	}
	
?>