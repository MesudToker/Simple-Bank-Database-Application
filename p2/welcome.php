<html>
   
   <head>
      <title> Welcome </title>
   </head>
   <style>
	table, th, td {
		border: 1px solid black;
	}
	</style> 
   <body>
		<h1>Welcome <?php include('session.php'); 
			echo $login_session; ?></h1> 
		
		<h2>Your Accounts</h2>
	  
		<?php
			$tableSQL = "SELECT A.aid, A.branch, A.balance, A.openDate
			FROM account A, owns O
			WHERE O.cid = '$user_id' AND
			O.aid = A.aid";
			
			$table = mysqli_query($db,$tableSQL);

			if ($table->num_rows > 0) {
				echo "<table><tr><th>aid</th><th>branch</th>
				<th>balance</th><th>openDate</th><th> </th></tr>";
				// output data of each arow
				while($arow = $table->fetch_assoc()) {
					echo "<tr><td>".$arow["aid"]."</td>
					<td>".$arow["branch"]."</td>
					<td>".$arow["balance"]."</td>
					<td>".$arow["openDate"]."</td>
					<td><a href='close.php?value_key=".$arow['aid']."'>Close</a></td>
					</tr>";
					//echo "<h3>Close</h3>";
				}
				echo "</table>";
			} 
			else {
				echo "You have no account";
			}
		?>
		<h2><a href = "transfer.php">Money Transfer</a></h2>
		<h2><a href = "logout.php">Log Out</a></h2>
   </body>
   
</html>