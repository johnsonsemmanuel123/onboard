<?php include('../model/classController.php'); ?>
<?php 
@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];
$username = $_SESSION['name'];
$usercode = $_SESSION['username'];
$branch = $_SESSION['shopcode'];


if (isset($iddeleteAttached)) {
$results = $content->deletes_fromcart($iddeleteAttached);
if ($results) {
$msg = 1;
}
}





if (isset($databasez)) {
$results = $content->deletes_itemz($idz,$databasez);
if ($results) {
$audit_activity=$message.' Deleted';
$audit_details='User Performed '.$message.' Deletion =>'.$idz;
@include('auditController.php');
echo 'deleted';
}
}

?>