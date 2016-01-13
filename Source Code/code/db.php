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
						$quer1=mysql_query("SELECT name FROM node;");
						
						if(!$quer1)
							die("Data could not insert:".mysql_error());
						else{
							echo "<table><tr><td>Name</td></tr>";
							while ($row = mysql_fetch_array($quer1)){
								echo "<tr><td>".$row['name']."<br></td></tr>"; 								
							}
							echo "</table>";
						}
							
						//header("Location: index.html");
						exit;
						mysql_close($conn);
					?>