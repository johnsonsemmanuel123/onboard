<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset ">
<form method="POST" action="controller/otpchangepassword.php">	
<div class="login-logo">
<img src="assets/img/logo.png" alt="img">
</div>
<div class="login-userheading">
<h3>OTP Confirmation</h3>
<h4>Please enter the OTP <br>
sent to your phone associated with your account.</h4>
</div>
<div class="form-login">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-addons" style="padding-bottom: 10px">
<input type="hidden" name="staffID" value="<?php echo $_SESSION['hiddeStaffCode']; ?>">
<input type="text" name="hiddencode" class="col-6" placeholder="Enter OTP Code Here">
<img src="assets/img/icons/users1.svg" alt="img">
</div>
</div>
</div>
<div class="form-addons" style="padding-bottom: 10px">
<input type="text" name="newpassword" class="col-6" placeholder="Enter Your New Password">
<img src="assets/img/icons/users1.svg" alt="img">
</div>
<div class="form-addons">
<input type="text" name="confirmnewpassword" class="col-6" placeholder="Confirm Your New Password">
<img src="assets/img/icons/users1.svg" alt="img">
</div>
</div>
<div class="form-login">
<input class="btn btn-login" type="submit" name="btnSubmitOTP" value="Submit Code" style="padding-bottom: 40px;">
</div>
<div class="signinform text-center">
<h4>Remember Your Password ? <a href="index.php?page=login" class="hover-a">Click Here To Login</a></h4>
</div>
</form>
<div class="form-setlogin">
<h4><?php echo date('d-M-Y'); ?></h4>
</div>
</div>
</div>
<div class="login-img">
<img src="assets/img/login.jpg" alt="img">
</div>
</div>
</div>
</div>