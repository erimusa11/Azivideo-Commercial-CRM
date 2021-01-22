<?php
global $connection;

$query_category = "SELECT * 
FROM video_category
ORDER BY category_video ASC";
$result_category = mysqli_query($connection, $query_category);
$categoriTemplate = '';
$videoTemplate = '';
$podcastTemplate = '';
while ($row_category = mysqli_fetch_array($result_category)) {
    $idCategory = $row_category['id_category'];
    $categoryName = $row_category['category_video'];

    $categoriTemplate .=  '<div class="col-sm-6 col-lg-3 border-right mb-4">
        <a class="dropdown-item text-truncate" href="video_categoria.php?categoria=' . $idCategory . '">' . $categoryName . '</a>
         </div>';

    $videoTemplate .= '<div class="col-sm-6 col-lg-3 border-right mb-4">
         <a class="dropdown-item text-truncate" href="video_categoria.php?categoria=' . $idCategory . '&sCategory=1">' . $categoryName . '</a>
          </div>';

    $podcastTemplate .= '<div class="col-sm-6 col-lg-3 border-right mb-4">
         <a class="dropdown-item text-truncate" href="video_categoria.php?categoria=' . $idCategory . '&sCategory=2">' . $categoryName . '</a>
          </div>';
}
?>

<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="  padding-bottom: 0px">
    <div class="container-fluid">
        <a href="index.php"><img src="image/aziflix.png" alt="" height="50px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile_nav"
            aria-controls="mobile_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mobile_nav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 float-md-right">
            </ul>
            <ul class="navbar-nav navbar-dark d-flex justify-content-center w-100">


                <li class="nav-item dropdown megamenu-li dmenu">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Categorie</a>
                    <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01">
                        <div class="row">
                            <?php
                            echo $categoriTemplate;
                            ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown megamenu-li dmenu">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown02" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Video</a>
                    <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown02">
                        <div class="row">
                            <?php
                            echo $videoTemplate;
                            ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown megamenu-li dmenu">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown03" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Podcast</a>
                    <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown03">
                        <div class="row">
                            <?php
                            echo $podcastTemplate;
                            ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="autori.php">Autori</a></li>
                <!--========-->

                <!-- <li class="nav-item"><a class="nav-link" href="#">Live</a></li> -->
                <li class="nav-item"><a class="nav-link" href="seriecategory.php">Series</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Web Tv</a></li>
                <li class="nav-item dropdown megamenu-li dmenu">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Altro</a>
                    <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3 border-right mb-4">
                                <a class="dropdown-item text-truncate" href="video_piu_cliccati.php"> I piu
                                    clicati</a>
                            </div>
                            <div class="col-sm-6 col-lg-3 border-right mb-4">
                                <a class="dropdown-item text-truncate" href="preferiti.php"> I preferiti</a>
                            </div>
                            <div class="col-sm-6 col-lg-3 border-right mb-4">
                                <a class="dropdown-item text-truncate" href="video_noncompletati.php"> I iniziati</a>
                            </div>
                            <div class="col-sm-6 col-lg-3 border-right mb-4">
                                <a class="dropdown-item text-truncate" href="#"> Radio</a>
                            </div>

                        </div>
                    </div>
                </li>

            </ul>
            <div class="col-md-3 mt-3 mr-auto">
                <div class="row">
                    <?php if (!isset($_SESSION['users_id'])) { ?>
                    <div class="col-md-5 col-sm-5 col-5 zmovo-login"> <a href="login.php"
                            class="btn login-btn btn-sm">Accedi<span class="fa fa-user ml-2"></span> </a></div>
                    <?php } else { ?>
                    <form action="index.php" method="POST">
                        <div class="col-12 btn-sm zmovo-login   mb-3"> <button type="submit" name="logout"
                                class="btn btn-md   btn-dark  ">Esci <span class="fa fa-sign-out-alt ml-2 "></span>
                            </button>
                        </div>
                    </form>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</nav>
