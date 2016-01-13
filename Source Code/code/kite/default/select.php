	<?php
					 
						$servername="qpdb-instance.cm83ywnvtqso.us-west-2.rds.amazonaws.com:3306";
						$user="qp_user";
						$password="password123";
						$dbname="QP_db";
						$conn=mysql_connect($servername,$user,$password);
						$db=mysql_select_db($dbname,$conn);
						$quer=mysql_query("select id, name from node");
						?>
						<p>Select a garage</p>
            <form method="post" action="garageanalysis.php">
            <select name="garage" style="background-color:green">
			<?php
			while($result=mysql_fetch_array($quer))
						{ ?>
			<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
						<?php 
						}
			?>