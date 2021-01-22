<?php
include 'functions.php';
login();

//google api login
require_once "googleConfig.php";
$loginURL = $googleClient->CreateAuthUrl();

//facebook api login
require_once "facebookConfig.php";
$permissions = array('email'); // Optional permissions
$loginUrlFacebook = $helper->getLoginUrl('https://aziflix.it/facebookCallBack.php', $permissions);



?>

<!doctype html>
<html lang="it">

<head>
    <?php include 'cssLinks.php'; ?>
    <style>
    .btn-google {
        color: #545454;
        background-color: #ffffff;
        box-shadow: 0 1px 2px 1px #ddd
    }

    .btn-facebook {
        color: #ffffff;
        background-color: #1877f2;
        box-shadow: 0 1px 2px 1px #1877f2
    }
    </style>
</head>

<body style="background-color: #000">
    <div class="zmovo-main dark-img">
        <!-- Preloader -->

        <!-- End Preloader -->
        <?php include 'headerNav.php' ?>

        <div class="zmovo-inner-page pt-50" style=" background-image: url('image/homeAziflix.jpg'); padding-top: 0px">
            <div class="zmovo-login-page">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-4 col-lg-4">
                            <div class="zmovo-page-login mt-50">
                                <form action="" method="POST">
                                    <div class="zmovo-login-input-top">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input class="form-control" required="" type="text" name="username"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input class="form-control" required="" type="password" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="zmovo-login-btns">
                                        <button type="submit" name="submit"
                                            class="btn btn-sm zmovo-login-btn">Accedi</button>
                                    </div>
                                    <button class="btn btn-lg btn-facebook btn-block btn-outline" type="button"
                                        onclick="window.location = '<?php echo $loginUrlFacebook; ?>' "><img
                                            src="./image/facebook-logo.png"> Accedi con
                                        Facebook</button>
                                    <button class="btn btn-lg btn-google btn-block btn-outline" type="button"
                                        onclick="window.location = '<?php echo $loginURL; ?>' "><img
                                            src="./image/google-logo.png"> Accedi con
                                        Google</button>
                                    <hr class="solid">
                                    <div class="zmovo-login-btns">
                                        <a href="registra.php" class="btn btn-sm btn-crea-account">Crea un
                                            nuovo account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- FOOTER -->
        <footer class="zmovo-footer-area footer">
            <div class="zmovo-footer-buttom">
                <div class="container">
                    <hr class="" style="border: 1px solid white;">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <div class="zmovo-ft-menu">
                                <a href="#"><img src="image/aziflix.png" alt="" height="50px"></a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="zmovo-ft-widget">
                                <div class="zmoto-ft-widget-contetn">
                                    <div class="zmovo-ft-social-widget">
                                        <ul>
                                            <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                                            <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
                                            <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                            <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END FOOTER -->
        <div class="to-top" id="back-top">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>
    <?php include 'jsLinks.php' ?>
</body>

</html>