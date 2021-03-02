<?php


$servername = "162.241.226.61";
$username = "selinfoo_sso2";
$password = "74;v2Wx8rzts";
$db = "selinfoo_sso2";
$port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "SELECT * FROM `jobs`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo "<pre>";
   print_r($row);
   echo "</pre>";
  }
}
die();

$servername = "sql398.main-hosting.eu";
$username = "u364409092_jobs";
$password = "w5nKN3&q";
$db = "u364409092_jobs";
$port = "3306";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";




?>