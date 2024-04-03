<?php include("../auth/auth.php"); ?>
	
	<?php include("authentication.php");?>

<?php 
	setcookie('user','active',time()+20);
		if(!isset($_COOKIE['user'])){
			
			header('location:../login.php');
		}else{
			setcookie('user','active',time()+20);
			//header('location:dashboard.php');
			//echo "you are logged in";
		}
?>

<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="../css/style.css">
		  
	</head>
<body>
<!--including header here---->
	<?php include("header.php");?>
<!--header end here...--->
<div class="container">
 <h4 class="col-lg-5 col-lg-offset-4" style="color:green;">Welcome To Admin Dashboard</h4>
 </div>
 <div class="container">
	<h1>Users Records.</h1>
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Sr. No.</th>
      <th>Name</th>
      <th>Email</th>
      <th>Department</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php 
  $i=1;
		include_once("../connection.php");
		$query="select * from `user` ";
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
      <td><a href="edit-user.php?id=<?php echo $row['user_id'];?>">Edit </a> | <a href="delete-user.php?id=<?php echo $row['user_id'];?>">Delete</a></td>
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