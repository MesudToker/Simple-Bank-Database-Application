<html>
   
   <head>
      <title> Welcome </title>
   </head>
   <style>
	table, th, td {
		border: 1px solid black;
	}
	</style> 
	<h2>Your Accounts</h2>
	<?php include('session.php');?>
	<form action = "money.php" method = "post">
	  
		<?php
			$tableSQL = "SELECT A.aid, A.branch, A.balance, A.openDate
			FROM account A, owns O
			WHERE O.cid = '$user_id' AND
			O.aid = A.aid";
			
			$table = mysqli_query($db,$tableSQL);

			if ($table->num_rows > 0) {
				echo "<table><tr><th>aid</th><th>branch</th>
				<th>balance</th><th>openDate</th><th>From</th></tr>";
				// output data of each arow
				while($arow = $table->fetch_assoc()) {
					echo "<tr><td>".$arow["aid"]."</td>
					<td>".$arow["branch"]."</td>
					<td>".$arow["balance"]."</td>
					<td>".$arow["openDate"]."</td>
					<td><div class='radio'>
							<input type='radio' name='fromradio' value=".$arow['aid']." required>
						</div>
					</td>
					</tr>";
				}
				echo "</table>";
			} 
			else {
				echo "You have no account";
			}
		?>	
		<h2>Select which account you want to transfer</h2>
		<?php
			$accountSQL = "SELECT * FROM account";
			
			$acctable = mysqli_query($db,$accountSQL);

			if ($acctable->num_rows > 0) {
				echo "<table><tr><th>aid</th><th>branch</th>
				<th>balance</th><th>openDate</th><th>To</th></tr>";
				// output data of each arow2
				while($arow2 = $acctable->fetch_assoc()) {
					echo "<tr><td>".$arow2["aid"]."</td>
					<td>".$arow2["branch"]."</td>
					<td>".$arow2["balance"]."</td>
					<td>".$arow2["openDate"]."</td>
					<td><div class='radio'>
							<input type='radio' name='toradio' value =".$arow2['aid']." required>
						</div>
					</td>
					</tr>";
				}
				echo "</table>";
			} 
			else {
				echo "There is no account to transfer money";
			}
		?>
		<h2>  </h2>
		<label>Amount to Transfer : </label><input type = "number" name = "amount" class = "box"  placeholder = "Enter amount" required/><br/><br />
		<input type = "submit" value = " Transfer "/><br />
	</form>
		<h2><a href = "welcome.php">Back to Welcome Page</a></h2>
		<h2><a href = "logout.php">Log Out</a></h2>
		
		
	</body>
   
</html>