  <?php include 'session.php';

    global $connection;
   $userid=$_SESSION['users_id'];
    $queryMIniziati= "SELECT COUNT(iniziati_id) FROM video_iniziati WHERE  iniziati_id=' $userid'";
    $resultIniziati = mysqli_query($connection, $queryMIniziati);
    $countMIniziati= mysqli_num_rows($resultIniziati);
 
    ?>
  <!doctype html>
  <html lang="it">

  <head>
      <?php include 'cssLinks.php'; ?>
      <title>I video iniziati | AZIFLIX</title>
  </head>

  <body style="background-color: #000">
      <div class="zmovo-main dark-img">
          <!-- Preloader -->

          <!-- End Preloader -->
          <?php include 'headerNav.php'; ?>


          <section class="jumbotron text-center bg-slide bg-piu-cliccati" style="height:100px;">
              <div class="container ">
                  <h1 class=""><strong>I video iniziati</strong></h1>
              </div>
          </section>

          <!-- SLIDER SECTION -->

          <div class="zmoto-inner-page">
              <div class="zmovo-product-page pt-50">
                  <div class="container-fluid">
                      <?php if ($countMIniziati == 0) {  

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
                      showthevideos(changeselect, null, null, 3);

                  });
                  showthevideos(null, null, null, 3);
              });
              </script>

  </body>

  </html>