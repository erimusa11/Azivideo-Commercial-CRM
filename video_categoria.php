  <?php include 'session.php';
    //find the  text of the category on the top of the page
    global $connection;
    $category_id = $_GET['categoria'];
    $videoSCategory = $_GET['sCategory'];
   
    $controll = $_GET['controll'];

    $query_find_category = "SELECT category_video FROM video_category WHERE id_category='$category_id'";
    $result_find_category = mysqli_query($connection, $query_find_category);
    $row_find_category = mysqli_fetch_assoc($result_find_category);

    $videoCategory = $row_find_category['category_video'];

    if ($controll != 0) {
        $extraControll = "AND  videos.autore='$controll'";
    } else {
        $extraControll = '';
    }

    if ($videoSCategory != 0) {
        $superCategoriAppend = "AND videos.super_categorie = '$videoSCategory'";
    } else {
        $superCategoriAppend = '';
    }


    // this finds all the datas required to print into the carts
    $query_diplay_cat = "SELECT * 
                                            FROM video_con_category 
                                            JOIN videos 
                                            ON video_con_category.id_video=videos.id_video $superCategoriAppend
                                            JOIN  video_category ON video_con_category.id_category=video_category.id_category 
                                            AND video_con_category.id_category='$category_id' 
                                            JOIN autore_video ON videos.autore=autore_video.id_autore ".$extraControll;

    $result_cat = mysqli_query($connection, $query_diplay_cat);
    $countCategoryVideo = mysqli_num_rows($result_cat); 
 
    ?>
  <!doctype html>
  <html lang="it">

  <head>
      <?php include 'cssLinks.php'; ?>
      <title>Categoria | AZIFLIX</title>
  </head>

  <body style="background-color: #000">
      <div class="zmovo-main dark-img">
          <!-- Preloader -->

          <!-- End Preloader -->
          <?php include 'headerNav.php'; ?>


          <section class="jumbotron text-center bg-slide bg-categorie" style="height:100px;">
              <div class="container ">
                  <h1 class=" "><strong>
                          <?php
                            //print the category on the top of the cart before the video list
                            echo $videoCategory;
                            ?>
                      </strong></h1>
              </div>
          </section>

          <!-- SLIDER SECTION -->

          <div class="zmoto-inner-page">
              <div class="zmovo-product-page pt-50">
                  <div class="container-fluid">
                      <?php if ($countCategoryVideo == 0) {  
 
             include "universalfiles/alert.php";

                       } else { 
                                    include "universalfiles/bodyvideopost.php";
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
              <!-- Rating JS -->
              <?php
                if($videoSCategory=="" || $videoSCategory == NULL){

                    $videoSCategory= 'null';
                }
            
            ?>
              <script>
              $(document).ready(function() {
                  total_rating();


                  $(".changeselect").change(function() {
                      //get the element on change 
                      var changeselect = $(this, "option:selected").val();
                      //send the post to get the datas required 
                      showthevideos(changeselect, null, <?php echo $videoSCategory; ?>, null);

                  });
                  showthevideos(<?php echo $category_id;?>, null, <?php echo $videoSCategory;?>, null);
              });
              </script>
  </body>

  </html>
