<?php
session_start();
$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
$user="qp_user";
$password="password123";
$dbname="QP_db";
if(!($conn=mysql_connect($servername,$user,$password)))
die("could not connect to database:".mysql_error());
$db=mysql_select_db($dbname,$conn);
if(!$db)
{die("Database could not connect:".mysql_error());
}extract($_POST);
$v1=$_POST['username'];
$v2=$_POST['password'];

$query = "SELECT * FROM user WHERE username='$v1' and password='$v2'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
$_SESSION["username"] =$v1;
header("Location:http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/kite/default/main.php");
}else{
	echo '<script type="text/javascript">'; 
        echo 'alert("Enter Valid User Details");'; 
        echo 'window.location.href= "http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/";';
        echo '</script>';
//header("Location:http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/");
}
if($v1=="admin" && $v2=="password")
{
header("Location:http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/admin/admin-panel/admin.html");	
}
	mysql_close($conn);
?>