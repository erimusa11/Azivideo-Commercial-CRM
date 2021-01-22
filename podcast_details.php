<?php
include 'session.php';
login();
video_preferito();
video_unpreferito();
$videoId = $_GET['id'];
$userId = $_SESSION['users_id'];

include 'video_detailsCode.php';
?>
<!doctype html>
<html lang="it">

<head>
    <?php include 'cssLinks.php'; ?>
    <title>Podcast | AZIFLIX</title>
</head>
<?php 
             include "universalfiles/details/uppertags.php";
    ?>
<?php if (empty($videoId)) {       
                                                include "universalfiles/alert.php";
                                                 } else { ?>
<!-- Right -->
<div class="col-lg-12">
    <div class="zmovo-blog-dec-contents">
        <div class="zmovo-slider-area">
            <div class="items" id="">

                <div class="item">
                    <?php if ($tipologiaVideo == 1) { ?>
                    <div class="zmovo-trailor-img-slide-free ml-2">
                        <span>free</span>
                    </div>
                    <?php } else { ?>
                    <div class="zmovo-trailor-img-slide">
                        <span>premium</span>
                    </div>
                    <?php }
                                                                if (!isset($userId) || ($canSeeVideo == FALSE)) {
                           
                                                                    ?>
                    <div class="zmovo-video-list-ply hover12 ">
                        <div class="hover-box premium-div">
                            <img class="show-video" src="image/podcastCoverArt.jpg" alt=""
                                style="height: 500px !important; width: auto !important">
                            <div class="zmovo-h-btn">
                                <a class="video-play-button show-video" href="#" data-video-url="">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } else { 
                                                                             
                                                                             if($rowVideo['url_youtube'] != NULL && $rowVideo['url_youtube'] !="" ){ 
                                                                                ?>

                    <iframe class=" col-12" height="720" src="<?php echo $rowVideo['url_youtube'];?>" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                    <?php 
                                                                            } else{ 
                                                                    ?>
                    <center>
                        <div class="col-md-7">
                            <div class="zmovo-video-list-ply hover12 play-div">
                                <div class="hover-box">
                                    <img class="show-video col-lg-12" src="image/podcastCoverArt.jpg" alt=""
                                        width="100%">
                                    <div class="zmovo-h-btn">
                                        <a class="video-play-button show-video" href="#" data-video-url="">
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <audio id="player" class="player" controls>
                                <source src="upload_podcast/<?php echo $pathVideo ?>" type="audio/mp3" />
                            </audio>
                        </div>
                    </center>
                    <?php    }} ?>
                </div>
            </div>
        </div>
        <?php
                                            include 'universalfiles/details/starinfo.php';
                                            include 'universalfiles/comentarea.php';
                                         ?>
    </div>
</div>
<?php } ?>
<!-- End Right -->
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<!-- FOOTER -->
<?php include 'footer.php' ?>
<!-- END FOOTER -->
<div class="to-top" id="back-top">
    <i class="fa fa-angle-up"></i>
</div>
</div>
<?php include 'jsLinks.php';
     include 'universalfiles/premiumalert.php';
      ?>
</body>

</html>