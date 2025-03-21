<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="../assets/images/logo.jpg" alt="Aduanefie Logo">
                    </div>
                    <div class="login-userheading">
                        <h3>Buyer Portal Sign In</h3>
                        <h4>Please login to your account as a buyer</h4>
                    </div>

                    <!-- Notice -->
                    <div class="alert alert-info" style="background: #f8f9fa; padding: 10px; border-left: 4px solid #8ba068; margin-bottom: 15px;">
                        <strong>Note:</strong> The Aduanefie Buyer Portal is exclusively for **companies and corporate bodies**. Individual buyers should use the Aduanefie Marketplace App.
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="../controller/loginController.php">
                        <!-- CSRF Token -->
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="category" value="1">

                        <!-- Email Input -->
                        <div class="form-login">
                            <label>Email <span style="color: red">*</span></label>
                            <div class="form-addons">
                                <input type="email" name="useremail" id="useremail" placeholder="Enter your email" required>
                                <img src="../assets/img/icons/mail.svg" alt="Email Icon">
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="form-login">
                            <label>Password <span style="color: red">*</span></label>
                            <div class="pass-group">
                                <input type="password" name="password" id="password" class="pass-input" placeholder="Enter your password" required>
                                <span class="fas toggle-password fa-eye-slash" onclick="togglePassword()"></span>
                            </div>
                        </div>

                        <!-- Forgot Password -->
                        <div class="form-login">
                            <div class="alreadyuser">
                                <h4><a href="index.php?page=forgotpassword" class="hover-a">Forgot Password?</a></h4>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="form-login">
                            <input class="btn btn-login" type="submit" name="loginBtn" value="Sign In" style="background: #8ba068;">
                        </div>
                    </form>

                    <!-- Signup Link -->
                    <div class="signinform text-center">
                        <h4>Don’t have an account? <a href="index.php?page=signup" class="hover-a">Sign Up</a></h4>
                    </div>

                    <!-- Display Login Errors -->
                    <?php if (isset($_SESSION['login_error'])): ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-setlogin">
                        <h4><?php echo date('d-M-Y'); ?></h4>
                    </div>
                </div>
            </div>

            <!-- Login Image -->
            <div class="login-img">
                <img src="../assets/images/banner.jpg" alt="Aduanefie Banner">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Password Toggle -->
<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.querySelector(".toggle-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>
