<?php
	
	$role=$_SESSION['role'];
		if($role=='employee'){
			header('location:../employee/dashboard.php');
		}
	?>