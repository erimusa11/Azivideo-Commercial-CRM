<?php
include 'session.php';
logout();


$template = '';
global $connection;
$querySlide = 'SELECT videos.*
FROM videos
INNER JOIN video_slide
ON video_slide.id_video = videos.id_video 
ORDER BY video_slide.slide_position ASC';
$resultSlide = mysqli_query($connection, $querySlide);
while ($rowSlide = mysqli_fetch_array($resultSlide)) {
    $idVideo = $rowSlide['id_video'];
    $titleVideo = $rowSlide['title_video'];
    $description = $rowSlide['description_video'];
    $pathVideo = $rowSlide['path_video'];
    $pathTrailer = $rowSlide['path_trail_video'];
    $thumbnail = $rowSlide['photo_from_video'];
    $autoreId = $rowSlide['autore'];
    $autore = autoreVIdeo($autoreId);
    $dataCreation = date('d-m-Y', strtotime($rowSlide['data_creation']));
    $tipologia = $rowSlide['tipologia_video'];
    $superCategoria = $rowSlide['super_categorie'];

    $categoryVideo = videoCategory($connection, $idVideo);

    if ($tipologia == 1) {
        $badge = '<div class="zmovo-trailor-img-slide-free ml-2">
                    <span>free</span>
                   </div>';
    } else {
        $badge =
            '<div class="zmovo-trailor-img-slide">
                <span>premium</span>
            </div>';
    }

    if ($superCategoria == 1 || $superCategoria == 3) {
        $thumbnailLink = 'thumbnail_video/'.$thumbnail;
        $videoLink = 'video_details.php?id='.$idVideo;
        $trailerLink = 'thumbnail_video/'.$pathTrailer;
    } else {
        $thumbnailLink = 'image/podcast.jpg';
        $videoLink = 'podcast_details.php?id='.$idVideo;
    }

    $template .= '
                    <div class="item">
                    <input value="'.$idVideo.'" id="videoId" readonly hidden />
                    <div class="zmovo-slider-contents">
                    '.$badge.'
                        <img src="'.$thumbnailLink.'" alt="" class="backgroundSlider">
                        <div class="zmovo-slide-content">
                            <div class="container">
                                <div class="zmovo-slider-contetn">
                                    <a href="'.$videoLink.'" class="slide-title">'.$titleVideo.'</a>
                                    <div class="zmovo-slide-cat">
                                        <ul>
                                            <li><span><i class="far fa-calendar"></i>
                                                </span>'.$dataCreation.'</li>
                                            <li class="d-none d-md-block" style="max-width: 400px; min-height: 30px">
                                                <p style="word-break: break-all;">
                                                    '.$description.'
                                            </li>
                                            <li class="">   
                                                                        <select id="total-rating" class="total-rating" name="rating" autocomplete="off">
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                        <a id="nrTotalRating"></a>
                                                                    
                                            <li class="">
                                                <div class="row col-md-6">
                                                    <span class="a"><i class="fas fa-user-alt"></i></span>
                                                    <span class="a">
                                                        Autore:
                                                    </span>
                                                    <span class="a" style="color: #FF0000">
                                                        '.$autore.'</span>
                                                </div>
                                            </li>
                                            <li class="">
                                                <div class="row col-md-6">
                                                    <span class="a"><i class="fas fa-th-list"></i></span>
                                                    <span class="a">
                                                        Categorie:
                                                    </span>
                                                    <span class="a" style="color: #FF0000">
                                                    '.$categoryVideo.'</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="zmovo-slide-ply-btn">
                                        <a  href="'.$videoLink.'"  class="btn  btn-free"><i class="fas fa-play ml-2"></i> Play</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
}

?>

<!doctype html>
<html lang="it">

<head>
    <?php include 'cssLinks.php'; ?>
    <title>Aziflix | LA PRIMA ED UNICA PIATTAFORMA CLOUD PER LA FORMAZIONE AZIENDALE ONDEMAND</title>
</head>


<body style="background-color: #000">
    <div class="zmovo-main dark-img">
        <!-- Preloader -->

        <!-- End Preloader -->
        <?php include 'headerNav.php'; ?>

        <div class="zmovo-slider-area">
            <div class="items" id="slider">
                <?php echo $template; ?>
            </div>
        </div>

        <!-- SLIDER SECTION -->

        <!-- END SLIDER SECTION -->

        <!--Cruscotto di Controllo slide-->
        <?php include 'slideCruscttoControllo.php'; ?>
        <!-- END Cruscotto di Controllo slide -->

        <!--Crisi e risanamento slide-->
        <?php include 'slideCrisi.php'; ?>
        <!-- END Crisi e risanamento slide -->

        <!--Finanza slide-->
        <?php include 'slideFinanza.php'; ?>
        <!-- END Finanza slide -->

        <!--Organizzazione studi professionali slide-->
        <?php include 'slideOrganizzazioneStudiProf.php'; ?>
        <!-- END Organizzazione studi professionali slide -->

        <!--Web marketing slide-->
        <?php include 'slideWebMarketing.php'; ?>
        <!-- END Web marketing slide -->


        <!-- FOOTER -->
        <?php include 'footer.php'; ?>
        <!-- END FOOTER -->
        <div class="to-top" id="back-top">
            <i class="fa fa-angle-up"></i>
        </div>
    </div>
    <?php include 'jsLinks.php'; ?>

</body>
<script>
$(document).ready(function() {
    $('.total-rating').barrating({
        theme: 'fontawesome-stars',
        readonly: 'true',
        initialRating: true,
        emptyValue: ''
    });
    let videoId = $('#videoId').val();
    totalRating(videoId);

    function totalRating(videoId) {
        $.ajax({
            type: "POST",
            url: "totalRatingAjax.php",
            data: {
                "id_video": videoId,
            },
            success: function(data) {
                const dataParse = JSON.parse(data);;
                $('#total-rating').barrating('set', dataParse[0].avgRating);
            },
            error: function(data) {
                alert('error');
            }
        })
    }
});
</script>

</html>