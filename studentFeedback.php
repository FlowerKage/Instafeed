<?php
    include("dbconn.php");


    $stmt = "SELECT * FROM studentfeedback";
    // $sql="SELECT Lastname,Age FROM Persons ORDER BY Lastname";

    if ($result=mysqli_query($conn,$stmt))
        {
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($result);
            //printf("Result set has %d rows.\n",$rowcount);
            // Free result set
            mysqli_free_result($result);
        }
        $stmt = "SELECT avg(rating) as average_rating FROM studentFeedback";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InstaFeed - Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Faster+One&family=Fredoka+One&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

</head>
<body class="bg-dark">
    <nav class="navbar navbar-dark bg-primary">
        <a href="" class="navbar-brand " >Insta-feed</a>
        <ul class=" nav justify-content-end">
            <li class="nav-item" text-white>
                <a href="studentFeedback.php" class="nav-link text-white">Student Feedback</a>
            </li>
            <li class="nav-item" text-white>
                <a href="./lecturer.php" class="nav-link text-white">Add a lecture</a>
            </li>
        </ul>
    </nav>
 <h1 class="text-center text-white">Student Feedback</h1>
 
        <canvas id="graphCanvas" width="800" height="200"></canvas>
    
    <div id ="extraInfo">
        <p class="text-white">Student Average: </p>
        <p class="text-white">Number Of Students: <?php echo $rowcount; ?> </p>      
        <h2 class="text-white text-center">Student Questions:</h2>
        <div>

            <?php 
                 include("dbconn.php");
                 $stmt = "SELECT * FROM studentfeedback";

                 $result = mysqli_query($conn, $stmt);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                // echo "Name: " . $row["name"]. $row["comments"]. "<br>";
                echo "<div class = 'bg-primary form'> <p> Name: " . $row["name"]."</p>". $row["comments"]. "</div>";
                }
                } else {
                        echo "No Comments";
                }

            ?>


        </div>
    </div>
    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var rating = [];

                    for (var i in data) {
                        name.push(data[i].name);
                        rating.push(data[i].rating);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Student Understanding',
                                backgroundColor: '#0275d8',
                                borderColor: 'yellow',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: rating
                            }
                        ]
                    };
                    

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata,
                        
                    });
                });
            }
        }
        </script>




<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
