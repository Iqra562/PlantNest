<?php

include_once('components/header.php')

?>

<style>
    #mainSignup {
        margin-top: -2rem !important;
    }
</style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<main id="mainSignup">
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">
                    LogIn OR SignUp
                </h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Log In / Sign Up to Continue</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Log In & Register Start -->
    <div class="login-register-section section-padding-2">
        <div class="container custom-container">
            <div class="row mb-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- Log In & Register Box Start -->
                    <div class="login-register">
                        <h3 class="login-register__title">Sign Up</h3>

                        <form action="#" method='post'>
                            <div class="login-register__form">
                                <div class="single-form">
                                    <input class="single-form__input" id="username" name="username" type="text" placeholder="First name *" />
                                    <span id="errorFirstName"></span>
                                </div>
                                <div class="single-form">
                                    <input class="single-form__input" id="lastname" name="fullname" type="text" placeholder="Last name *" />
                                    <span id="errorLastName"></span>
                                </div>
                                <div class="single-form">
                                    <input class="single-form__input" id="email" name="email" type="email" placeholder="Email address *" />
                                    <span id="errorEmail"></span>
                                </div>

                                <div class="single-form">
                                    <input class="single-form__input" id="password" type="password" name="password" placeholder="Password *" />
                                    <span id="errorPassword"></span>
                                </div>
                                <div class="single-form">
                                    <input class="single-form__input" id="confirmpassword" type="password" name="confirmpassword" placeholder="Confirm Password *" />
                                    <span id="errorConfirmPassword"></span>
                                </div>
                                <p class="text-danger">
                                    <?= isset($_REQUEST['error']) ? $_REQUEST['error'] : "" ?>
                                </p>
                                <div class="single-form">
                                    <div class="single-form">
                                        <p class="lost-password">
                                            <span>already have an account?
                                                <a href="login.php" class='text-primary'>Log in</a>
                                            </span>
                                        </p>
                                    </div>

                                    <button type="submit" id="signup" name="signup" class="single-form__btn btn">
                                        Sign Up
                                    </button>

                                </div>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let error = false;
            let found = false;
            $('#confirmpassword').keyup(function() {
                let password = $('#password').val();
                let confirmPassword = $('#confirmpassword').val();
                if (password != confirmPassword) {
                    $(this).css({
                        'border': '1px solid red'
                    });
                    $(this).next().html('Password is not matched ').css({
                        'color': 'red'
                    });
                } else {
                    $(this).css({
                        'border': ' '
                    });
                    $("#errorConfirmPassword").hide();
                    $(this).css({
                        'border': '1px solid green',
                        'margin-bottom': '4%'
                    });

                }
            })
            // end matching passwords  

            $('#username').keyup(function() {
                let name = $('#username').val();
                if (name.length < 3) {
                    $(this).css({
                        'border': '1px solid red'
                    });
                    $(this).next().html('name should be greater than 2').css({
                        'color': 'red'
                    });
                    found = true;

                } else {
                    found = false;
                    $(this).css({
                        'border': ' '
                    });
                    $("#errorFirstName").hide();
                    $(this).css({
                        'border': '1px solid green',
                        'margin-bottom': '4%'
                    });
                }
            })

            // end length of
            $('#username').click(function() {
                let name = $('#username').val();
                if (name == "") {

                    $(this).next().html('please fill out this field').css({
                        'color': 'red'
                    });
                    $(this).css({
                        'border': '1px solid red'
                    });
                } else {
                    $(this).css({
                        'border': ' '
                    });
                    $("#errorFirstName").hide();
                    $(this).css({
                        'border': '1px solid green',
                        'margin-bottom': '4%'
                    });
                }
            })
            // end name

            // end lnmae
            $('#email').keyup(function() {
                let email = $('#email').val();
                let emailRegex = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;

                if (email == "") {
                    $(this).next().html('Please fill out this field').css({
                        'color': 'red'
                    });
                    $(this).css({
                        'border': '1px solid red'
                    });
                } else if (!email.match(emailRegex)) {
                    $(this).next().html('Please enter a valid email address').css({
                        'color': 'red'
                    });
                    $(this).css({
                        'border': '1px solid red'
                    });
                    error = true;
                } else {
                    $(this).next().html('');
                    $(this).css({
                        'border': '1px solid green',
                        'margin-bottom': '4%'
                    });
                    error = false
                }
            });

            // END EMAIL
            $('#password').keyup(function() {
                let password = $('#password').val();
                if (password == "") {

                    $(this).next().html('please fill out this field').css({
                        'color': 'red'
                    });
                    $(this).css({
                        'border': '1px solid red'
                    });


                } else {
                    $(this).css({
                        'border': ' '
                    });
                    $("#errorPassword").hide();
                    $(this).css({
                        'border': '1px solid green',
                        'margin-bottom': '4%'
                    });
                }
            })

            function emptyfield(id) {
                let value = $(id).val();
                if (value == '') {
                    error = true;
                    $(id).css({
                        'border': '1px solid red'
                    });
                    $(id).next().html('Please fill out this field!').css({
                        'color': 'red'
                    });

                } else {
                    error = false;

                }
            }
            $('#signup').click(function() {
                emptyfield('#username');
                emptyfield('#email');
                emptyfield('#password');
                emptyfield('#confirmpassword');
                if (error == true || found == true) {
                    return false;
                } else {
                    return true;
                }

            })
        })
    </script>
</main>

<?php
include_once('components/footer.php')
?>

<!-- Footer End -->

<!-- JS Vendor, Plugins & Activation Script Files -->


<!-- <script src="assets/js/app.js"></script> -->
</body>

</html>