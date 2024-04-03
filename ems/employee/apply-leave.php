<?php include ("authentication.php");?>
<?php
session_start();
/* $con=mysqli_connect("localhost","root","","ems");
if($con){
	//echo 'ready to move forward';
}  */
include_once ("../connection.php");
echo "<pre>";
print_r($_POST);
if (isset($_REQUEST['l_from']))
{
    $l_from = $_POST['l_from'];
    $l_upto = $_POST['l_upto'];
    $eleave = $_POST['eleave'];
    $mleave = $_POST['mleave'];
    $cleave = $_POST['cleave'];
    $apply_by = $_POST['user_id'];
    $status = "pending";

    $query = "INSERT INTO `applied_leave` (`id`,`l_from`,`l_upto`,`e_leave`,`m_leave`,`c_leave`,`apply_by`,`status`) VALUES ('','$l_from','$l_upto','$eleave','$mleave','$cleave','$apply_by','$status') ";

    $res = mysqli_query($con, $query);
    if ($res)
    {
        $_SESSION['success'] = "Leave Applied Successfully!";
        header("location:leave.php");
    }
    else
    {
        echo "Unable to apply your Leave!";
    }
}

?>
