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

if (isset($addmasterExpenses)){
$expensestype = mysqli_real_escape_string($conn, $expense_types);
$expenses_amount = mysqli_real_escape_string($conn, $expense_description);
$fields = [
'expenses_description' => trim(strtoupper($expensestype)),
'added_by' => trim($username),
'shop_code' => trim($branch)
];
$db = 'tbl_expenses';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$audit_activity='Expenses Capture';
$audit_details='User Captured An Expenses Type';
@include('auditController.php');
$_SESSION['main_response']=12;
echo "<script>location='../view/index.php?page=expensesettings'</script>";	
}
}

if (isset($customerSubmitted)){
$expensestype = mysqli_real_escape_string($conn, $expensestype);
$expenses_amount = mysqli_real_escape_string($conn, $expenses_amount);
$expense_comments = mysqli_real_escape_string($conn, $expense_comments);
$fields = [
'expenses_id' => trim($expensestype),
'amount' => trim($expenses_amount),
'shop_code' => trim($branch),
'captured_by' => trim($username),
'comments' => trim($expense_comments)
];
$db = 'tbl_expensescaptured';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$audit_activity='Expenses Capture';
$audit_details='User Captured An Expenses';
@include('auditController.php');
$_SESSION['main_response']=8;
echo "<script>location='../view/index.php?page=expenselist'</script>";	
}
}

if (isset($updateSubmitted)){
$expensestype_updates = mysqli_real_escape_string($conn, $expensestype_updates);
$expenses_amount_updates = mysqli_real_escape_string($conn, $expenses_amount_updates);
$expense_comments_updates = mysqli_real_escape_string($conn, $expense_comments_updates);
if ($content->update_expenses($hiddencode,$expensestype_updates,$expenses_amount_updates,$expense_comments_updates)) {
$audit_activity='Expenses Update';
$audit_details='User Updated An Expenses=>'.$hiddencode;
@include('auditController.php');
$_SESSION['main_response']=9;
echo "<script>location='../view/index.php?page=expenselist'</script>";	
}
}
?>