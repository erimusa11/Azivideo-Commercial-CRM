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
    <title>Video detagli | Aziflix</title>
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
                                                                if (!isset($userId) || ($canSeeVideo == false)) { ?>
                                                            <div
                                                                class="zmovo-product-list-item zmovo-v-box-img gradient premium-div">
                                                                <img src="thumbnail_video/<?php echo $thumbnailVideo; ?>"
                                                                    alt="" style="height: 500px !important;">
                                                                <div class="ply-btns">
                                                                    <a href="#" data-video-url="" class="ply-btn"><img
                                                                            src="image/play.svg"" alt=""></a>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <?php } else { 
                                                                        
                                                                            if($rowVideo['url_youtube'] != NULL && $rowVideo['url_youtube'] !="" ){
                                                                                ?>
<iframe  class=" col-12" height="720" src="<?php echo $rowVideo['url_youtube'];?>" frameborder="0"
                                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                            allowfullscreen></iframe>

                                                                        <?php
                                                                            }else {
                                                                                ?>

                                                                        <video id="player" class="player" playsinline
                                                                            controls
                                                                            data-poster="thumbnail_video/<?php echo $thumbnailVideo; ?>"
                                                                            data-plyr-config='{ "title": "<?php echo $titleVideo; ?>" }'>
                                                                            <source
                                                                                src="upload_video/<?php echo $pathVideo; ?>"
                                                                                type="video/mp4" />
                                                                        </video>

                                                                        <?php  }  ?>

                                                                        <?php } ?>
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
                <?php include 'footer.php'; ?>

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