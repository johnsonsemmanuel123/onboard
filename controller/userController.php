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


if (isset($userSubmitted)){
$fname = mysqli_real_escape_string($conn, $fname);
$onames = mysqli_real_escape_string($conn, $onames);
$phone_number = mysqli_real_escape_string($conn, $phone_number);
$user_role = mysqli_real_escape_string($conn, $user_role);
$user_branch = mysqli_real_escape_string($conn, $user_branch);
$single=1;
	
$fields = [
'first_name' => trim($fname),
'last_name' => trim($onames),
'phone_number' => trim($phone_number),
'password' => trim(md5(ucwords(strtolower($fname.'@'.date('Y'))))),
'user_role' => trim($user_role),
'status' => trim($single),
'shop_code' => trim($user_branch)
];
$db = 'tbl_users';
$lastid = $content->insert($db,$fields);
if ($lastid>0) {
$_SESSION['main_response']=13;
$audit_activity='User Registration';
$audit_details='User Registered A User';
@include('auditController.php');
echo "<script>location='../view/index.php?page=systemusers'</script>";
}
}


// hiddencode
// fnameupdated
// onamesupdated
// phone_numberupdated
// user_roleupdated
// user_branchupdated
// userUpdated


if (isset($userUpdated)){
$firstname = mysqli_real_escape_string($conn, $fnameupdated);
$othernames = mysqli_real_escape_string($conn, $onamesupdated);
$role = mysqli_real_escape_string($conn, $user_roleupdated);
$branch = mysqli_real_escape_string($conn, $user_branchupdated);
$phone = mysqli_real_escape_string($conn, $phone_numberupdated);
if ($content->update_userx($hiddencode,$firstname,$othernames,$phone,$role,$branch)) {
$audit_activity='User Update';
$audit_details='Updated A User roles=>'.$hiddencode;
@include('auditController.php');
$_SESSION['main_response']=14;
echo "<script>location='../view/index.php?page=systemusers'</script>";	
}
}
?>