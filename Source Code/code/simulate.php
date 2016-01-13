<?php
$servername = "qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
$username = "qp_user";
$password = "password123";
$dbname="QP_db";
$conn =mysql_connect($servername, $username, $password);

// Check connection
$db=mysql_select_db($dbname,$conn);
if(!$db)
{die("Database could not connect:".mysql_error());
}


$result=mysql_query("SELECT count(*) as total from node_log where status=1");
$data=mysql_fetch_assoc($result);
$one=$data['total'];
echo "before function";
function park()
{
	echo "in function";
$v1=rand(1,50);
$sql="select status from node_log where idnode_log='$v1'";
$quer=mysql_query($sql);
if(!$quer)
die("Data not extracted:".mysql_error());
else
	$values = mysql_fetch_array($quer);
	$status=$values['status'];

if($status==1)
{
	echo "Parking slot.'$v1'. vacant";
	$sql = "UPDATE node_log SET status=0 WHERE idnode_log='$v1'";
	$quer=mysql_query($sql);
	$sql1 = "UPDATE node SET available_slots=(available_slots-1) WHERE id=(select node_id from node_log where idnode_log='$v1') and available_slots >0";
	$quer=mysql_query($sql1);
}
else{
	echo "Parking slot.'$v1'. occupied";
	$sql = "UPDATE node_log SET status=1 WHERE idnode_log='$v1'";
	$quer=mysql_query($sql);
	$sql1 = "UPDATE node SET available_slots=(available_slots+1) WHERE id=(select node_id from node_log where idnode_log='$v1') and available_slots < total_slots";
	$quer=mysql_query($sql1);
}
}
$on=1;
while($on<50)
{park();
echo "after function in while";
sleep(1);
$on++;
}
	mysql_close($conn);
?>