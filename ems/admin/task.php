
<?php //include("authentication.php");?>
<?php 
	//session_start();
include("../auth/auth.php"); ?>
	
<html>
	<head>
		<title>Task</title>
		<link rel="stylesheet" href="../css/style.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		 
	</head>
<body>
	<?php include("header.php");?>
<div class="container">
<div class="col-xs-10 col-xs-push-1 well">
 <?php
		if(isset($_SESSION['success'])){
			echo $_SESSION['success'];
			unset($_SESSION['success']);
		}
		?>
<form class="form-horizontal" method="post" action="insert-task.php" onsubmit="return formvalidation();">
  <fieldset>
      <legend>Task Assignment<a href="all-task.php" class="btn btn-primary" style="margin:10px;">All Task</a></legend>
	 
		<!--left box-->
		<div class="col-xs-3" style="background-color:#d9d9d9; padding:15px;">
		 <div class="form-group">
      <label class="col-lg-12"><b>Employee Lists</b></label>
	  <input type="hidden" name="assign_by" value="<?php echo $_SESSION['user_id'];?>">
      <div class="col-lg-12">
	  <?php 
		include_once("../connection.php");
		$query="select * from `user` where `role`='employee' order by `user_id` DESC";
	$run=mysqli_query($con,$query);
	
	while($row=mysqli_fetch_array($run)){
  
  ?>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="emp[]" value="<?php echo $row['user_id'];?>" >
           <?php echo $row['name'];?>
          </label>
        </div>
	<?php } ?>
      </div>
    </div>
	
		</div>
		<div class="col-xs-9">
		    <div class="form-group">
      <label for="inputEmail" class="col-lg-12"><b>Message</b></label>
      <div class="col-lg-12">
        <textarea  class="form-control" rows="10" name="message" placeholder="Message/Task" style="background-color:#d9d9d9; padding:5px;"></textarea>
	  </div>
    </div>
    
		</div>

   
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-5">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit" value="">Submit</button>
      </div>
    </div>
  </fieldset>
  
</form>
</div class="container">
</body>
</html>