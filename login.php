<div class="main-wrapper">
<div class="account-content">
<div class="login-wrapper">
<div class="login-content">
<div class="login-userset">
<div class="login-logo">
<img src="assets/img/logo.png" alt="img">
</div>
<div class="login-userheading">
<h3>Sign In</h3>
<h4>Please login to your account</h4>
</div>
<form method="POST" action="controller/loginController.php">
<div class="form-login">
<label>Email <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="useremail" placeholder="Enter your email">
<img src="assets/img/icons/mail.svg" alt="img">
</div>
</div>
<div class="form-login">
<label>Password <span style="color: red">*</span></label>
<div class="pass-group">
<input type="password" name="password" class="pass-input" placeholder="Enter your password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
<div class="form-login">
<div class="alreadyuser">
<h4><a href="index.php?page=forgotpassword" class="hover-a">Forgot Password?</a></h4>
</div>
</div>
<div class="form-login">
<input class="btn btn-login" type="submit" name="loginBtn" value="Sign In" style="padding-bottom: 40px;">
</div>
</form>
<div class="signinform text-center">
<h4>Don’t have an account? <a href="index.php?page=signup" class="hover-a">Sign Up</a></h4>
</div>
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