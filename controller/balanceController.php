<?php @include ('../model/classController.php'); ?>
<?php 
$content = new crudOperation();
$user = $_SESSION['username'];
$taxx = $content->fnc_tax();
$role=$_SESSION['role_id'];
if ($role==3 || $role==4) {
$sum_amount = $content->shopselect_sum($user);
}else{
$sum_amount = $content->select_sum($user);
}
$otaolx = $taxx+$sum_amount;	
$output['get_returnedtotals'] = $otaolx;
echo json_encode($output);
?>