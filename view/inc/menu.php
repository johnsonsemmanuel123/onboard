<?php $role=$_SESSION['role_id'];
if ($role==1) {
@include('menu/admin.php');
}else if ($role==2) {
@include('menu/growers.php');
}else if ($role==3) {
@include('menu/buyers.php');
}else if ($role==4) {
@include('menu/rm.php');
}
?>