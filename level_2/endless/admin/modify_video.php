<?php
include 'session.php';
global $connection;
$queryVideo = "SELECT * from videos";
$resultVideo = mysqli_query($connection, $queryVideo);
deleteVideo();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Video | Aziflix</title>
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
                            <div class="card-header">
                                <h5>modifica i dati video / podcast / live</h5>
                            </div>
                            <div class="card-body">
                                <form class="form theme-form" id="form_click" method="POST" action=""
                                    enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="idVideo">Seleziona video</label>
                                        <div class="col-sm-9">
                                            <select class="form-control seleziona col-md-10" name="idVideo"
                                                id="idVideo">
                                                <option></option>
                                                <?php while ($rowVideo = mysqli_fetch_array($resultVideo)) {
    $idVideo = $rowVideo['id_video'];
    $titleVideo = $rowVideo['title_video'];
    echo '<option value="' . $idVideo . '">' . $titleVideo . '</option>';
} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="super_categorie">Seleziona super
                                            categoria</label>
                                        <div class="col-sm-9">
                                            <select class="form-control seleziona col-md-10" name="super_categorie"
                                                id="super_categorie" required>
                                                <option value="" disabled selected>Seleziona</option>
                                                <option value="1">Video</option>
                                                <option value="2">Podcast</option>
                                                <option value="3">Serial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="category">Categoria</label>
                                        <div class="col-sm-9">
                                            <select class="seleziona form-control col-md-10" multiple name="category[]"
                                                id="category">
                                                <option></option>
                                                <?php
                                                        global $connection;
                                                        $query = 'SELECT * FROM video_category'; // query to put the contracts into select box
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo '<option value=' . $row['id_category'] . '>' . $row['category_video'] . '</option>';
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="title">Titolo</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="title" id="title"
                                                placeholder="Titolo">
                                        </div>
                                    </div>
                                    <div class="form-group row" id="podcastDiv">
                                        <label class="col-sm-3 col-form-label" for="podcast">Carica podcast</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="podcast" id="podcast"
                                                accept=".wav, .mp3, .wma">
                                        </div>
                                    </div>
                                    <div id="videoDiv">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="video">Carica video</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="video" id="video"
                                                    accept=".mp4, .mpeg4, .mov, .mkv">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="trailer">Carica trailer
                                                video</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="trailer" id="trailer"
                                                    accept=".mp4, .mpeg4, .mov, .mkv">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="thumbnail">Carica thumbnail
                                                video</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                                    accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="autore">Seleziona Autore</label>
                                        <div class="col-sm-9">
                                            <select class="seleziona form-control col-md-10" name="autore" id="autore">
                                                <option></option>
                                                <?php
                                                        global $connection;
                                                        $query = 'SELECT * FROM autore_video'; // query to put the contracts into select box
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            echo '<option value=' . $row['id_autore'] . '>' . $row['nome_autore'] . ' ' . $row['cognome_autore'] . '</option>';
                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="tipologia">Tipologia</label>
                                        <div class="col-sm-9">
                                            <select class="seleziona form-control col-md-10" name="tipologia"
                                                id="tipologia">
                                                <option value="" disabled selected>Seleziona</option>
                                                <option value="1">Gratis</option>
                                                <option value="2">A pagamento</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="prezo" hidden>
                                        <label class="col-sm-3 col-form-label" for="prezzo">Prezzo</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="prezzo" id="prezzo" type="number"
                                                placeholder="Prezzo">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-3 col-form-label" for="descrizione">Descrizione</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" rows="5" cols="5" name="descrizione"
                                                id="descrizione" placeholder="Descrizione"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="ytLink">YouTube Link</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" name="ytLink" id="ytLink" type="text"
                                                placeholder="YouTube Link">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-3 col-form-label" for="uploadedVideo">Video/Podcast
                                            caricato</label>
                                        <div class="col-sm-9" id="uploadedVideo">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-3 col-form-label" for="uploadedTrailer">Trailer
                                            caricato</label>
                                        <div class="col-sm-9" id="uploadedTrailer">

                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-3 col-form-label" for="descrizione_video">Thumbnail
                                            caricato</label>
                                        <div class="col-sm-9" id="uploadedThumbnail">

                                        </div>
                                    </div>
                                    <div class="col-sm-9 offset-sm-3 mt-2">
                                        <button class="btn btn-primary" name="btn_salva" type="submit"
                                            id="btn_salva">Salva</button>
                                        <button class="btn btn-danger" name="btn_delete" type="submit"
                                            id="btn_delete">Elimina</button>
                                        <input class="btn btn-light" type="reset" value="Cancel">
                                    </div>
                                </form>
                            </div>
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
    <?php include 'scripts_admin.php';
    if (!empty($deleteVideoResponse)) {
        echo $deleteVideoResponse;
    }
    ?>
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
        } else {
            $('#videoDiv').hide();
            $('#podcastDiv').show();
        }
    })
    $(".seleziona").select2({
        placeholder: "Seleziona"
    });

    function selectAttr(inputSelector, value) {
        $(`#${inputSelector} option`).each(function() {
            if ($(this).text() == value) {
                $(this).attr("selected", "selected");
                $(`#${inputSelector}`).select2();
            }
        });
    }

    $('#idVideo').on('change', function() {
        var idVideo = $(this).val();

        $('#btn_delete').val(idVideo);
        $.ajax({
            type: "POST",
            url: './ajax/videoDataAjax.php',
            data: {
                idVideo: idVideo
            },
            success: function(data) {
                const {
                    titleVideo,
                    descriptionVideo,
                    autore,
                    price,
                    tipologia,
                    superCategorie,
                    videoCategorie,
                    ytLink,
                    file,
                    trailer,
                    thumbnail
                } = JSON.parse(data);

                if (videoCategorie) {
                    const videoCategorieArr = videoCategorie.split(',');

                    $("#category option ").each(function() {
                        for (var i = 0; i < videoCategorieArr.length; i++) {
                            if ($(this).text() == videoCategorieArr[i]) {
                                $(this).attr("selected", "selected");
                                $("#category").select2();
                            }
                        }
                    });
                }

                const superCategorieSelect = selectAttr('super_categorie', superCategorie);
                if (superCategorie == "Video" || superCategorie == "Serial") {
                    $('#videoDiv').show();
                } else {
                    $('#podcastDiv').show();

                }

                $('#title').val(titleVideo);

                const autoreSelect = selectAttr('autore', autore);
                const tipologiaSelect = selectAttr('tipologia', tipologia);

                $('#descrizione').val(descriptionVideo);

                $('#ytLink').val(ytLink);

                $('#uploadedVideo').html(file);
                $('#uploadedTrailer').html(trailer);
                $('#uploadedThumbnail').html(thumbnail);
            }
        })
    })
    //get filename from input type file
    function fileName(input_id) {
        let filename = input_id.val().split('\\').pop();
        return filename;
    }
    $('#form_click').on('submit', function(e) {
        e.preventDefault();
        if ($('#idVideo').val() == '') {
            swal("Errore!", "È necessario selezionare un video!", "error");
        } else {

            let podcastId = $('#podcast');
            let podcast = fileName(podcastId);
            let videoId = $('#video');
            let video = fileName(videoId);

            let trailerId = $('#trailer');
            let trailer = fileName(trailerId);
            let thumbnail_video_Id = $('#thumbnail');
            let thumbnail_video = fileName(thumbnail_video_Id);
            //append input file to FormData
            var formData = new FormData(this);
            formData.append('podcast', podcast);
            formData.append('video', video);
            formData.append('trailer', trailer);
            formData.append('thumbnail', thumbnail_video);
            $.ajax({
                //get upload percentage
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = Math.floor(((evt.loaded / evt
                                    .total) *
                                100));
                            $("#percetuale").html(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                processData: false,
                contentType: false,
                type: "POST",
                url: './ajax/videoModifyAjax.php',
                headers: {
                    'Content-Type': undefined
                },
                data: formData,
                beforeSend: function() {
                    // show block ui
                    $.blockUI({
                        message: 'Caricamento in corso <span id="percetuale"></span><br><img src="../assets/images/spinner.svg" />',
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
    $("#select_tipologia").change(function() {
        var val = $(this).val();
        if (val == "A pagamento") {
            $("#prezo").removeAttr('hidden');
        } else if (val == "Gratis") {
            $("#prezo").attr('hidden', true);
        }
    });
});
</script>

</html>