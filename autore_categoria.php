<?php
include 'session.php';

global $connection;
$autore_id_post = $_GET['autore'];
$query_find_autore_name = "SELECT * FROM autore_video WHERE id_autore='$autore_id_post'";

$result_nome_autore = mysqli_query($connection, $query_find_autore_name);
$row_nome = mysqli_fetch_assoc($result_nome_autore);
$autoreFullName = $row_nome['nome_autore'].' '.$row_nome['cognome_autore'];

$queryCountVideoAuthor = "SELECT id_video
FROM videos
WHERE autore='$autore_id_post'";
$resultCountVideoAuthor = mysqli_query($connection, $queryCountVideoAuthor);
$count = mysqli_num_rows($resultCountVideoAuthor);

?>

<!doctype html>
<html lang="it">
<head>
    <?php include 'cssLinks.php'; ?>
    <title>Cat egorie di autori | AZIFLIX</title>
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

        <section class="jumbotron text-center bg-slide bg-autori" style="height:100px;">
            <div class="container ">
                <h1 class=" "><strong>
                        <?php echo $autoreFullName; ?>
                    </strong></h1>
            </div>
        </section>

        <div class="zmoto-inner-page">
            <div class="zmovo-product-page pt-50">
                <div class="container-fluid">

                    <?php
        if ($count == 0) {  
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
                        showthevideos(changeselect,<?php echo $autore_id_post; ?>,null,null);
              
                });
                showthevideos(null,<?php echo $autore_id_post; ?>,null,null);
            });
            </script>
</body>
</html>