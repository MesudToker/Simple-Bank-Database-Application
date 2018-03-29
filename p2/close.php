<?php
	include('welcome.php');
	//$close_id = ($_WELCOME['close_id']);
	$close_id = $_GET['value_key'];
	$sqlnew2="DELETE FROM owns WHERE aid='$close_id' AND cid = '$user_id'";
	$sqlnew="DELETE account FROM account 
	LEFT JOIN owns ON account.aid = owns.aid 
	WHERE owns.aid IS NULL";
	$resultnew2 = mysqli_query($db, $sqlnew2) or 
	die("Unable to delete database entry from owns.");
	$resultnew = mysqli_query($db, $sqlnew) or 
	die("Unable to delete database entry from accounts.");
	
	 //header("location:welcome.php");
	 //echo "Succesfully Deleted";
	 //echo "<script>setTimeout(\"location.href = 'welcome.php';\",1500);</script>";
?>

<h2>Succesfully Deleted</h2>
<h3>Returning Welcome Page in 2 seconds</h3>
<meta http-equiv="refresh" content="2;url=welcome.php" />
