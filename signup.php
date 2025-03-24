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
<form method="POST" action="controller/signupController.php">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>First Name <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="firstname" placeholder="Enter First Name">
<img src="assets/img/icons/users1.svg" alt="img">
</div>
</div>
</div>	
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Other Names <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="othernames" placeholder="Enter Othernames">
<img src="assets/img/icons/users1.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Region <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="country" placeholder="Enter Your Country">
<!-- <img src="assets/img/icons/mail.svg" alt="img"> -->
</div>
</div>
</div>	
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Phone Number <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="phone" placeholder="024">
<!-- <img src="assets/img/icons/mail.svg" alt="img"> -->
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Email Address <span style="color: red">*</span></label>
<div class="form-addons">
<input type="email" name="email" placeholder="Enter Email Address">
<img src="assets/img/icons/mail.svg" alt="img">
</div>
</div>
</div>	
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Phone Number <span style="color: red">*</span></label>
<div class="form-addons">
<input type="text" name="phone" placeholder="024">
<!-- <img src="assets/img/icons/mail.svg" alt="img"> -->
</div>
</div>
</div>
</div>


<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Password <span style="color: red">*</span></label>
<div class="form-addons">
<input type="password" name="password" placeholder="Enter Password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div>	
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-login">
<label>Confirm Password <span style="color: red">*</span></label>
<div class="form-addons">
<input type="password" name="confirmpassword" placeholder="Confirm Password">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div>
</div>
<div class="form-login">
<input class="btn btn-login" type="submit" name="GrowerSignUp" value="Sign In" style="padding-bottom: 40px;">
</div>
</form>
<div class="signinform text-center">
<h4>Have an account? <a href="index.php?page=login" class="hover-a">Sign In</a></h4>
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