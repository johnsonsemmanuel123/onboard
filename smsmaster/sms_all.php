<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@extract($_POST);
@session_start();
$context = new crudOperation();
$rdetail = $context->sel_smsdata();
@include('sms/smsall.php');
$sms='sms_data_sent';
$fields=[
'sms' => trim($sms)
];
$database = 'sms_dates';
$lastid = $context->insert($database,$fields);
if ($lastid>0) {
echo 1;
}
?>