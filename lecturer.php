

<?php
    include("dbconn.php");
    include("lecturerSession.php");
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $lectureName = mysqli_real_escape_string($conn,$_POST['lectureName']);
        $lectureDescription = mysqli_real_escape_string($conn,$_POST['lectureDescription']);
  
        $stmt = "INSERT INTO lectures (name, description) 
  			  VALUES('$lectureName', '$lectureDescription')";
          $result = mysqli_query($conn, $stmt);
          if($result)
          {
              header('location:lecturer.php');
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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Fredoka+One&family=Montserrat&display=swap" rel="stylesheet">
</head>
<body class="bg-dark">
    <nav class="navbar navbar-dark bg-primary">
        <a href="" class="navbar-brand " >Insta-feed</a>
        <ul class=" nav justify-content-end">
            <li class="nav-item" text-white>
                <a href="./studentFeedback.php" class="nav-link text-white">Student Feedback</a>
            </li>
            <button class="btn bg-dark text-white"><a href="logout.php" class="text-white">Logout</a></button>
            
        </ul>
    </nav>
 <h1 class="text-center text-white">Welcome Lecturer <?php echo $login_session?></h1>
 <h3 class="text-center text-white">What will you be teaching today?</h3>
 <form action="" method="POST" class ="form bg-primary" >
  <div class="form-group">
    <label for="lectureName">Lecture Name</label>
    <input type="text" class="form-control" id="lectureName" name="lectureName" />
  </div>
  <div class="form-group">
    <label for="lectureDescription">Lecture Description</label>
    <input type="text-area" class="form-control txtArea" id="lectureDescription" name="lectureDescription" />
  </div>  
  <button class="btn bg-dark text-white">Post Lecture</button>
</form>



<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>