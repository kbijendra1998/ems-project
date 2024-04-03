<?php include("authentication.php");?>
<?php
//session_start();
include("../connection.php");
	
	//print_r($_POST);
	if(isset($_POST['message'])){
		$message=mysqli_real_escape_string($con,$_POST['message']);
		$assign_by=$_POST['assign_by'];
		$emplist=$_POST['emp'];
		
		foreach($emplist as $emp){
		
		$qry="insert into task (`t_id`,`task`,`user_id`,`assign_by`) values ('','$message','$emp','$assign_by')";
		$run=mysqli_query($con,$qry);
		if($run){
			$_SESSION['success']="Message Sent Successfully!";
			header("location:task.php");
		}else{
			echo "Unable to sent message!";
		}
		}
	}

?>