<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   $user_id = $_SESSION['login_user_id'];
   
   $ses_sql = mysqli_query($db,"select name from customer where name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>