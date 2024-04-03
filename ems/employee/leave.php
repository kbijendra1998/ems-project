<?php include("../auth/auth.php"); ?>
<?php include ("authentication.php");?>


<html>
	<head>
		<title>Leave</title>
		<link rel="stylesheet" href="../css/style.css">
	</head>
<body>
	<?php include("header.php"); ?>
	<h3 class="col-lg-5 col-lg-offset-4" style="color:green;">Leave Lists.<a href="applied-leave.php" class="btn btn-primary" style="margin:10px;">All Applied Leave</a></h3>
	
<div class="container">
	<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Name</th>
      <th>Earning Leave</th>
      <th>Medical Leave</th>
      <th>Casual Leave</th>
      <th>Valid From</th>
      <th>Valid Upto</th>
    </tr>
  </thead>
  <?php 
  $i=1;
  $user_id=$_SESSION['user_id'];
		include_once("../connection.php");
		$query="select * from `assign_leave` t1 join `user` t2 on t1.assign_to=t2.user_id where t2.user_id=$user_id";
	$run=mysqli_query($con,$query);
	$count=mysqli_num_rows($run);
	if($count>0){
	while($row=mysqli_fetch_array($run)){
  
  ?>
  <tbody>
    <tr>
      <td><?php echo $row['name'];?></td>
      <td class="eleave"><?php echo $row['e_leave'];?></td>
		<td  class="mleave"><?php echo $row['m_leave'];?></td>
			<td  class="cleave"><?php echo $row['c_leave'];?></td>
				<td class="v_from"><?php echo $row['v_from'];?></td>
					<td class="v_to"><?php echo $row['v_to'];?></td>
    </tr>
	<?php  $i++;}
	}else
	echo "No Record Found! ";
	?>
  </tbody>
</table>
<div class="col-xs-9">
<form class="form-horizontal" method="post" action="apply-leave.php">
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
  <fieldset>
      
	 
		<!--left box-->
		
		<div class="col-xs-6 col-xs-push-5 well">
		<legend>Apply For Leave</legend>
	  <p>
		<?php if(isset($_SESSION['success'])){
		  echo $_SESSION['success'];
		  unset($_SESSION['success']);
	           }?>
	  </p>
		 <div class="form-group">
      <label for="inputEmail" class="col-lg-6"><b>Leave From:</b></label>
      <div class="col-lg-6">
        <input type="date" name="l_from" placeholder="dd/mm/yyyy" class="form-control" onblur="checkDate(this.value)">
	  </div>
    </div>
		 <div class="form-group">
      <label for="inputEmail" class="col-lg-6"><b>Leave Upto:</b></label>
      <div class="col-lg-6">
        <input type="date" name="l_upto" placeholder="dd/mm/yyyy" class="form-control" onblur="checkDate(this.value)">
	  </div>
    </div>
		<div class="form-group">
      <label for="inputEmail" class="col-lg-6"><b>Earning Leave:</b></label>
      <div class="col-lg-6">
        <input type="text" name="eleave" placeholder="No. of leave" class="form-control" onblur="checkeleavequan(this.value)">
	  </div>
    </div>
		 <div class="form-group">
      <label for="inputEmail" class="col-lg-6"><b>Medical Leave:</b></label>
      <div class="col-lg-6">
        <input type="Text" name="mleave" placeholder="No. of leave" class="form-control" onblur="checkmleavequan(this.value)">
	  </div>
    </div>
		 <div class="form-group">
      <label for="inputEmail" class="col-lg-6"><b>Casual Leave:</b></label>
      <div class="col-lg-6">
        <input type="Text" name="cleave" placeholder="No. of leave" class="form-control" onblur="checkcleavequan(this.value)">
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
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
	function checkDate(str){
		var vfrm=$('.v_from').text();
		var vto=$('.v_to').text();
	var lfrm=str;
	
	var date1 = new Date(vfrm);
	var date2 = new Date(lfrm);
	var diffDays = parseInt((date2 - date1) / (1000 * 60 *60 *24));
	
	var date3 = new Date(lfrm);
	var date4 = new Date(vto);
	var diffDays2 = parseInt((date4 - date3) / (1000 * 60 *60 *24));
	if(diffDays>=0 && diffDays2>=0){
		return true;
	}else{
		alert('please enter valid date');
		return false;
	}
	}
	
	function checkeleavequan(str){
		var vfrm=$('.eleave').text();
		
		var lqty = str;
		if(vfrm >= lqty){
			return true;
		}else{
			alert("Please enter valid Earning leave quantity");
			return false;
		}
	}
	function checkmleavequan(str){
		var vfrm=$('.mleave').text();
		
		var lqty = str;
		if(vfrm >= lqty){
			return true;
		}else{
			alert("Please enter valid Medical leave quantity");
			return false;
		}
		
	}
	function checkcleavequan(str){
		var vfrm = $('.cleave').text();
		
		var lqty = str;
		if(vfrm >= lqty){
			return true;
		}else{
			alert("Please enter valid Casual leave quantity");
			return false;
		}
	}
	
</script>
</body>
</html>