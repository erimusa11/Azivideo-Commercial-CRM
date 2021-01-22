<?php
include 'session.php';?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carica Video | Aziflix</title>
    <!-- Google font-->
    <?php include 'css_admin.php'; ?>
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
        <?php include 'navbar_page.php'; ?>
        <!-- Page Header Ends
      <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include 'sidebar_page.php'; ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">

                        <div class="card">
                            <div class="card-header text-center">
                                <h5>inserire i dati video / podcast / live</h5>
                            </div>
                            <form class="form theme-form" id="form_click" method="POST" action=""
                                enctype="multipart/form-data" novalidate>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="super_categorie">Seleziona
                                                    super categoria</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control seleziona col-md-10"
                                                        name="super_categorie" id="super_categorie" required>
                                                        <option value="" disabled selected>Seleziona</option>
                                                        <option value="1">Video </option>
                                                        <option value="2">Podcast</option>
                                                        <option value="3">Serial</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="category">Categoria</label>
                                                <div class="col-sm-9">
                                                    <select class="seleziona form-control col-md-10" multiple
                                                        name="category[]" id="category" required>
                                                        <option></option>
                                                        <?php

                                                        global $connection;
                                                        $query = 'SELECT * FROM video_category'; // query to put the contracts into select box
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo '<option value='.$row['id_category'].'>'.$row['category_video'].'</option>';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="title_video">Titolo</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="title_video"
                                                        placeholder="Titolo" required id="title_video">
                                                </div>
                                            </div>

                                            <div class="form-group row" id="ytLinkDiv">
                                                <label class="col-sm-3 col-form-label" for="ytLink">YouTube Link</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="ytLink"
                                                        placeholder="YouTube link" id="ytLink">
                                                </div>
                                            </div>
                                            <div class="form-group row" id="podcastDiv">
                                                <label class="col-sm-3 col-form-label" for="podcast">Upload
                                                    podcast</label>
                                                <div class="col-sm-9">
                                                    <input type="file" class="form-control" name="podcast" id="podcast"
                                                        accept=".wav, .mp3, .wma">
                                                </div>
                                            </div>
                                            <div id="videoDiv">
                                                <div class="form-group row" id="videoUploadInput">
                                                    <label class="col-sm-3 col-form-label" for="video">Upload
                                                        video</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" name="video" id="video"
                                                            accept=".mp4, .mpeg4, .mov, .mkv">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="trailer_video">Upload
                                                        trailer video</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" name="trailer_video"
                                                            id="trailer_video" accept=".mp4, .mpeg4, .mov, .mkv">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"
                                                        for="thumbnail_video">Thumbnail video</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="form-control" name="thumbnail_video"
                                                            id="thumbnail_video" accept=".jpg, .jpeg, .png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="autore">Seleziona
                                                    Autore</label>
                                                <div class="col-sm-9">
                                                    <select class="seleziona form-control col-md-10" name="autore"
                                                        id="autore" required>
                                                        <option></option>
                                                        <?php
                                                        global $connection;
                                                        $query = "SELECT * 
                                                        FROM autore_video
                                                        ORDER BY CONCAT(autore_video.nome_autore, ' ', autore_video.cognome_autore) ASC"; // query to put the contracts into select box
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo '<option value='.$row['id_autore'].'>'.$row['nome_autore'].' '.$row['cognome_autore'].'</option>';
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="tipologia">Tipologia</label>
                                                <div class="col-sm-9">
                                                    <select class="form-control seleziona col-md-10" name="tipologia"
                                                        id="tipologia">
                                                        <option value="" disabled selected>Seleziona</option>
                                                        <option value="Gratis">Gratis </option>
                                                        <option value="A pagamento">A pagamento</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="prezzoDiv" hidden>
                                                <label class="col-sm-3 col-form-label">Prezzo</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="prezzo" id="prezzo" type="number"
                                                        placeholder="Prezzo">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <label class="col-sm-3 col-form-label"
                                                    for="descrizione_video">Descrizione</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" rows="5" cols="5"
                                                        name="descrizione_video" id="descrizione_video"
                                                        placeholder="Descrizione" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button class="btn btn-primary" name="btn_salva" type="submit"
                                            id="btn_salva">Salva</button>
                                        <input class="btn btn-light" type="reset" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





                <!-- Container-fluid starts-->

                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <?php include 'scripts_admin.php'; ?>
    <script src="../assets/js/blockui/custom-blockui.js"></script>
    <script src="../assets/js/blockui/jquery.blockUI.min.js"></script>
