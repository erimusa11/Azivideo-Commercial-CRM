  <?php include 'session.php';

    global $connection;

    $queryserial = "SELECT * FROM serial";
    $resultserial = mysqli_query($connection, $queryserial);
    $countserial = mysqli_num_rows($resultserial);
    $videotheme="";
    $videotheme2="";
    while($rowserial=mysqli_fetch_array($resultserial)){


        $videotheme= $videotheme. '<div class="col-lg-3 col-md-6">
        <div class="item">
            <div class="zmovo-video-item-box pb-30">
                <div class="zmovo-video-box-inner">
                    <div class="zmovo-v-box-img gradient">
                        <img src="thumbnail_serial/'.$rowserial['serial_thumbnail'].'" alt=""
                            class="thumbnail-video">
                        <div class="ply-btns">
                            <a href="serialvideo.php?categoria=' .$rowserial['id_serial'].'"
                                class="ply-btn"><img src="image/play.svg"
                                    alt=""></a>
                        </div>
                        <div class="zmovo-v-box-content">
                        <a  href="serialvideo.php?categoria=' .$rowserial['id_serial'].'" >' .$rowserial['serial_name']. '</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';

        $videotheme2=$videotheme2. '<div class="row pb-50">
        <div class="col-lg-4 col-md-5">
            <div class="zmovo-product-list-item zmovo-v-box-img gradient">
                <img src="thumbnail_serial/'.$rowserial['serial_thumbnail'].'" alt="" class="thumbnail-video">
                <div class="ply-btns">
                    <a href="serialvideo.php?categoria=' .$rowserial['id_serial'].'" class="ply-btn"><img src="image/play.svg" alt=""></a>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="zmovo-product-list-dec">
                <div class="zmovo-trailor-meta-info">
                    <div class="dec-review-dec">
                        <div class="details-title">
                        <a  href="serialvideo.php?categoria=' .$rowserial['id_serial'].'" >' .$rowserial['serial_name']. '</a>
                        </div>
                       
                        <div class="dec-review-meta">
                            <ul>
                                
                                <li><span>Descrizione <label>:</label></span><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quia id voluptas minima explicabo necessitatibus deserunt a repudiandae at nihil provident, est vero consequuntur vitae dolores, itaque dolore laboriosam eius.
                                Autem sunt corrupti nisi facilis ea, numquam, sapiente odit quod, tempora qui eos molestiae voluptatum explicabo consectetur. Dolor minus quia deserunt, illo sit excepturi aperiam unde expedita quos obcaecati ea.
                                Ut, doloremque quibusdam vero temporibus odio obcaecati id nisi dolor expedita minus impedit fuga veritatis, voluptatem vitae natus inventore doloribus modi rem blanditiis corrupti dolorum? Facilis pariatur alias tempora assumenda.</a></li>
                            </ul>
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
      <title>Categoria Series | AZIFLIX</title>
  </head>

  <body style="background-color: #000">
      <div class="zmovo-main dark-img">
          <!-- Preloader -->

          <!-- End Preloader -->
          <?php include 'headerNav.php'; ?>


          <section class="jumbotron text-center bg-slide bg-piu-cliccati" style="height:100px;">
              <div class="container ">
                  <h1 class=""><strong>Video piu cliccati</strong></h1>
              </div>
          </section>

          <!-- SLIDER SECTION -->

          <div class="zmoto-inner-page">
              <div class="zmovo-product-page pt-50">
                  <div class="container-fluid">
                      <?php if ($countserial == 0) {  

            include "universalfiles/alert.php";

                       } else { 
    ?>

                      <div class="product-filter mb-30  ">
                          <div class="product-filter-inner">
                              <div class="row">
                                  <!-- LIST VIEW OR GRID VIEW -->
                                  <div class="col-12 col-md-3 col-lg-4 sm-width">
                                      <div class="product-filter-list">
                                          <ul class="nav" role="tablist">
                                              <li class="active"> <a href="#grid" class="active show" role="tab"
                                                      data-toggle="tab"><i class="fa fa-th"></i></a></li>
                                              <li> <a href="#list" data-toggle="tab" role="tab"><i
                                                          class="fa fa-th-list"></i></a></li>
                                              <li class=" col-9 ">
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                                  <!-- END LIST VIEW OR GRID VIEW -->

                              </div>
                          </div>
                      </div>
                      <!-- end Product Filter -->
                      <div class="product-items">
                          <div class="product-items-inner">
                              <div class="zmovo-product-list ">

                                  <div class="tab-pane fade active in show" id="grid" role="tabpanel">
                                      <div class="row addVideos">
                                          <!-- this is the cart on column type  --->


                                          <?php echo  $videotheme;?>


                                      </div>
                                  </div>

                                  <div class="tab-pane fade active in" id="list" role="tabpanel">
                                      <div class="zmovo-product-list mb-30 addVideosfanel2">
                                          <?php echo   $videotheme2;?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>


                      <?php
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

  </body>

  </html>
