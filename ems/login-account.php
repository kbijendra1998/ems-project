<?php
session_start();
	include_once("connection.php");
	
if(isset($_POST['email'])){
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	
	$query="select * from user where email='$email' and password='$pass'";
	$run=mysqli_query($con,$query);
	$count=mysqli_num_rows($run);
	$row=mysqli_fetch_array($run);
	
		if($count==1){
			$session_id=session_id();
			$_SESSION['auth']=$session_id;
			$_SESSION['user_id']=$row['user_id'];
			$_SESSION['name']=$row['name'];
			$_SESSION['role']=$row['role'];
		$role=$row['role'];
		if($role=='Admin'){
			header('location:admin/dashboard.php');
		}elseif($role=='Employee'){
			header('location:employee/dashboard.php');
		}
	}else{
		$_SESSION['error']="Wrong Email or Password!";
		header('location:login.php');
	}
	
}
	
/////////////////////////////////////////////////////
/* function login($redirect,$table){
	include("connection.php");
	if(isset($_POST['email'])){
		$email=$_POST['email'];
		$pass=md5($_POST['password']);
		
		$sql="select * from ".$table." where email='$email' and password='$pass' ";
		$run=mysqli_query($con,$sql);
		 $count=mysqli_num_rows($run);
		if($count==1){
			//echo "login success";
			header("location:".$redirect);
			$_SESSION['login_success']="Redirected to Dashboard.";
		}else{
			//echo "sorry";
			$_SESSION['error']="Wrong Email or Password.";
			header("location:".$redirect);
		}
	}
}
	
	
	
	$table="user";
	$redirect="login.php";
	login($redirect,$table);
	 */

?>

