<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="../assets/images/logo.jpg" alt="img">
                    </div>
                    <div class="login-userheading">
                        <h3>Grower Sign In</h3>
                        <h4>Please login to your account as an Aduanefie Grower</h4>
                    </div>
                    
                    <!-- Sliding Appreciation Quotes -->
                    <div class="grower-appreciation" style="text-align: left; margin-bottom: 15px; height: 20px; overflow: hidden; position: relative;">
                        <h5 class="quote active" style="color: #8ba068; font-style: italic; font-size: 14px; opacity: 1; transition: opacity 1s;">
                            "Growers are the backbone of our food system – your hard work feeds nations!"
                        </h5>
                        <h5 class="quote" style="color: #8ba068; font-style: italic; font-size: 14px; opacity: 0; position: absolute; top: 0; transition: opacity 1s;">
                            "Farming is more than a job; it’s a way of life that nourishes the world. We appreciate you!"
                        </h5>
                        <h5 class="quote" style="color: #8ba068; font-style: italic; font-size: 14px; opacity: 0; position: absolute; top: 0; transition: opacity 1s;">
                            "Every seed you plant is a promise for a better tomorrow. Thank you for your dedication!"
                        </h5>
                        <h5 class="quote" style="color: #8ba068; font-style: italic; font-size: 14px; opacity: 0; position: absolute; top: 0; transition: opacity 1s;">
                            "The future of food security depends on farmers like you. Keep growing, keep thriving!"
                        </h5>
                    </div>

                    <form method="POST" action="../controller/loginController.php">
                        <input type="hidden" name="category" value="2">
                        <div class="form-login">
                            <label>Email <span style="color: red">*</span></label>
                            <div class="form-addons">
                                <input type="text" name="useremail" placeholder="Enter your email">
                                <img src="../assets/img/icons/mail.svg" alt="img">
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
                                <h4><a href="index.php?page=forgotpassword" style="color: #8ba068;" class="hover-a">Forgot Password?</a></h4>
                            </div>
                        </div>
                        <div class="form-login">
                            <input class="btn btn-login" type="submit" name="loginBtn" value="Sign In" style="padding-bottom: 40px; background: #8ba068;">
                        </div>
                    </form>
                    <div class="signinform text-center">
                        <h4>Don’t have an account? <a href="index.php?page=signup" class="hover-a">Become a Grower</a></h4>
                    </div>
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

<!-- JavaScript for Sliding Quotes with Smooth Transitions -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let quotes = document.querySelectorAll(".grower-appreciation .quote");
        let index = 0;

        function showNextQuote() {
            quotes.forEach((q, i) => {
                q.style.opacity = i === index ? "1" : "0";
            });
            index = (index + 1) % quotes.length;
        }

        setInterval(showNextQuote, 5000);
    });
</script>
