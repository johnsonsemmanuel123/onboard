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
if (isset($_SESSION['bought_code'])) {
unset($_SESSION['bought_code']);
}
$selected = $content->func_reprintsdata($reprints_code);
if (!empty($selected)) {
foreach ($selected as $datax) {
$_SESSION['bought_code']=$datax['session_code'];
$_SESSION['session_number'] = 1;
$_SESSION['session_amount'] = $datax['session_amount'];
$_SESSION['session_cname'] = $datax['session_cname'];
$_SESSION['session_ctel'] = $datax['session_cphone'];
$_SESSION['session_recieved_amount'] = $datax['session_recieved_amount'];
$_SESSION['session_balance'] = $datax['session_balance'];
$_SESSION['session_tax_reprints'] = $datax['session_tax'];
$audit_activity='Rececipt Reprint';
$audit_details='User Performed A Reprint Of Receipt';
@include('auditController.php');
echo "<script>location='../view/printrouts.php?page=receipt'</script>";
}
}else{
echo "<script>location='../view/index.php?page=saleslist'</script>";
}

?>