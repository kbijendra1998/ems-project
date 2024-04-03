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
			 }
		 }
		  </script>
	</head>
<body>
	<?php include("header.php");?>
<div class="container">
<div class="col-xs-6 col-xs-push-3 well">
<form class="form-horizontal" method="post" action="update-user.php" onsubmit="return formvalidation();">
  <fieldset>
      <legend>Edit User Details</legend>
	  <?php
		if(isset($_SESSION['success'])){
			//echo $_SESSION['success'];
			unset($_SESSION['success']);
		}
		?>
		<?php 
		include_once("../connection.php");
			$user_id=$_GET['id'];
			$query="select * from user where user_id='$user_id'";
			$res=mysqli_query($con,$query);
			$data=mysqli_fetch_array($res);
		?>
		<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="<?php echo $data['name'];?>">
      </div>
    </div>
	<div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="<?php echo $data['email'];?>">
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
            <input type="radio" name="depart" id="depart" value="Admin"<?php if($data['role']=='Admin'){ echo "checked";}?> >
           Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="Web Development"<?php if($data['department']=='Web Development'){ echo "checked";}?> >
           Web Development
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="depart" id="depart" value="SEO"<?php if($data['department']=='SEO'){ echo "checked";}?> >
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
            <input type="radio" name="role" id="role" value="Admin" <?php if($data['role']=='Admin'){ echo "checked";}?> >
           Admin
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="role" id="role" value="Employee" <?php if($data['role']=='Employee'){ echo "checked";}?> >
            Employee
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit" value="">Update</button>
      </div>
    </div>
  </fieldset>
  
</form>
</div class="container">
</body>
</html>