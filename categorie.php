<?php
include 'session.php';
?>

<!doctype html>
<html lang="it">

<head>

    <?php include 'cssLinks.php'; ?>
    <title>Tutte le categorie| AZIFLIX</title>
    <style>
        a {
            color: #fff
        }

        a:hover {
            color: #0fb5de;

        }
    </style>
</head>

<body style="background-color: #000;">
    <div class="zmovo-main dark-img">
        <!-- Preloader -->

        <!-- End Preloader -->
        <?php include 'headerNav.php'; ?>

        <section class="jumbotron text-center bg-slide bg-categorie">
            <div class="container ">
                <h1 class="jumbotron-heading display-1"><strong>Categorie</strong></h1>
            </div>
        </section>

        <?php
        global $connection;
        $query_category = 'SELECT *
FROM video_category
WHERE video_category.id_category IN (
SELECT id_category
FROM 
video_con_category 
WHERE id_category = video_category.id_category)';
        $result_category = mysqli_query($connection, $query_category);

        while ($row_category = mysqli_fetch_array($result_category)) {
            $id_category = $row_category['id_category'];
            $name_category = $row_category['category_video'];

            $query_video = "SELECT videos.*, autore_video.nome_autore, autore_video.cognome_autore 
            FROM videos, autore_video
            WHERE id_video = (
            SELECT id_video
            FROM video_con_category
            WHERE id_video = videos.id_video
            AND id_category = '$id_category'
            AND videos.autore = autore_video.id_autore)";
            $result_videos = mysqli_query($connection, $query_video); ?>
            <div class="zmovo-new-arrivals arow-icon">
                <div class="container-fluid">
                    <div class="zmovo-arrivals-items">
                        <div class="zmovo-hadidng pt-50 pb-30">

                            <h2><span class="text-uppercase"> <a href='video_categoria.php?id=<?php echo $id_category; ?>'><?php echo $name_category; ?>
                                    </a></span></h2>

                        </div>
                        <!-- items -->
                        <div class="items owl-carousel" id="">
                            <!-- ITEM -->
                            <?php while ($row_videos = mysqli_fetch_array($result_videos)) {
                $id_video = $row_videos['id_video'];
                $title_video = $row_videos['title_video'];
                $thumbnail = $row_videos['photo_from_video'];
                $autore = $row_videos['nome_autore'].' '.$row_videos['cognome_autore'];
                $tipologia_video = $row_videos['tipologia_video'];
                $data_creation = date('d-m-Y', strtotime($row_videos['data_creation']));
                $superCategorie = $row_videos['super_categorie'];

                if ($superCategorie == 1 || $superCategorie == 3) {
                    $thumbnailLink = 'thumbnail_video/'.$thumbnail;
                    $videoLink = 'video_details.php?id='.$id_video;
                } else {
                    $thumbnailLink = 'image/podcast.jpg/'.$thumbnail;
                    $videoLink = 'podcast_details.php?id='.$id_video;
                } ?>
                                <div class="item">
                                    <?php if ($tipologia_video == 1) { ?>
                                        <div class="zmovo-trailor-img-slide-free">
                                            <span>free</span>
                                        </div>
                                    <?php } else { ?>
                                        <div class="zmovo-trailor-img-slide">
                                            <span>premium</span>
                                        </div>
                                    <?php } ?>
                                    <div class="zmovo-video-item-box">
                                        <div class="zmovo-video-box-inner">
                                            <div class="zmovo-v-box-img gradient">
                                                <img src="<?php echo $thumbnailLink; ?>" alt="" style="max-height: 300px; max-width: auto !important">
                                                <div class="ply-btns">
                                                    <a href="<?php echo $videoLink; ?>" class="ply-btn"><img src="image/play.svg" alt=""></a>
                                                </div>
                                                <div class="zmovo-v-box-content">
                                                    <a href="<?php echo $videoLink; ?>"><?php echo $title_video; ?></a>
                                                    <div class="zmovo-v-tag c2">
                                                        <span>Autore : <?php echo $autore; ?></span>
                                                    </div>
                                                    <div class="movie-time"><span>Pubblicato:
                                                            <?php echo $data_creation; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
            } ?>
                            <!-- END ITEM -->
                        </div>
                        <!-- end items -->
                    </div>
                </div>
            </div>
        <?php
        } ?>

    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <!-- END FOOTER -->
    <div class="to-top" id="back-top">
        <i class="fa fa-angle-up"></i>
    </div>
    </div>
    <?php include 'jsLinks.php'; ?>
</body>

</html>