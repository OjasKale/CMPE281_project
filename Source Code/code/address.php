<html>
<?php
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						$conn=mysql_connect($servername,$user,$password);
						$db=mysql_select_db($dbname,$conn);
						extract($_POST);
						$quer1=mysql_query("SELECT address FROM node;");	
							while ($row = mysql_fetch_array($quer1))
								echo $row['address']."\n &nbsp;&nbsp;";
							echo "\n";
								?>
</html>