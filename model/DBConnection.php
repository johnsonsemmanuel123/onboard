<?php 
try {
$conn = new PDO('mysql:host=localhost;dbname=db_aduanefieonboard','root','',array(
PDO::ATTR_PERSISTENT => TRUE));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (Exception $e)
{
die($e->getMessage());
}
?>