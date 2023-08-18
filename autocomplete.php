<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "phplesson";

$conn = new mysqli($servername, $username, $password, $dbname);

$searchTerm = $_GET['term'];

$sql = "SELECT name FROM country WHERE name LIKE '%" . $searchTerm . "%'";

$result = $conn->query($sql);

$countries = array();
while ($row = $result->fetch_assoc()) {
    $countries[] = $row['name'];
}

echo json_encode($countries);
