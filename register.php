<?php
    include("dbconn.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $loginID = mysqli_real_escape_string($conn,$_POST['loginID']);
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $stmt = "INSERT INTO users (loginID, name, email,password) 
  			  VALUES('$loginID', '$name', '$email', '$password')";
          $result = mysqli_query($conn, $stmt);
          if($result)
          {
              header('location:index.php');
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
    <p class="navbar-brand text-white">Insta-Feed</p>
    <form action="" method="POST">
        <p class="text-danger text-center"></p>
        <div class="form-group ">
            <label for="loginID" class="">Login ID </label>
            <input type="text" id="loginID" class="form-control" name="loginID">
        </div>
        <div class="form-group ">
            <label for="loginID" class="">Name </label>
            <input type="text" id="name" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" name = "email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" name = "password">
        </div>

        <button class="btn bg-dark text-white" name="signUpBtn">Sign up</button>
        <p class=" subtitle text-center text-white ">Already have an account? <a href="index.php" class="text-center text-white">Log in</a></p>
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