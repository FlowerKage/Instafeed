<?php
header('Content-Type: application/json');

include("dbconn.php");
$sqlQuery = "SELECT name, rating FROM studentfeedback";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>