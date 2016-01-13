<?php
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
$v1=$_POST['fullname'];
$v2=$_POST['email'];
$v3=$_POST['address'];
$v4=$_POST['city'];
$v5=$_POST['country'];
$v6=$_POST['username'];
$v7=$_POST['password'];

$quer1=mysql_query("INSERT INTO user (fullname,email,address,city,country,username,password) VALUES('$v1','$v2','$v3','$v4','$v5','$v6','$v7')");
if(!$quer1)
die("Data could not insert:".mysql_error());
else
	echo "Account Created Sucessfully";

header("Location:http://ec2-52-34-242-128.us-west-2.compute.amazonaws.com/");
mysql_close($conn);
?>