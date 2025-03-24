<?php
$servername ="localhost";
$username ="Gabby";
$password ="gabbyinchrist";
$dbname ="db_aduanefieonboard";
$conn = mysqli_connect ($servername, $username, $password, $dbname);
if (!$conn) {
die ( "Connection Failed: " . mysqli_connect_error($conn));
}
?>