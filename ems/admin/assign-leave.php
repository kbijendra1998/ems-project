<?php 
	//session_start();
include("../auth/auth.php"); ?>
<?php include("authentication.php");?>
	<html>

	<head>
		<title>Assign Employee Leave</title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	</head>

<body>
	<?php include("header.php");?>
		<div class="container">
			<div class="col-xs-10 col-xs-push-1 well">
				<?php
	if(isset($_SESSION['success'])){
		//echo $_SESSION['success'];
		unset($_SESSION['success']);
	}
	?>
					<form class="form-horizontal" method="post" action="insert-leave.php">
						<fieldset>
							<legend>Assign Leave<a href="all-leave.php" class="btn btn-primary" style="margin:10px;">All Leave</a><a href="all-applied-leave.php" class="btn btn-primary" style="margin:10px;">All Applied Leave</a></legend>
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
													<input type="checkbox" name="emp[]" value="<?php echo $row['user_id'];?>">
													<?php echo $row['name'];?>
												</label>
											</div>
											<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-xs-9">
								<div class="form-group">
									<label for="inputEmail" class="col-lg-6"><b>Valid From:</b></label>
									<div class="col-lg-6">
										<input type="date" name="validfrm" placeholder="dd/mm/yyyy" class="form-control"> </div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-6"><b>Valid Upto:</b></label>
									<div class="col-lg-6">
										<input type="date" name="validupto" placeholder="dd/mm/yyyy" class="form-control"> </div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-6"><b>Earning Leave:</b></label>
									<div class="col-lg-6">
										<input type="text" name="eleave" placeholder="No. of leave" class="form-control"> </div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-6"><b>Medical Leave:</b></label>
									<div class="col-lg-6">
										<input type="Text" name="mleave" placeholder="No. of leave" class="form-control"> </div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-6"><b>Casual Leave:</b></label>
									<div class="col-lg-6">
										<input type="Text" name="cleave" placeholder="No. of leave" class="form-control"> </div>
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