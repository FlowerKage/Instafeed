
<?php
   include("dbconn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      
      $loginID = mysqli_real_escape_string($conn,$_POST['loginID']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $stmt = "SELECT * FROM users WHERE loginID ='$loginID'
      AND password = '$password'";
      $result = mysqli_query($conn,$stmt);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(mysqli_num_rows($result) == 1)
      {
          while($row = mysqli_fetch_assoc($result))
          {
             if($row["role"] == "lecturer")
             {
                
                $_SESSION['student'] = $loginID; 
                header('Location: lecturer.php');
             }
             else if($row["role"] == "student") {
                
                 header('Location: student.php');
             }
          }
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaFeed - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Fredoka+One&family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="bg-dark">
<!-- <nav class="navbar navbar-dark bg-dark yexy-white">
        <a href="" class="navbar-brand " >Insta-feed</a>
</nav> -->
<div class="bg-primary form">
    <p class="text-white text-center navbar-brand">Insta-Feed</p>
    <form action="" method="POST">
        <p class="text-danger text-center"></p>
        <div class="form-group ">
            <label for="loginID" class="">Login ID </label>
            <input type="text" id="loginID" class="form-control" name="loginID">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name = "password">
        </div>
        <button class="btn bg-dark text-white" name="loginBtn">Log in</button>
        <p class=" subtitle text-center text-white ">Don't have an account? <a href="register.php" class="text-center text-white">Sign up</a></p>
    </form>
</div>



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>