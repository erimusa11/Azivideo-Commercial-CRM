<?php
include "session.php";

createSubscription();
deletePremiumSub();
deletePayPerViewSub();

if (!empty($_SESSION['subscriptionExist'])) {
    echo $_SESSION['subscriptionExist'];
}

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Vendita | Aziflix</title>
    <!-- Google font-->
    <?php include "css_admin.php"; ?>
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader bg-white">
            <div class="whirly-loader"> </div>
        </div>
    </div>

    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        <?php include "navbar_page.php"; ?>
        <!-- Page Header Ends
      <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include "sidebar_page.php"; ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="mt-4 mr-5 ml-auto"><button class="btn btn-info" type="button"
                                        data-toggle="modal" data-target="#exampleModal">Crea Abbonamenti</i></button>
                                </div>
                                <div class="card-header">
                                    <h5>Utenti con abbonamenti premium</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="display dataTable table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome dell'utente</th>
                                                    <th>Abbonamenti</th>
                                                    <th>Data Sottoscrizione Inizio</th>
                                                    <th>Data Sottoscrizione Fine</th>
                                                    <th>Elimina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                global $connection;
                                                $queryPremium = "SELECT user_id, CONCAT(user_name,' ', user_surname) AS fullname, video_buy.data_subscription_start AS start,  video_buy.data_subscription_end AS end
                                                FROM users 
                                                INNER JOIN video_buy
                                                ON users.user_id = video_buy.id_user
                                                AND video_buy.subscription = 2";
                                                $resultPremium = mysqli_query($connection, $queryPremium);
                                                while ($rowPremium = mysqli_fetch_array($resultPremium)) {
                                                    $userId = $rowPremium['user_id'];
                                                    $userName = $rowPremium['fullname'];
                                                    $start = date('d-m-Y', strtotime($rowPremium['start']));
                                                    $end = date('d-m-Y', strtotime($rowPremium['end']));
                                                    echo '<tr>';
                                                    echo '<td>' . $userName . '</td>';
                                                    echo '<td><span class="badge badge-pill badge-success">PREMIUM</span></td>';
                                                    echo '<td>' . $start . '</td>';
                                                    echo '<td>' . $end . '</td>';
                                                    echo '<form action="#" method="POST"><td><button class="btn btn-pill btn-danger btn-air-danger" name="deletePremium" type="submit" value="' . $userId . '"><i class="far fa-trash-alt"></i></button></td></form>';
                                                    echo '</tr>';
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Utenti con abbonamenti Pay-Per-View</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="display dataTable table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome dell'utente</th>
                                                    <th>Abbonamenti</th>
                                                    <th>Titolo del video</th>
                                                    <th>Elimina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                global $connection;
                                                $queryPPV = "SELECT user_id, CONCAT(user_name,' ', user_surname) AS fullname, videos.title_video AS title, videos.id_video
                                                                    FROM users 
                                                                    INNER JOIN video_buy
                                                                    ON users.user_id = video_buy.id_user
                                                                    INNER JOIN video_buy_idVideos
                                                                    ON video_buy_idVideos.id_user = video_buy.id_user
                                                                    INNER JOIN videos
                                                                    ON videos.id_video = video_buy_idVideos.id_video
                                                                    AND video_buy.subscription = 1";
                                                $resultPPV = mysqli_query($connection, $queryPPV);
                                                while ($rowPPV = mysqli_fetch_array($resultPPV)) {
                                                    $userId = $rowPPV['user_id'];
                                                    $userName = $rowPPV['fullname'];
                                                    $title = $rowPPV['title'];
                                                    $idVideo = $rowPPV['id_video'];

                                                    echo '<tr>';
                                                    echo '<td>' . $userName . '</td>';
                                                    echo '<td><span class="badge badge-pill badge-secondary">Pay-Per-View</span></td>';
                                                    echo '<td>' . $title . '</td>';
                                                    echo '<form action="#" method="POST"><td>
                                                    <input name="idVideo" value="' . $idVideo . '" hidden readonly/>
                                                    <button class="btn btn-pill btn-danger btn-air-danger" name="deletePPV" type="submit" value="' . $userId . '"><i class="far fa-trash-alt"></i></button></td></form>';
                                                    echo '</tr>';
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <form action="" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Crea nuovo abbonamenti</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="userNameModal">Nome
                                            dell'utente</label>
                                        <div class="col-sm-9">
                                            <select class="form-control col-sm-12 select2" id="userNameModal"
                                                name="userNameModal">
                                                <option></option>
                                                <?php
                                                global $connection;
                                                $queryUser = "SELECT user_id ,CONCAT(user_name,' ',user_surname) AS fullname
                                            FROM users
                                            WHERE user_livel = 1";
                                                $resultUser = mysqli_query($connection, $queryUser);
                                                while ($rowUser = mysqli_fetch_array($resultUser)) {
                                                    $idUser = $rowUser['user_id'];
                                                    $fullName = $rowUser['fullname'];
                                                    echo '<option value="' . $idUser . '">' . $fullName . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"
                                            for="subscriptionModal">Abbonamenti</label>
                                        <div class="col-md-9">
                                            <select class="form-control col-md-12 select2" id="subscriptionModal"
                                                name="subscriptionModal">
                                                <option></option>
                                                <option value="1">Pay-Per-View</option>
                                                <option value="2">Premium</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row pay-per-view" hidden>
                                        <label class="col-sm-3 col-form-label" for="videosModal">Videos</label>
                                        <div class="col-md-9">
                                            <select class="form-control col-md-12 select2" id="videosModal"
                                                name="videosModal[]" multiple>
                                                <option></option>
                                                <?php
                                                global $connection;
                                                $queryVideos = "SELECT id_video, title_video
                                                                FROM videos";
                                                $resultVideos = mysqli_query($connection, $queryVideos);
                                                while ($rowVideos = mysqli_fetch_array($resultVideos)) {
                                                    $idVideo = $rowVideos['id_video'];
                                                    $titleVideo = $rowVideos['title_video'];
                                                    echo '<option value="' . $idVideo . '">' . $titleVideo . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="premiumDates" hidden>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="startModal">Inizio
                                                Abbonamenti</label>
                                            <div class="col-md-9">
                                                <input class="form-control dateInput" id="startModal" name="startModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="endModal">Fine
                                                Abbonamenti</label>
                                            <div class="col-md-9">
                                                <input class="form-control dateInput" id="endModal" name="endModal"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="createSub"
                                        class="btn btn-primary btn-rounded mb-4 mt-2">Salva</button>
                                    <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2"
                                        data-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <!-- Container-fluid starts-->

                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <?php include "footer.php"; ?>
        </div>
    </div>
    <?php include "scripts_admin.php"; ?>

</body>
<script>
$(document).ready(function() {
    var table = $('.dataTable').DataTable({
        "order": [
            [1, "asc"]
        ]
    });

    $(".select2").select2({
        placeholder: 'Seleziona',
        width: '100%'
    });

    $('.dateInput').datepicker({
        language: 'it',
        autoClose: true,
    });

    $('#subscriptionModal').on('change', function() {
        var subValue = $(this).val();
        if (subValue == 1) {
            $('.pay-per-view').removeAttr('hidden');
            $('.premiumDates').attr('hidden', true);
        } else {
            $('.premiumDates').removeAttr('hidden');
            $('.pay-per-view').attr('hidden', true);
        }
    })
});
</script>

</html>