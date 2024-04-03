<?php
	include("../auth/auth.php");
?>
<?php include("authentication.php");?>

<html>
	<head>
		<title>Task</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>
	<?php include("header.php"); ?>
	<h3> All Task Lists.</h3>
	
<div class="container">
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr.No.</th>
      <th>Task</th>
      <th>Date-Time</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php 
  $i=1;
		include_once("../connection.php");
		$query="select * from `task` ";
	$run=mysqli_query($con,$query);
	$count=mysqli_num_rows($run);
	if($count>0){
	while($row=mysqli_fetch_array($run)){
  
  ?>
  <tbody>
    <tr>
      <td><?php echo $i ;?></td>
      <td><a href="view-message.php?id=<?php echo $row['t_id'];?>"><?php echo substr($row['task'],0,50); ?></a></td>
      <td><?php echo $row['date_time']; ?></td>
      <td><a href="view-message.php?id=<?php echo $row['t_id'];?>">View</a></td>
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