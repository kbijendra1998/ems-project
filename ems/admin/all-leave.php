<?php
	include("../auth/auth.php");
	
	
?>
<?php include("authentication.php");?>

<html>
	<head>
		<title>Leave</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>
	<?php include("header.php"); ?>
	<h3 class="col-lg-5 col-lg-offset-4" style="color:green;"> All Leave Lists.</h3>
	
<div class="container">
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No.</th>
      <th>Employee Name</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>Valid From</th>
      <th>Valid Upto</th>
    </tr>
  </thead>
  <?php 
  $i=1;
		include_once("../connection.php");
		$query="select * from `assign_leave` t1 join `user` t2 on t1.assign_to=t2.user_id ";
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
				<td><?php echo $row['v_from'];?></td>
					<td><?php echo $row['v_to'];?></td>
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