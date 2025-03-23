<div class="main-wrapper">
    <div class="account-content">
        <div class="login-wrapper">
            <div class="login-content">
                <div class="login-userset">
                    <div class="login-logo">
                        <img src="../assets/images/logo.jpg" alt="Aduanefie Logo">
                    </div>
                    <div class="login-userheading">
                        <h3>Buyer Sign Up</h3>
                        <h4>Please sign up as a <strong>corporate buyer</strong></h4>
                        <p class="motivation">Your purchases empower farmers and strengthen the agricultural supply chain!</p>
                    </div>

                    <form method="POST" action="../controller/signupController.php">
                        <input type="hidden" name="groupType" value="3">

                        <!-- PAGE 1: Company Details -->
                        <div id="page1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-login">
                                        <label>Company Name <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="text" name="company_name" placeholder="Enter Company Name" required>
                                            <img src="../assets/img/icons/building.svg" alt="Company Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-login">
                                        <label>Business Registration Number <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="text" name="registration_number" placeholder="Enter Registration Number" required>
                                            <img src="../assets/img/icons/id-card.svg" alt="Reg Number Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-login">
                                <button type="button" class="btn btn-next" onclick="nextPage()">Next</button>
                            </div>
                        </div>

                        <!-- PAGE 2: Contact Person Details & Password -->
                        <div id="page2" style="display: none;">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-login">
                                        <label>Full Name <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="text" name="fullname" placeholder="Enter Full Name" required>
                                            <img src="../assets/img/icons/users1.svg" alt="User Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-login">
                                        <label>Phone Number <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="text" name="phone" placeholder="024" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-login">
                                        <label>Email Address <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="email" name="email" placeholder="Enter Email Address" required>
                                            <img src="../assets/img/icons/mail.svg" alt="Email Icon">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-login">
                                        <label>Password <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="password" name="password" id="password" placeholder="Enter Password" required>
                                            <span class="fas toggle-password fa-eye-slash" onclick="togglePassword()"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-12">
                                    <div class="form-login">
                                        <label>Confirm Password <span style="color: red">*</span></label>
                                        <div class="form-addons">
                                            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required>
                                            <span class="fas toggle-password fa-eye-slash" onclick="togglePassword()"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-login">
                                <button type="button" class="btn btn-prev" onclick="prevPage()">Previous</button>
                                <input class="btn btn-login" type="submit" name="GrowerSignUp" value="Sign Up" style="background: #8ba068;">
                            </div>
                        </div>
                    </form>

                    <div class="signinform text-center">
                        <h4>Already have an account? <a href="index.php?page=login" class="hover-a">Login</a></h4>
                    </div>
                </div>
            </div>

            <div class="login-img">
                <img src="../assets/images/banner.jpg" alt="Aduanefie Banner">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Multi-Step Form -->
<script>
    function nextPage() {
        document.getElementById("page1").style.display = "none";
        document.getElementById("page2").style.display = "block";
    }

    function prevPage() {
        document.getElementById("page1").style.display = "block";
        document.getElementById("page2").style.display = "none";
    }

    function togglePassword() {
        var passwordField = document.getElementById("password");
        var confirmPasswordField = document.getElementById("confirmpassword");
        var toggleIcons = document.querySelectorAll(".toggle-password");

        toggleIcons.forEach(icon => {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                confirmPasswordField.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                confirmPasswordField.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        });
    }
</script>
