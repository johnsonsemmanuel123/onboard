<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@extract($_POST);
@session_start();

$senderID='FC-CRUIS';
$phone='0'.trim($hidden_phone);
$_SESSION['success_error']=1;
$message = 'Dear '.$cont_namex.', '.$message_elements.'.<br> Thank you';
@include('sms/main_sms.php');
echo "<script>location='../view/routes.php?page=smspage'</script>";
?>