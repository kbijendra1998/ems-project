<?php include("header.php"); ?><html>
	<head>
		<title>Employee Message</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>

	
<div class="container">
<div class="container">
 <h3 class="col-lg-5 col-lg-offset-4" style="color:green;">Employee Message.</h3>
 </div>
 <div class="container">
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr. No.</th>
      <th>Name</th>
      <th>Email</th>
      <th>Department</th>
      <th>Role</th>
      <th>Message</th>
    </tr>
  </thead>
  <?php 
  $i=1;
		include_once("../connection.php");
		$query="select * from `user` where `role`='employee' order by `user_id` DESC ";
	$run=mysqli_query($con,$query);
	$count=mysqli_num_rows($run);
	if($count>0){
	while($row=mysqli_fetch_array($run)){
  
  ?>
  <tbody>
    <tr>
      <td><?php echo $i ;?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['department']; ?></td>
      <td><?php echo $row['role']; ?></td>
      <td><a href="emp_msg.php?id=<?php echo $row['user_id'];?>">View</a></td>
    </tr>
	<?php  $i++;}
	}else
	echo "No Record Found! ";
	?>
  </tbody>
</table>
</div>
</div>
</body>
</html>