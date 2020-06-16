<?php
   include('dbconn.php');
   session_start();
   
   $user_check = $_SESSION['login_lecturer'];
   
   $ses_sql = mysqli_query($conn,"select * from users where loginID = '$user_check' AND role = 'lecturer'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   
   if(!isset($_SESSION['login_lecturer'])){
      header("location:index.php");
      die();
   }
?>