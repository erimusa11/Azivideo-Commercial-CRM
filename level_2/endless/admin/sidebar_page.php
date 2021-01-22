<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper"><a href="upload_video.php"><img src="../assets/images/aziflix.png" width="80%"
                    alt=""></a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <h6 class="mt-3 f-14"><?php echo  $_SESSION['users_name'].' '. $_SESSION['users_surname'] ?></h6>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="#"><i data-feather="video"></i><span>Video</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="upload_video.php"><i class="fa fa-circle"></i><span>Carica</span></a></li>
                    <li><a href="modify_video.php"><i class="fa fa-circle"></i><span>Modifica</span></a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="seriale.php"><i data-feather="film"></i><span>Seriale</span></a>
            </li>
            <li><a class="sidebar-header" href="video_categorie.php"><i data-feather="edit-2"></i><span>Crea
                        Categorie</span></a></li>
            <li><a class="sidebar-header" href="video_vendita.php"><i data-feather="dollar-sign"></i><span>Video
                        Vendita</span></a></li>
            <li><a class="sidebar-header" href="autore.php"><i data-feather="user-plus"></i><span>Crea
                        Autore</span></a></li>
            <li><a class="sidebar-header" href="video_slide.php"><i data-feather="sliders"></i><span>Video
                        slide</span></a></li>

        </ul>
    </div>
</div>