<?php include("authentication.php");?>
<?php
//session_start();
include("../connection.php");
	
	//print_r($_POST);
	if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=md5($_POST['password']);
		$depart=$_POST['depart'];
		$role=$_POST['role'];
		
		$qry="insert into user (name,email,password,department,role) values ('$name','$email','$pass','$depart','$role')";
		$run=mysqli_query($con,$qry);
		if($run){
			$_SESSION['success']=" Registration successful !";
			header("location:register.php");
		}else{
			echo "Unable to Register!";
		}
	}

?>