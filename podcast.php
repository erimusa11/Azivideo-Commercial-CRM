<?php
include 'session.php';
?>

<!doctype html>
<html lang="it">

<head>

    <?php include 'cssLinks.php'; ?>
    <title>Podcast| AZIFLIX</title>
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

        <section class="jumbotron text-center bg-slide bg-podcast">
            <div class="container ">
                <h1 class="jumbotron-heading display-1"><strong>Podcast</strong></h1>
            </div>
        </section>

        <?php
        global $connection;
        $query_videos = 'SELECT v.*, a.nome_autore, a.cognome_autore
FROM videos v, autore_video a
WHERE v.autore = a.id_autore
AND super_categorie = 2';
        $result_videos = mysqli_query($connection, $query_videos);
        ?>
        <div class="zmovo-new-arrivals arow-icon">
            <div class="container-fluid">
                <div class="zmovo-arrivals-items">
                    <!-- items -->
                    <div class="items" id="new-arrivle">
                        <!-- ITEM -->
                        <?php while ($row_videos = mysqli_fetch_array($result_videos)) {
            $id_video = $row_videos['id_video'];
            $title_video = $row_videos['title_video'];
            $thumbnail = $row_videos['photo_from_video'];
            $autore = $row_videos['nome_autore'].' '.$row_videos['cognome_autore'];
            $tipologia_video = $row_videos['tipologia_video'];
            $data_creation = date('d-m-Y', strtotime($row_videos['data_creation'])); ?>
                            <div class="item" style="max-height: 300px !important; max-width: 500px !important;">
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
                                            <img src="image/podcast.jpg" alt="" style="width: 500px; height: 300px">
                                            <div class="ply-btns">
                                                <a href="podcast_details.php?id=<?php echo $id_video; ?>" class="ply-btn"><img src="image/play.svg" alt=""></a>
                                            </div>
                                            <div class="zmovo-v-box-content">
                                                <a href="podcast_details.php?id=<?php echo $id_video; ?>"><?php echo $title_video; ?></a>
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
    </div>


    <!-- FOOTER -->
    <?php include 'footer.php'; ?>

    <!-- END FOOTER -->
    <div class="to-top" id="back-top">
        <i class="fa fa-angle-up"></i>
    </div>
    </div>
    <?php include 'jsLinks.php'; ?>
    <!-- Rating JS -->



</body>

</html>