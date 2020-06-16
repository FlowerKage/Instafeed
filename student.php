
<?php
    include("dbconn.php");
    include('session.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $rating = mysqli_real_escape_string($conn,$_POST['rating']);
        $comments = mysqli_real_escape_string($conn,$_POST['comments']);
  

        $stmt = "INSERT INTO studentfeedback (name, rating, comments) 
  			  VALUES('$name', '$rating', '$comments')";
          $result = mysqli_query($conn, $stmt);
          if($result)
          {
              header('location:student.php');
          }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaFeed - Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Fredoka+One&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body class="bg-dark">
    <nav class="navbar navbar-dark bg-primary">
        <a href="" class="navbar-brand " >Insta-feed</a>
        
        <button class="btn bg-dark text-white"><a href="logout.php" class="text-white">Logout</a></button>
            
    </nav>
 <h2 class="text-center text-white">Welcome <?php echo $login_session ?></h2>
<form class ="form bg-primary" action="" method="POST">
<div class="form-group ">
    <label for="name" class="">Name </label>
    <input type="text" id="name" class="form-control" name="name">
        </div>
  <div class="form-group">
    <label for="rating">Rate your understanding out of 10</label>
    <input type="range" class="form-control-range bg-primary" id="rating" name="rating" min="0" max="10"/>
  </div>
  <div class="form-group">
    <label for="comments">Any Questions or Comments?</label>
    <input type="text-area" class="form-control txtArea" id="comments" name="comments">
  </div>  
  <button class="btn bg-dark text-white">Submit</button>
</form>



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>