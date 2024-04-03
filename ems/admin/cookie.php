<?php 
	setcookie("user",'active',time()+10);
	//echo  $_COOKIE['user'];
	//echo $value;
		if(!isset($_COOKIE['user'])){
			
			echo "hello";
		}else{
			setcookie("user",'active',time()+10);
			//header('location:../login.php');
			echo "you are logged in";
		}
?>