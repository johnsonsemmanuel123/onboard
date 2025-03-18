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
$array_chex = array();
$completepayments=1;

if (isset($_GET['clearcode'])) {
$code = $_GET['clearcode'];
if ($code==123) {
$content->fnc_zappedcart($usercode);
echo "<script>location='../view/index.php?page=newsales'</script>";
}
}


if (isset($checkOutBtn)){
$amt_tendered = mysqli_real_escape_string($conn, $tenderedAmount);
$balance = mysqli_real_escape_string($conn, $balanceAmount);
$explode = mysqli_real_escape_string($conn, $customertype);
$explo1 = explode('|', $explode);
$cutomer_name = $explo1[0];

$cutomer_phone = $explo1[1];
$payment_type = mysqli_real_escape_string($conn, $paymenttype);
$entryChex = $content->fnc_performsales($usercode);
$carttotal = number_format(($amt_tendered-$balance),2);


if (empty($entryChex)) {
echo "<script>location='../view/index.php?page=newsales'</script>";
}else{
$single=1;

foreach ($entryChex as $mdata) {
$sid = $mdata['stock_id'];
$sqty = $mdata['quantity'];
$entryChexz = $content->fnc_performsales2($sid);
if (!empty($entryChexz)) {
foreach ($entryChexz as $mdataz) {
$main_sqty = $mdataz['quantity'];
$product_name = $mdataz['product_name'];
$cost_price = $mdataz['basic_price'];
$selling_price = $mdataz['selling_price'];
}
}
$qtychex = $main_sqty-$sqty;
array_push($array_chex, $qtychex);
if ($content->chex_negative($array_chex)) {
echo "<script>location='../view/index.php?page=newsales'</script>";
}else{
$content->update_stockpurchase($sid,$qtychex);	
$twox=1;
if ($payment_type=='Credit_Pay') {
$completepayments=0;
}
$fields = [
'complete_payment' => trim($completepayments),
'payment_category' => trim($payment_type),
'transaction_code' => trim($hiddencode),
'category' => trim($twox),
'product_id' => trim($sid),
'product_name' => trim($product_name),
'customer_name' => trim($cutomer_name),
'customer_phone' => trim($cutomer_phone),
'cprice' => trim($cost_price),
'sprice' => trim($selling_price),
'quantity' => trim($sqty),
'total_cprice' => trim($cost_price*$sqty),
'total_sprice' => trim($selling_price*$sqty),
'profits' => trim(($selling_price*$sqty)-($cost_price*$sqty)),
'user_code' => trim($usercode),
'user_name' => trim($username)
];
$db = 'sales_centralstores';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
if ($content->fnc_zappedcart($usercode)) {
$_SESSION['bought_code']=$hiddencode;
$_SESSION['session_number'] = 1;
$_SESSION['session_amount'] = $carttotal;
$_SESSION['session_cname'] = $cutomer_name;
$_SESSION['session_ctel'] = $cutomer_phone;
$_SESSION['session_recieved_amount'] = $amt_tendered;
$_SESSION['session_balance'] = $balance;
$fields_reprints = [
'session_code' => trim($hiddencode),
'session_amount' => trim($carttotal),
'session_cname' => trim($cutomer_name),
'session_cphone' => trim($cutomer_phone),
'session_recieved_amount' => trim($amt_tendered),
'session_balance' => trim($balance),
'session_tax' => trim($content->fnc_tax())
];
$db_reprints = 'tbl_reprints';
$lastid_reprint = $content->insert($db_reprints,$fields_reprints);
echo "<script>location='../view/printrouts.php?page=receipt'</script>";
}
}
}
}
}
}

?>