</body>
<script>
$(document).ready(function() {
    $('#podcastDiv').hide();
    $('#videoDiv').hide();

    $('#super_categorie').on('change', function() {
        var selectVal = $(this).val();

        if (selectVal == 1 || selectVal == 3) {
            $('#videoDiv').show();
            $('#podcastDiv').hide();
            $('#video').attr('required', true);

            $('#thumbnail_video').attr('required', true);
        } else {
            $('#videoDiv').hide();
            $('#podcastDiv').show();
            $('#podcastDiv').attr('required', true);
        }
    });


    $(".seleziona").select2({
        placeholder: "Seleziona"
    });


    //get filename from input type file
    function fileName(input_id) {
        let filename = input_id.val().split('\\').pop();
        return filename;
    }

    $('#form_click').on('submit', function(e) {

        e.preventDefault();
        let ytLinkVal = $('#ytLink').val();

        let podcastId = $('#podcast');
        let podcast = fileName(podcastId);

        let videoId = $('#video');
        let video = fileName(videoId);

        let trailerId = $('#trailer_video');
        let trailer = fileName(trailerId);

        let thumbnail_video_Id = $('#thumbnail_video');
        let thumbnail_video = fileName(thumbnail_video_Id);


        //append input file to FormData
        var formData = new FormData(this);
        formData.append('podcast', podcast);
        formData.append('video', video);
        formData.append('trailer_video', trailer);
        formData.append('thumbnail_video', thumbnail_video);

        if ((!video && !podcast && !ytLinkVal)) {
            swal("Errore!", "L'input di caricamento o il link di YouTube non deve essere vuoto!",
                "error");

        } else {
            $.ajax({
                //get upload percentage
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = Math.floor(((evt.loaded / evt
                                    .total) *
                                100));
                            $("#percetuage").html(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                processData: false,
                contentType: false,
                type: "POST",
                url: './ajax/videoUploadAjax.php',
                headers: {
                    'Content-Type': undefined
                },
                data: formData,
                beforeSend: function() {
                    // show block ui
                    $.blockUI({
                        message: 'Caricamento in corso <span id="percetuage"></span><br><img src="../assets/images/spinner.svg" />',
                        fadeIn: 800,
                        overlayCSS: {
                            backgroundColor: '#1b2024',
                            opacity: 0.8,
                            zIndex: 1200,
                            cursor: 'wait'
                        },
                        css: {
                            border: 0,
                            color: '#fff',
                            zIndex: 1201,
                            padding: 0,
                            backgroundColor: 'transparent'
                        }
                    });

                },
                success: function(data) {
                    if (data == 'query success') {
                        swal("Successo!", "Dati salvati con successo!", "success").then(
                            function() {
                                location.reload();
                            });
                    } else if (data == 'query failed') {
                        swal("Errore!", "Dati non salvati!", "error").then(function() {
                            location.reload();
                        });
                    } else if (data == 'upload failed') {
                        swal("Errore!",
                            "Si è verificato un errore durante il caricamento dei video!",
                            "error").then(function() {
                            location.reload();
                        });
                    }
                },
                complete: function(data) {
                    // Hide block ui
                    $.unblockUI();
                }
            });
        }
    });


    $("#tipologia").change(function() {
        var val = $(this).val();
        if (val == "A pagamento") {
            $("#prezzoDiv").removeAttr('hidden');
        } else if (val == "Gratis") {
            $("#prezzoDiv").attr('hidden', true);
        }
    });
});
</script>

</html>