  <?php include 'session.php';

    global $connection;
    $category= $_GET['categoria'];
 
    $queryserial = "SELECT * FROM videos WHERE id_serial='$category' AND super_categorie='3'";
    $resultserial = mysqli_query($connection, $queryserial);
    $countserial = mysqli_num_rows($resultserial);
 
 
    ?>
  <!doctype html>
  <html lang="it">

  <head>
      <?php include 'cssLinks.php'; ?>
      <title>Video Series| AZIFLIX</title>
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
                      showthevideos(changeselect, <?php echo $category; ?>, 3, 4);

                  });
                  showthevideos(null, <?php echo $category; ?>, 3, 4);
              });
              </script>

  </body>

  </html>
