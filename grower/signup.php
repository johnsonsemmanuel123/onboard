<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="../assets/images/logo.jpg" alt="img">
                    </div>
                    <div class="login-userheading">
                        <h3>Grower Sign Up</h3>
                        <h4>Please sign up an account as a Grower</h4>
                        <p class="notice" style="font-style: italic; color: inherit; font-weight: bold; margin-top: 10px;">
                            *Note: This platform is for farmers who want to grow and sell their products in large volumes.*
                        </p>
                    </div>
                    
                    <form method="POST" action="../controller/signupController.php">
                        <input type="hidden" name="groupType" value="2">
                        
                        <!-- Farm Name -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-login">
                                    <label>Name of Farm <span style="color: red">*</span></label>
                                    <div class="form-addons">
                                        <input type="text" name="farm_name" placeholder="Enter Farm Name">
                                        <img src="../assets/img/icons/farm.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Full Name -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-login">
                                    <label>Name of Farmer (Full Name) <span style="color: red">*</span></label>
                                    <div class="form-addons">
                                        <input type="text" name="full_name" placeholder="Enter Full Name">
                                        <img src="../assets/img/icons/users1.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="row">
                            <div class="col-12">
                                <div class="form-login">
                                    <label>Email Address <span style="color: red">*</span></label>
                                    <div class="form-addons">
                                        <input type="email" name="email" placeholder="Enter Email Address">
                                        <img src="../assets/img/icons/email.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Fields -->
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

                        <!-- Submit Button -->
                        <div class="form-login">
                            <input class="btn btn-login" type="submit" name="GrowerSignUp" value="Sign Up" style="padding-bottom: 40px; background: #8ba068;">
                        </div>
                    </form>

                    <!-- Sign In Link -->
                    <div class="signinform text-center">
                        <h4>Have an account? <a href="index.php?page=login" class="hover-a">Sign In</a></h4>
                    </div>

                    <!-- Date Display -->
                    <div class="form-setlogin">
                        <h4><?php echo date('d-M-Y'); ?></h4>
                    </div>

                    <!-- Motivational Message -->
                    <div class="motivation-text" style="margin-top: 30px; text-align: center; font-weight: bold; font-size: 18px; color: inherit;">
                        🌱 *Farming is the foundation of life!*  
                        "Every seed you plant today is a harvest for tomorrow. Stay strong, stay dedicated, and watch your farm grow!" 🚜💚  
                    </div>
                </div>
            </div>

            <!-- Banner Image -->
            <div class="login-img">
                <img src="../assets/images/banner.jpg" alt="img">
            </div>
        </div>
    </div>
</div>