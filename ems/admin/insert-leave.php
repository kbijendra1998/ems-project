<?php include("authentication.php");?>
<?php
 session_start();
 /*$con=mysqli_connect("localhost","root","","ems");
if($con){
	//echo 'ready to move forward';
} */include_once("../connection.php");
	//echo "<pre>";
	//print_r($_POST);
	if(isset($_REQUEST['validfrm'])){
		$validfrm=$_POST['validfrm'];
		$valto=$_POST['validupto'];
		$eleave=$_POST['eleave'];
		$mleave=$_POST['mleave'];
		$cleave=$_POST['cleave'];
		$assign_by=$_POST['assign_by']; 
			$emplist=$_POST['emp'];
		foreach($emplist as $emp){
		
		 $qry="insert into `assign_leave` (`id`,`v_from`,`v_to`,`e_leave`,`m_leave`,`c_leave`,`assign_to`,`assign_by`) values ('','$validfrm','$valto','$eleave','$mleave','$cleave','$emp','$assign_by')";
		$run=mysqli_query($con,$qry);
		if($run){
			$_SESSION['success']="Leave Assigned Successfully!";
			header("location:assign-leave.php");
		}else{
			echo "Unable to assigned Leave!";
		}
		}
	
	}
?>