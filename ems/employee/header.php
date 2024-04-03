	<?php
		setcookie('user','active',time()+300);
		if(!isset($_COOKIE['user'])){
			
			header('location:../login.php');
		}else{
			setcookie('user','active',time()+300);
			//header('location:dashboard.php');
			//echo "you are logged in";
		}
	
	?>
	<header>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Employee EMS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="task.php">Task</a></li>
        <li><a href="leave.php">Leave</a></li>
        <li><a href="msg.php">Contact Admin</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
	   <li> <button type="button" class="btn btn-success"><a href="logout.php">Logout</a></button>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>