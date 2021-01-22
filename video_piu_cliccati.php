  <?php include 'session.php';

    global $connection;

    $queryMostViewedVideo = "SELECT video_views.id_video,COUNT(video_views.id_video) AS COUNT, videos.*, CONCAT(autore_video.nome_autore,' ',autore_video.cognome_autore) AS autore
                         FROM video_views
                         INNER JOIN videos
                         ON video_views.id_video = videos.id_video
                         INNER JOIN autore_video
                         ON videos.autore = autore_video.id_autore
                         GROUP BY video_views.id_video
                         ORDER BY COUNT DESC
                         LIMIT 100";
    $resultMostViewedVideo = mysqli_query($connection, $queryMostViewedVideo);
    $countMostViewedVideo = mysqli_num_rows($resultMostViewedVideo);
 
    ?>
  <!doctype html>
  <html lang="it">

  <head>
      <?php include 'cssLinks.php'; ?>
      <title>Video più cliccati | AZIFLIX</title>
  </head>

  <body style="background-color: #000">
      <div class="zmovo-main dark-img">
          <!-- Preloader -->

          <!-- End Preloader -->
          <?php include 'headerNav.php'; ?>


          <section class="jumbotron text-center bg-slide bg-piu-cliccati"  style="height:100px;">
              <div class="container ">
                  <h1 class=""><strong>Video piu cliccati</strong></h1>
              </div>
          </section>

          <!-- SLIDER SECTION -->

          <div class="zmoto-inner-page">
              <div class="zmovo-product-page pt-50">
                  <div class="container-fluid">
                      <?php if ($countMostViewedVideo == 0) {  

            include "universalfiles/alert.php";

                       } else { 
          include "universalfiles/bodyvideopost.php";
        } 
        
        ?>

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

            <script>
            $(document).ready(function() {
                total_rating();
                $(".changeselect").change(function() {
                        //get the element on change 
                    let changeselect = $(this, "option:selected").val();
                        //send the post to get the datas required 
                        showthevideos(changeselect,null,null,1);
              
                });
                showthevideos(null,null,null,1);
            });
            </script>

  </body>
  </html>