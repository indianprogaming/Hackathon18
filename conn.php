<?php
$servername = "localhost";
$username3 = "infoseed";
$password3 = "cosmos1Andme1";
$dbname="infoseed";

$conn = new mysqli($servername, $username3, $password3 , $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
?>
