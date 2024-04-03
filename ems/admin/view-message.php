<?php
	include("../auth/auth.php");
?>
<?php include("authentication.php");?>
<html>
	<head>
		<title>View Message</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>

	<?php include("header.php"); ?>
<h3> Message Details.</h3>
<div class="container">
	<?php 
	$m_id=$_GET['id'];
	include_once("../connection.php");
		$query="select * from `task` where `t_id`=$m_id";
	$run=mysqli_query($con,$query);
	$count=mysqli_num_rows($run);
	$row=mysqli_fetch_array($run);
	
	?>
	<div class="col-sm-12; background:#f9f9f9; padding:15px;">
	<?php echo $row['task'];?>
	</div>
	
	<div class="col-sm-12;">
	<br>
	<?php 
		if(isset($_REQUEST['m_reply'])){
			$mid=$_POST['m_id'];
			$user_id=$_POST['user_id'];
			$reply=mysqli_real_escape_string($con,$_POST['m_reply']);
			
			$insert="insert into `task_reply` (`r_id`,`reply`,`m_id`,`reply_by`) values ('','$reply','$mid','$user_id')";
			$query=mysqli_query($con,$insert);
			if($query){
				echo "Reply Submitted Successfully!";
			}else{
				echo "Please Try Again!";
			}
		}
	
	
	?>
	<form action="" method="post">
	<fieldset>
	<div class="form-group">
	<input type="hidden" name="m_id" value="<?php echo $m_id;?>">
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
	 <label for="inputEmail" class="col-lg-2 control-label"><h3>Write Your Own Message</h3></label>
	  <div class="col-lg-10">
	<textarea name="m_reply" rows=5 style="width:100%;background-color:#d9d9d9; padding:5px;" ></textarea>
	 </div>
	</div>
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit Reply</button>
      </div>
	</form>
	</div>
	</fieldset>
   <div class="col-sm-12;">
<fieldset>
<p>&nbsp;</p>
<?php 
	 $m_id=$_GET['id'];
		$query1="select * from `task_reply` join `user` on `user`.`user_id`=`task_reply`.`reply_by` where `m_id`='".$m_id."'";
	$res=mysqli_query($con,$query1);
	$count1=mysqli_num_rows($res);
	while($row1=mysqli_fetch_array($res)){
		?>
<div class="form-group">
	<label for="inputEmail" class="col-lg-2 control-label"><h3>&nbsp;</h3></label>
	 <div class="col-lg-10">
	 
		<div class="col-sm-12;" style="background:#f9f9f9; padding:15px;">
	<?php echo $row1['name'].':- '. $row1['reply'];?>
	</div>

	 </div>
</fieldset>
</div>
<?php		
	}	 ?>
</div>
</div>
</body>
</html>