<?php 
@session_start(); 
class DbConnection
{
protected function conn()
{
try {  
@$conn = new PDO('mysql:host=localhost;dbname=db_aduanefieonboard','Gabby','gabbyinchrist',array(
PDO::ATTR_PERSISTENT => TRUE));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
return $conn;
} 
catch (Exception $e)
{
die($e->getMessage());
}
}


protected function conx()
{
$servername ="localhost";
$username ="Gabby";
$password ="gabbyinchrist";
$dbname ="db_aduanefieonboard";
$conx = mysqli_connect ($servername, $username, $password, $dbname);
return $conx;
}
static function closeConnection() {
$conn=null;
}
}
?>