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
$output['get_returned'] = 1;	
$output['get_taxtotals'] = number_format($taxx,2);	
$output['get_maintotals'] = number_format($sum_amount,2);	
$output['get_returnedtotals'] = number_format($otaolx,2);
echo json_encode($output);
?>