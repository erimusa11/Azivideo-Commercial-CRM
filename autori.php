  <?php include 'session.php';

    // this finds all the datas required to print into the carts
    global $connection;
    $query_diplay_cat = 'SELECT * FROM autore_video';
    $result_cat = mysqli_query($connection, $query_diplay_cat);
    $countAutore = mysqli_num_rows($result_cat);
    ?>
  <!doctype html>
  <html lang="it">

  <head>
      <?php include 'cssLinks.php'; ?>
      <title>Autori | AZIFLIX</title>
  </head>
  <style>
    .addReadMore.showlesscontent .SecSec,
    .addReadMore.showlesscontent .readLess {
        display: none;
    }

    .addReadMore.showmorecontent .readMore {
        display: none;
    }

    .addReadMore .readMore,
    .addReadMore .readLess {
        font-weight: bold;
        margin-left: 2px;
        color: blue;
        cursor: pointer;
    }

    .addReadMoreWrapTxt.showmorecontent .SecSec,
    .addReadMoreWrapTxt.showmorecontent .readLess {
        display: block;
    }
    </style>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
  <body style="background-color: #000">
      <div class="zmovo-main dark-img">
          <!-- Preloader -->

          <!-- End Preloader -->
          <?php include 'headerNav.php'; ?>


          <section class="jumbotron text-center bg-slide bg-autori" style="height:100px;">
              <div class="container ">
                  <h1 class=""><strong>Autori</strong></h1>
              </div>
          </section>

          <!-- SLIDER SECTION -->

          <div class="zmoto-inner-page">
              <div class="zmovo-product-page pt-50">
                  <div class="container-fluid">
                      <?php if ($countAutore == 0) {  

                            include "universalfiles/alert.php";

                       } else { ?>

                          <!-- end Product Filter -->
                          <div class="product-items">
                              <div class="product-items-inner">
                                  <div class="zmovo-product-list">
                                      <?php
                                        while ($row_cat = mysqli_fetch_array($result_cat)) {
                                            $fb_autore = $row_cat['fb_autore'];
                                            $linkedin_autore = $row_cat['linkedin_autore'];
                                            $twiter_autore = $row_cat['twiter_autore'];
                                            $insta_autore = $row_cat['insta_autore'];

                                            $autore = $row_cat['nome_autore'].' '.$row_cat['cognome_autore'];
                                            $cita_autore = $row_cat['citta_autore'];
                                            $img_autore = $row_cat['img_autore'];
                                            $desc_autore = $row_cat['desc_autore'];
                                            $id_autore = $row_cat['id_autore'];
                                            $videoLink = 'autore_categoria.php?autore='.$id_autore; ?>


                                          <div class="tab-pane fade active in show pb-30" id="list" role="tabpanel">
                                              <div class="zmovo-product-list">
                                                  <div class="row">
                                                      <div class="col-lg-4 col-md-5 mt-4">
                                                          <div class="zmovo-trailor-img-slide">
                                                              <span>Autore</span>
                                                          </div>
                                                          <div class="zmovo-product-list-item zmovo-v-box-img gradient" onclick="window.location='<?php echo $videoLink; ?>'">
                                                              <img src="/image/autoreImg/<?php echo  $img_autore; ?>" alt="" class="thumbnail-video">
                                                          </div>
                                                      </div>
                                                      <div class="col-lg-8 col-md-7">
                                                          <div class="zmovo-product-list-dec">
                                                              <div class="zmovo-trailor-meta-info">
                                                                  <div class="dec-review-dec">
                                                                      <div class="details-title">
                                                                          <a href="<?php echo $videoLink; ?>"><?php echo $autore; ?></a>
                                                                      </div>
                                                                      <div class="dec-review-meta">
                                                                          <ul>
                                                                              <li><span>Città <label>:</label></span><a href=" <?php echo $videoLink; ?>"><?php echo $cita_autore; ?></a></li>
                                                                      <li>
                                                                          <div class=" social-links">
                                                                                      <strong>Social :</strong>
                                                                                      <a href="<?php echo $fb_autore; ?>" class="socila-fb"><span class="fab fa-facebook"></span></a>
                                                                                      <a href="<?php echo $twiter_autore; ?>" class="socila-tw"><span class="fab fa-twitter"></span></a>

                                                                                      <a href="<?php echo $linkedin_autore; ?>" class="socila-pin"><span class="fab fa-linkedin"></span></a>
                                                                                      <a href="<?php echo $insta_autore; ?>" class="socila-ins"><span class="fab fa-instagram"></span></a>
                                                                      </div>
                                                                      </li>
                                                                      <li><span>Descrizione:</span><a  class="addReadMore   showlesscontent" ><?php echo $desc_autore; ?></a></li>
                                                                      <li><a href="<?php echo $videoLink; ?>" class="btn btn-lg btn-info mt-4">Vai ai contenuti di questo autore</a> </li>
                                                                      </ul>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                              <?php
                                        }

                                ?>
                              </div>
                          </div>
                  </div>
              <?php } ?>
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
      <script>

function AddReadMore() {
    //This limit you can set after how much characters you want to show Read More.
    var carLmt = 800;
    // Text to show when text is collapsed
    var readMoreTxt = " ...Mostra di piu";
    // Text to show when text is expanded
    var readLessTxt = " Mostra meno...";


    //Traverse all selectors with this class and manupulate HTML part to show Read More
    $(".addReadMore").each(function() {
        if ($(this).find(".firstSec").length)
            return;

        var allstr = $(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<a class='SecSec'>" + secdHalf + "</a><a class='readMore text-danger'  title='Click to Show More'>" + readMoreTxt + "</a><a class='readLess  text-danger' title='Click to Show Less'>" + readLessTxt + "</a>";
            $(this).html(strtoadd);
        }

    });
    //Read More and Read Less Click Event binding
    $(document).on("click", ".readMore,.readLess", function() {
        $(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
$(function() {
    //Calling function after Page Load
    AddReadMore();
});

</script>

  </body>

  </html>