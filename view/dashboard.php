<?php $role=$_SESSION['role_id'];
if ($role==1) {
@include('dashboard/admin.php');
}else if ($role==2) {
@include('dashboard/growers.php');
}else if ($role==3) {
@include('dashboard/buyers.php');
}else if ($role==4) {
@include('dashboard/rm.php');
}
?>