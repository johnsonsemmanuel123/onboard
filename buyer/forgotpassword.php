<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset ">
<form method="POST" action="../controller/otpchangepassword.php">
<div class="login-logo">
<img src="../assets/images/logo.jpg" alt="img">
</div>
<div class="login-userheading">
<h3>Forgot password?</h3>
<h4>Don’t warry! it happens. Please enter you email <br>
associated with your account.</h4>
</div>
<div class="form-login">
<input type="hidden" name="category" value="1">
<label>Email <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="emailaddress" placeholder="Enter your email address">
<img src="../assets/img/icons/mail.svg" alt="img">
</div>
</div>
<div class="form-login">
<input class="btn btn-login" type="submit" name="btnSubmitOriginal" value="Submit" style="padding-bottom: 40px;background: #8ba068;">
</div>
<div class="signinform text-center">
<h4>Remember Password ? <a href="index.php?page=login" class="hover-a">Sign In</a></h4>
</div>
</form>
<div class="form-setlogin">
<h4><?php echo date('d-M-Y'); ?></h4>
</div>
</div>
</div>
<div class="login-img">
<img src="../assets/images/banner.jpg" alt="img">
</div>
</div>
</div>
</div>