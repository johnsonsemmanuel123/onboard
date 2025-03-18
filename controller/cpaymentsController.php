<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php');

@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];
$username = $_SESSION['name'];
$usercode = $_SESSION['username'];
$branch = $_SESSION['shopcode'];
if (isset($masterSalesSubmitted)){
$code = mysqli_real_escape_string($conn, $trans_code);
$amount = mysqli_real_escape_string($conn, $enteredQuantities);

$chex = (int)$amountforgoods-((int)$amount+(int)$amountalreadypaid);


$fields = [
'transaction_code' => trim($code),
'amount_paid' => trim($amount),
'username' => trim($username),
'shop_code' => trim($branch)
];
$db = 'tbl_creditpayments';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=7;
$audit_activity='Credit Payments';
$audit_details='User Received Payment From Customer=>'.$amount;
@include('auditController.php');
$chex < 1 ? $content->update_repayments($code):'';
echo "<script>location='../view/index.php?page=saleslist'</script>";
}
}
?>