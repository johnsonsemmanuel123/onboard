<?php @session_start(); ?>
<?php 
@include('../model/classController.php'); 
@$content = new crudOperation();

$selectCompanyDetails = $content->func_shopinfo();
if (!empty($selectCompanyDetails)) {
foreach ($selectCompanyDetails as $xrowz) {
$name = $xrowz['shop_name'];
$phone = $xrowz['phone_number'];
$image = $xrowz['image'] ?? 'dammy.png';
}
}else{
$name = 'Default Shop Name';
$phone = '0248383212';
$image = 'dammy.png';	
}
?>
<?php 
$page = @$_GET['page']; 
$page_error = 'error';
$file_exist = file_exists($page.'.php');
if ($file_exist==1) {
@include $page.'.php';
}else{
@include $page_error.'.php';
}
?>