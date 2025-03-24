<?php @include ('../model/classController.php'); ?>
<?php 
$content = new crudOperation();
$idcode = $_GET['mid'];
$idvalue = $_GET['mvac'];
$user = $_SESSION['username'];
if ($idvalue<0) {
$output['get_returned'] = 1;
$taxx = $content->fnc_tax();
$output['get_taxtotals'] = number_format($taxx,2);
}else{
$taxx = $content->fnc_tax();
$sum_amount = $content->shopselect_sum($user);
$otaolx = $taxx+$sum_amount;
$content->update_cartxshop($idcode,$idvalue);
$output['get_returned'] = 2;	
$output['get_taxtotals'] = number_format($taxx,2);	
$output['get_maintotals'] = number_format($sum_amount,2);	
$output['get_returnedtotals'] = number_format($otaolx,2);	
}
echo json_encode($output);
?>