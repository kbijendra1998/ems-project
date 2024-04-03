<?php include ("../auth/auth.php"); ?>
<?php include ("authentication.php");?>
	<html>

	<head>
		<title> Applied Leave</title>
		<link rel="stylesheet" href="../css/style.css"> </head>

	<body>
		<?php include ("header.php"); ?>
			<h3 class="col-lg-5 col-lg-offset-4" style="color:green;">All Applied Leave Status.</h3>
			<div class="container">
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Sr.no.</th>
							<th>Earning Leave</th>
							<th>Medical Leave</th>
							<th>Casual Leave</th>
							<th>Leave From</th>
							<th>Leave Upto</th>
							<th>Status</th>
							<th>Comment</th>
						</tr>
					</thead>
					<?php
$i = 1;
$user_id = $_SESSION['user_id'];
include_once ("../connection.php");
$query = "select * from `applied_leave` where `apply_by`='$user_id'";
$run = mysqli_query($con, $query);
$count = mysqli_num_rows($run);
if ($count > 0)
{
    while ($row = mysqli_fetch_array($run))
    {

?>
						<tbody>
							<tr>
								<td>
									<?php echo $i; ?>
								</td>
								<td>
									<?php echo $row['e_leave']; ?>
								</td>
								<td>
									<?php echo $row['m_leave']; ?>
								</td>
								<td>
									<?php echo $row['c_leave']; ?>
								</td>
								<td>
									<?php echo $row['l_from']; ?>
								</td>
								<td>
									<?php echo $row['l_upto']; ?>
								</td>
								<td style="color:blue;">
									<?php echo $row['status']; ?>
								</td>
								<td>
									<?php echo $row['comment']; ?>
								</td>
							</tr>
							<?php $i++;
    }
}
else echo "No Record Found! ";
?>
						</tbody>
				</table>
			</div>
	</body>

	</html>