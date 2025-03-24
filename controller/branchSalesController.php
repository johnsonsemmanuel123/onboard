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
$item_code = mysqli_real_escape_string($conn, $item_code);
$basic_pricex = mysqli_real_escape_string($conn, $basic_pricex);
$hidden_quantities = mysqli_real_escape_string($conn, $hiddenactualquantity);
$entryChex = $content->fnc_entrychex($item_code);
if (!empty($entryChex)) {
echo "<script>location='../view/index.php?page=purchases'</script>";
}else{
$single=1;
if ($hidden_quantities>$enteredQuantities) {
$enteredQuantitieschecked = $enteredQuantities;
}else{
$enteredQuantitieschecked = $hidden_quantities;
}


$fields = [
'stock_id' => trim($item_code),
'quantity' => trim($enteredQuantitieschecked),
'price' => trim($basic_pricex),
'user' => trim($username),
'user_code' => trim($usercode),
'branch_code' => trim($branch)
];
$db = 'tbl_temporals';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
echo "<script>location='../view/index.php?page=purchases'</script>";
}
}
}



if (isset($customerSubmitted)){
$firstname = mysqli_real_escape_string($conn, $fname);
$othernames = mysqli_real_escape_string($conn, $onames);
$phone_number = mysqli_real_escape_string($conn, $phone_number);
$country = mysqli_real_escape_string($conn, $cust_country);
$address = mysqli_real_escape_string($conn, $cust_address);
$single=1;
$fields = [
'firstname' => trim($firstname),
'othernames' => trim($othernames),
'phone_number' => trim($phone_number),
'country' => trim($country),
'address' => trim($address),
'branch_code' => trim($branch)
];
$db = 'tbl_customers';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
echo "<script>location='../view/index.php?page=purchases'</script>";
}
}
?>