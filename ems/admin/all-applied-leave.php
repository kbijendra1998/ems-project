<?php
	include("../auth/auth.php");
	include("authentication.php");
	
	
?>


<html>
	<head>
		<title> All Applied Leave Lists.</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>

	<?php include("header.php"); ?>
	<?php 
	include_once("../connection.php");
		if(isset($_POST['approve'])){
			$status="Approved";
			$comment=$_POST['comment'];
			$id=$_POST['id'];

	 $qry="UPDATE `applied_leave` SET status='$status',comment='$comment' where id='$id'";
		
		$run=mysqli_query($con,$qry);
		if($run){
			
			$_SESSION['success']="Row Updated Successfully!";
			header("location:all-applied-leave.php");
			
		}else{
			echo "Not Updated!";
		}
} 	
		if(isset($_POST['reject'])){
			$status="Rejected";
			$comment=$_POST['comment'];
			$id=$_POST['id'];
			
			 $qry="UPDATE `applied_leave` SET status='$status',comment='$comment' where id='$id'";
		
		$run=mysqli_query($con,$qry);
		if($run){
			
			$_SESSION['success']="Rejection Updated Successfully!";
			header("location:all-applied-leave.php");
			
		}else{
			echo "Not Updated!";
		}
		}
?>
	
<div class="container">
<h3 class="col-lg-5 col-lg-offset-4" style="color:green;"> All Applied Leave Lists.</h3>
	<?php if(isset($_SESSION['success'])){
		echo $_SESSION['success'];
		unset($_SESSION['success']);
	}
	?>
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No.</th>
      <th>Employee Name</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>From</th>
      <th>To</th>
      <th>Status</th>
      <th>Comment</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <?php 
  $i=1;
		include_once("../connection.php");
		$query="select * from `applied_leave` t1 join `user` t2 on t1.apply_by=t2.user_id ";
	$run=mysqli_query($con,$query);
	$count=mysqli_num_rows($run);
	if($count>0){
	while($row=mysqli_fetch_array($run)){
  
  ?>
  <tbody>
    <tr>
      <td><?php echo $i ;?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['e_leave'];?></td>
		<td><?php echo $row['m_leave'];?></td>
			<td><?php echo $row['c_leave'];?></td>
				<td><?php echo $row['l_from'];?></td>
					<td><?php echo $row['l_upto'];?></td>
					<td style="color:green;"><?php echo $row['status'];?></td>
					<td><form method="post" action=""><textarea name="comment"></textarea></td>
					<td>
						<input type="hidden" name="id" value="<?php echo $row['id'];?>">
					<button type="submit" name="approve" class="btn btn-primary" value="">Approve</button>
					<button type="submit" name="reject" class="btn btn-primary" value="">Reject</button>
					</form></td>
					
    </tr>
	<?php  $i++;}
	}else
	echo "No Record Found! ";
	?>
  </tbody>
</table>
</div>
</body>
</html>