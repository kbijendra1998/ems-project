<?php

	//include("connection.php");
	/* $err=array();
	
	if(isset($_POST['email']) && isset($_POST['password'])){
		if($_POST['email']!="" && $_POST['password']){
			$q="select id from user where email='".$_POST['email']."' and password='".$_POST['password']."'  ";
			$qry=mysqli_query($con,$q);
			$row=mysqli_num_rows($qry);
			if($row>0){
				$data=mysqli_fetch_assoc($row);
				if($_SESSION['uid']=$data['id']){
					header("location:dashboard.php");
				}else{
					echo $err[]="invalid email or password";
				}
			}else{
				echo $err[]="Blank !";
			}
	}
		
} */
	
?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="css/style.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script>
		 function formvalidation(){
			 var email=$('#inputEmail').val();
			 var password=$('#inputPassword').val();
			 var passlenth=$('#inputPassword').val().length;
			 if(email==''){
				 alert("Please Input Your Valid Email!")
				return false;
			 }if(password==''){
				 alert("Please type Your Password!");
				 return false;
			 }if(passlenth<=4){
				 alert("Please Input minimum 5 character for pass!");
				 return false;
			 }
		 }
		  </script>
	</head>
<body>
	
<div class="container">
<div class="col-xs-6 col-xs-push-3 well">
<form class="form-horizontal" method="post" action="login-account.php" onsubmit="return formvalidation();">
  <fieldset>
      <legend>Login</legend>
	  <?php
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
			//unset($_SESSION['error']);
		}
		
	  ?>
	  
	<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control"  id="inputPassword" name="password" placeholder="Password" value="">
        
      </div>
    </div>
	
    <div class="form-group">
      <div align="center " class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </fieldset>
  
</form>
</div class="container">
</body>
</html>