<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];
$user_code=$_SESSION['username'];
$user_name=$_SESSION['name'];

if (isset($submitStockEntry)){

$first_name = mysqli_real_escape_string($conn, $first_name);
$other_names = mysqli_real_escape_string($conn, $other_names);
$surname = mysqli_real_escape_string($conn, $surname);
$ghcard = mysqli_real_escape_string($conn, $ghcard);
$phone_number = mysqli_real_escape_string($conn, $phone_number);
$email_address = mysqli_real_escape_string($conn, $email_address);
$region = mysqli_real_escape_string($conn, $region);
$district = mysqli_real_escape_string($conn, $district);
$crop = mysqli_real_escape_string($conn, $crop);
$radio_stacked = mysqli_real_escape_string($conn, $radio_stacked);
$radio_yesnostacked = mysqli_real_escape_string($conn, $radio_yesnostacked);
$yes_specified = mysqli_real_escape_string($conn, $yes_specified);

@$file_name_image = $_FILES['file']['name'];
@$image_temp_name = $_FILES['file']['tmp_name'];
@$image_type = $_FILES['file']['type'];
@$image_extention = strtolower(substr($file_name_image, strpos($file_name_image, '.')+1));
@$location = "images/".basename($_FILES['file']['name']);
@move_uploaded_file($_FILES['file']['tmp_name'], $location);





$fields = [ 
'pix' => trim($file_name_image),
'first_name' => trim($first_name),
'surname' => trim($surname),
'other_names' => trim($other_names),
'ghana_card' => trim($ghcard),
'phone_number' => trim($phone_number),
'email_address' => trim($email_address),
'farm_region' => trim($region),
'farm_district' => trim($district),
'crop_detail' => trim($crop),
'payment_method' => trim($radio_stacked),
'assistant' => trim($radio_yesnostacked),
'assistant_details' => trim($yes_specified),
'marketer_id' => trim($user_code)
];
$db = 'tbl_growersdata';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=1;
echo "<script>location='../view/index.php?page=newgroweronboard'</script>";
}
}









if (isset($masterSalesSubmitted)){
$trans_code = mysqli_real_escape_string($conn, $trans_code);
$flocation = mysqli_real_escape_string($conn, $flocation);
$crop = mysqli_real_escape_string($conn, $crop);
$landsize = mysqli_real_escape_string($conn, $landsize);
$fields = [ 
'farmer_id' => trim($trans_code),
'location' => trim($flocation),
'farm_size' => trim($landsize),
'crop' => trim($crop),
'registered_by' => trim($user_code)
];
$db = 'tbl_thisyearfarmers';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=3;
echo "<script>location='../view/index.php?page=registeredgrowerslist'</script>";
}
}




if (isset($submitBatchEntry)){
$batch_description = mysqli_real_escape_string($conn, $batch_description);
$batch_source = mysqli_real_escape_string($conn, $batch_source);
$batch_code = mysqli_real_escape_string($conn, $batch_code);

$fields = [ 
'batch_code' => trim($batch_code),
'batch_source' => trim($batch_source),
'description' => trim($batch_description),
'added_by' => trim($user_name)
];
$db = 'tbl_productbatch';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=2;
echo "<script>location='../view/index.php?page=productbatch'</script>";
}
}
?>