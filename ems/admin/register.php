<?php include("../auth/auth.php"); ?>
	<?php include("authentication.php");?>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" href="../css/style.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script>
		 function formvalidation(){
			 var name=$('#inputName').val();
			 var email=$('#inputEmail').val();
			 var password=$('#inputPassword').val();
			 var passlenth=$('#inputPassword').val().length;
			 
			 if(name==''){
				 alert("Please Input Your Name!");
				 return false;
			 }if(email==''){
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
	<?php include("header.php");?>
<div class="container">
<div class="col-xs-6 col-xs-push-3 well">
<form class="form-horizontal" method="post" action="insert-user.php" onsubmit="return formvalidation();">
  <fieldset>
      <legend>REGISTER</legend>
	  <?php
		if(isset($_SESSION['success'])){
			echo $_SESSION['success'];
		}
		?>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="">
      </div>
    </div>
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
      <label class="col-lg-2 control-label">Department</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="Web Development" checked="">
           Web Development
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="SEO">
            SEO
          </label>
        </div>
      </div>
    </div>
	<div class="form-group">
      <label class="col-lg-2 control-label">Role</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="Admin" checked="">
           Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="Employee">
            Employee
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit" value="">Submit</button>
      </div>
    </div>
  </fieldset>
  
</form>
</div class="container">
</body>
</html>