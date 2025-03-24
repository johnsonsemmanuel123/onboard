<?php @include ('../model/classController.php'); ?>
<?php @include ('../model/dbconnect.php'); ?>
<?php 
@session_start();
$content = new crudOperation();
$update = new crudOperation();
extract($_POST);
$_SESSION['last_time'] = time();
$ip = $_SERVER["REMOTE_ADDR"];

if (isset($loginBtn)){


$groupType = mysqli_real_escape_string($conn, $category);
if ($groupType==1) {
$pagedirection='buyer';
}else if($groupType==2){
$pagedirection='grower';	
}else{
$pagedirection='admin';	
}


$enter_staffcode = mysqli_real_escape_string($conn, $useremail);
$enter_password = mysqli_real_escape_string($conn, $password);
$hashed_passwords = md5($enter_password);
$selectedfromlogins = $content->select_chexaduanefie($enter_staffcode);
if (!empty($selectedfromlogins)) {
foreach ($selectedfromlogins as $data) {
$fetchedbkup = $data['password'];
}

if ($fetchedbkup==$hashed_passwords) {
$fields = [
'email' => trim($enter_staffcode),
'address' => trim($ip)
];
$db = 'login_attempts';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$selectedCounts = $content->select_countsaduanefie($enter_staffcode);
if ($selectedCounts > 3) {
//Exceeded limit
$_SESSION['log_response']=1;
echo "<script>location='../".$pagedirection."/index.php?page=login'</script>";
}else{
if ($password=='$P@ssw0rd') {
echo "<script>location='../".$pagedirection."/index.php?page=changedefault'</script>";
}else{
foreach ($selectedfromlogins as $data) {
$fetchedbkup = $data['password'];
$_SESSION['role_id'] = $data['user_id'];	
$_SESSION['role_name'] = $data['user_role'];
$_SESSION['username'] = $_POST['useremail'];
$_SESSION['name'] = $data['first_name'].' '.$data['last_name'];
$_SESSION['aduanefie'] = $data['organization'];
$_SESSION['aduanefie_image'] = $data['aduanefie_image'];
$_SESSION['update'] = $data['update_permission'];
$_SESSION['delete'] = $data['delete_permission'];
// $_SESSION['branchcode'] = $data['shop_code'];
$_SESSION['last_login_timestamp']=time();
}
$audit_activity='Successful Login';
$audit_details='User Successfully Logged Into The System';
@include('auditController.php');
echo "<script>location='../view/index.php?page=dashboard'</script>";
}
}
}
}else{
//wrong password
$_SESSION['log_response']=2;
echo "<script>location='../".$pagedirection."/index.php?page=login'</script>";
}
}else{
//Staff exist not
$_SESSION['log_response']=3;
echo "<script>location='../".$pagedirection."/index.php?page=login'</script>";
}
}
?>