<?php
include 'functions.php';
register();
?>

<!doctype html>
<html lang="it">

<head>
    <?php include 'cssLinks.php'; ?>
    <style>
    hr.solid {
        border-top: 2px solid #fff;
    }

    .btn-crea-account {
        direction: ltr;
        box-sizing: content-box;
        -webkit-font-smoothing: antialiased;
        font-weight: bold;
        justify-content: center;
        position: relative;
        text-align: center;
        text-shadow: none;
        vertical-align: middle;
        transition: 200ms cubic-bezier(.08, .52, .52, 1) background-color, 200ms cubic-bezier(.08, .52, .52, 1) box-shadow, 200ms cubic-bezier(.08, .52, .52, 1) transform;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        background-color: #42B72A;
        text-decoration: none;
        border: none;
        border-radius: 6px;
        font-size: 17px;
        line-height: 48px;
        padding: 0 16px;
        font-family: inherit;
    }

    .btn-crea-account:hover {
        color: #fff;
        background-color: #36a420
    }
    </style>
</head>

<body style="background-color: #000">
    <div class="zmovo-main dark-img">
        <!-- Preloader -->

        <!-- End Preloader -->
        <?php include 'headerNav.php' ?>

        <div class="zmovo-inner-page pt-50 " style=" background-image: url('image/homeAziflix.jpg'); padding-top: 0px">
            <div class="zmovo-login-page">
                <div class="container">
                    <div class="row">
                        <div class="offset-lg-4 col-lg-4">
                            <div class="zmovo-page-login mt-50" style="  padding-top: 00px; margin-top: 0px;">
                                <form action="registra.php" method="POST">
                                    <div class="zmovo-login-input-top">
                                        <div class="form-group">
                                            <label for=""> Nome:</label>
                                            <input class="form-control" required="" type="text" name="Nome"
                                                placeholder="Nome">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Cognome:</label>
                                            <input class="form-control" required="" type="text" name="Cognome"
                                                placeholder="Cognome">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Email:</label>
                                            <input class="form-control" required="" type="email" name="Email"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Telefono:</label>
                                            <input class="form-control" required="" type="text" name="Telefono"
                                                placeholder="Telefono">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Cita:</label>
                                            <input class="form-control" required="" type="text" name="Cita"
                                                placeholder="Cita">
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Password:</label>
                                            <input class="form-control" required="" minlength="8" type="password"
                                                name="Password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="zmovo-login-btns">

                                        <button type="submit" name="submitregister"
                                            class="btn btn-md zmovo-login-btn">Crea
                                            accaund</button>
                                    </div>
                                    <hr class="solid">
                                    <div class="zmovo-login-btns">
                                        <a href="login.php" class="btn btn-md btn-crea-account">Hai gia un accaunt?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- FOOTER
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
        </footer> -->
        <!-- END FOOTER -->
        <div class="to-top" id="back-top">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>
    <?php include 'jsLinks.php' ?>
</body>

</html>