<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/images/love.png">
    <link rel="icon" type="image/png" href="../assets/images/love.png">

    <title>Relation.com</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">


    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Alertify JS - https://alertifyjs.com/guide.html -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <style>
        .content {
            padding: 10rem 0;
            background: wheat;
            height: 100vh;
        }

        .form-block {
            background: #fff;
            padding: 60px;
            -webkit-box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 991.98px) {
            .form-block {
                padding: 30px;
            }
        }

        @media (max-width: 991.98px) {
            .content .bg {
                height: 500px;
            }
        }

        .content .contents,
        .content .bg {
            width: 50%;
        }

        @media (max-width: 1199.98px) {

            .content .contents,
            .content .bg {
                width: 100%;
            }
        }

        .content .contents .form-group input,
        .content .bg .form-group input {
            background: transparent;
            border-bottom: 1px solid #ccc;
        }

        .content .contents .form-group.first,
        .content .bg .form-group.first {
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
        }

        .content .contents .form-group.last,
        .content .bg .form-group.last {
            border-bottom-left-radius: 7px;
            border-bottom-right-radius: 7px;
        }

        .content .contents .form-group label,
        .content .bg .form-group label {
            font-size: 12px;
            display: block;
            margin-bottom: 0;
            color: #b3b3b3;
        }

        .content .contents .form-control,
        .content .bg .form-control {
            border: none;
            padding: 0;
            font-size: 20px;
            border-radius: 0;
        }

        .content .contents .form-control:active,
        .content .contents .form-control:focus,
        .content .bg .form-control:active,
        .content .bg .form-control:focus {
            outline: none;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .content .btn {
            height: 54px;
            padding-left: 30px;
            padding-right: 30px;
        }

        .content .btn-pill {
            border-radius: 30px;
        }

        .password_show {
            position: relative;
        }

        .password_show .show_eye {
            position: absolute;
            margin-top: -30px;
            right: 0;
        }

        option {
            border: none;
            outline: none;
        }

        select {
            border: none;
            outline: none;
            background: brown;
        }

        /**Profile Image */
        .profile_circle {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile_circle .profile-pic {
            width: 200px;
            max-height: 200px;
            display: inline-block;
        }

        .profile_circle .file-upload {
            display: none;
        }

        .profile_circle .circle {
            border-radius: 100% !important;
            overflow: hidden;
            width: 128px;
            height: 128px;
            border: 2px solid rgba(255, 255, 255, 0.2);

        }

        .profile_circle img {
            max-width: 100%;
            height: auto;
        }

        .profile_rel {
            position: relative;
        }

        .profile_circle .p-image {
            position: absolute;
            top: 115px;
            right: 40px;
            color: #666666;
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }

        .profile_circle .p-image:hover {
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        }

        .profile_circle .upload-button {
            font-size: 1.2em;
        }

        .profile_circle .upload-button:hover {
            transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
            color: #999;
        }
    </style>

</head>

<body>


    <div class="content">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="form-block">
                                <div class="mb-4">
                                    <h3>Sign Up to <strong><img height="30" src="../assets/images/love.png" alt=""> Relation.Com</strong></h3>
                                    <p class="mb-4">Let's get you signed up and straight to the relation.</p>
                                </div>
                                <form action="../controller/AuthController.php" method="POST" enctype="multipart/form-data">

                                    <div class="profile_circle">
                                        <div class="row">
                                            <div class="small-12 medium-2 large-2 columns profile_rel">
                                                <div class="circle">
                                                    <img class="profile-pic" src="../assets/images/img_avatar.png">
                                                </div>
                                                <div class="p-image">
                                                    <i class="fa fa-camera upload-button"></i>
                                                    <input class="file-upload" name="profile_image" type="file" accept="image/*" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group first">
                                        <label>Username</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>

                                    <div class="form-group first mt-4">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="form-group last mb-4 mt-4 password_show">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="id_password" required>
                                        <div class="show_eye">
                                            <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                        </div>
                                    </div>

                                    <div class="form-group last mb-4 mt-4 password_show">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="id_password2" required>
                                        <div class="show_eye">
                                            <i class="far fa-eye" id="togglePassword2" style="cursor: pointer;"></i>
                                        </div>
                                    </div>

                                    <input type="submit" name="register_btn" value="Sign Up" class="btn btn-pill text-white btn-block" style="background: brown;">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Alertify JS - https://alertifyjs.com/guide.html -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        alertify.set('notifier', 'position', 'top-right');

        <?php if (isset($_SESSION['message'])) { ?>
            alertify.success('<?= $_SESSION['message']; ?>');
        <?php unset($_SESSION['message']);
        } ?>
    </script>

    <script src="../assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".file-upload").on('change', function() {
                readURL(this);
            });
            $(".upload-button").on('click', function() {
                $(".file-upload").click();
            });
        });
    </script>


    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

    <script>
        const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#id_password2');

        togglePassword2.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>