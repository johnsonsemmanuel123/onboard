<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];

if (isset($GrowerSignUp)){
$groupType = mysqli_real_escape_string($conn, $groupType);
if ($groupType==2) {
$pagedirection='grower';
}else{
$pagedirection='buyer';	
}
$firstname = mysqli_real_escape_string($conn, $firstname);
$othernames = mysqli_real_escape_string($conn, $othernames);
// $country = mysqli_real_escape_string($conn, $country);
$phone = mysqli_real_escape_string($conn, $phone);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$confirmpassword = mysqli_real_escape_string($conn, $confirmpassword);
$hashed_passwords = md5($password);
$selectedfromlogins = $content->select_chexsignupaduanefie($email);
if (!empty($selectedfromlogins)) {
//Alresdy registered
$_SESSION['log_response']=9;
echo "<script>location='../".$pagedirection."/index.php?page=login'</script>";
}else{
if ($password!=$confirmpassword) {
$_SESSION['log_response']=8;
echo "<script>location='../".$pagedirection."/index.php?page=signup'</script>";
}else{
$one=1;
$country='Ghana';
$fields = [
'email' => trim($email),
'country' => trim($country),
'first_name' => trim($firstname),
'last_name' => trim($othernames),
'phone_number' => trim($phone),
'password' => trim($hashed_passwords),
'user_role' => trim($groupType),
'status' => trim($one),
'organization' => trim($one)
];
$db = 'tbl_users';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['log_response']=10;
echo "<script>location='../".$pagedirection."/index.php?page=login'</script>";
}
}
}
}
?>