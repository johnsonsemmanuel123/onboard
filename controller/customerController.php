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
$_SESSION['main_response']=10;
$audit_activity='Customer Registration';
$audit_details='User Registered A Customer';
@include('auditController.php');
echo "<script>location='../view/index.php?page=customers'</script>";
}
}





if (isset($customerUpdated)){
$firstname = mysqli_real_escape_string($conn, $fname);
$othernames = mysqli_real_escape_string($conn, $onames);
$phone_number = mysqli_real_escape_string($conn, $phone_number);
$country = mysqli_real_escape_string($conn, $cust_country);
$address = mysqli_real_escape_string($conn, $cust_address);
if ($content->update_customer($hiddencode,$firstname,$othernames,$phone_number,$country,$address)) {
$audit_activity='Customer Update';
$audit_details='User Updated A Customer=>'.$hiddencode;
@include('auditController.php');
$_SESSION['main_response']=11;
echo "<script>location='../view/index.php?page=customers'</script>";	
}
}
?>