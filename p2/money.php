<?php
   include('transfer.php');
   
   $to_id = $_POST['toradio'];
   $from_id = $_POST['fromradio'];
   $amount = $_POST['amount'];
   
   //echo "amount = '$amount'";
   //echo "to_id = '$to_id'";
   //echo "from_id = '$from_id'";
   
   $balance_sql = "SELECT balance FROM account WHERE aid = '$from_id'";  
   $balance = mysqli_query($db, $balance_sql);  
   $row = mysqli_fetch_array($balance);
   $b_amount = $row['balance'];
   
   //echo "balance = '$b_amount'";
   
   $balance_sql2 = "SELECT balance FROM account WHERE aid = '$to_id'";  
   $balance2 = mysqli_query($db, $balance_sql2);  
   $row2 = mysqli_fetch_array($balance2);
   $b_amount2 = $row2['balance'];
   //echo "balance2 = '$b_amount2'";
   if($amount > $b_amount) {
	   echo "Insufficient amount to transfer";
   }
   else if($amount < 0) {
	   echo "You cannot transfer negative amount money";
   }
   else {
		$from_sql = "UPDATE account
		SET balance = balance - '$amount'
		WHERE aid = '$from_id';";
			   
		$to_sql = "UPDATE account
		SET balance = balance + '$amount'
		WHERE aid = '$to_id';";
		
		$result_from = mysqli_query($db, $from_sql);
		$result_to = mysqli_query($db, $to_sql);
		
		echo "Succesfully Transfered";
	   /*
	   try {
			// First of all, let's begin a transaction
			//$db->beginTransaction(MYSQLI_TRANS_START_READ_WRITE);
			
			$from_sql = "UPDATE account
			SET balance = balance - '$amount'
		   WHERE aid = '$from_id';";
			   
		   $to_sql = "UPDATE account
		   SET balance = balance + '$amount'
		   WHERE aid = '$to_id';";
	   

			// A set of queries; if one fails, an exception should be thrown
			//$db->query($from_sql);
			//$db->query($to_sql);
			
			// If we arrive here, it means that no exception was thrown
			// i.e. no query has failed, and we can commit the transaction
			//$db->commit();
		} catch (Exception $e) {
			// An exception has been thrown
			// We must rollback the transaction
			$db->rollback();
		}
		*/
   }
?>
<h3>Returning Money Transfer Page in 2 seconds</h3>
<meta http-equiv="refresh" content="2;url=transfer.php" />