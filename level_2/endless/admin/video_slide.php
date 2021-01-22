<?php
include "session.php";

countSlide();
createSlide();
modifySlide();
deleteSlide();


?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea Slide | Aziflix</title>
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
        <!-- Page Header Ends -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include "sidebar_page.php"; ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header">

                        <div class="card">
                            <div class="card-header">
                                <h5>Crea slide</h5>
                            </div>
                            <form class="form theme-form" id="form_click" method="POST" action="">
                                <div class="card-body">
                                    <div class="row template" id="template">

                                        <div class="col">
                                            <label>*<?php echo countSlide() ?> slide è già salvata</label><br>
                                            <input value="<?php echo 5 - countSlide() ?>" readonly id="nrSlide"
                                                hidden />
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="seleziona-video">Seleziona video</label><br>
                                                    <select class="seleziona-video form-control col-md-10"
                                                        id="seleziona-video" name="seleziona-video[]">
                                                        <option></option>
                                                        <?php
                                                        global $connection;
                                                        $query = "SELECT * FROM videos"; // query to put the contracts into select box
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $idVideo = $row['id_video'];
                                                            $titleVideo = $row['title_video'];
                                                            echo "<option value=" . $idVideo . ">" . $titleVideo . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="seleziona-position">Posizione</label><br>
                                                    <select class="seleziona-position form-control col-md-10"
                                                        id="seleziona-position" name="seleziona-position[]">
                                                        <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mt-2"><br>
                                                    <button type="button" class="btn btn-success" id="addNew"><span
                                                            class="fa fa-plus"></span></button>
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


                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Modifica slide</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="display dataTable table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nome </th>
                                                    <th>Possition</th>
                                                    <th>Modifica</th>
                                                    <th>Elimina</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                global $connection;
                                                $query = "SELECT videos.id_video, videos.title_video, video_slide.id_slide, video_slide.slide_position
                                                            FROM videos, video_slide
                                                            WHERE videos.id_video = video_slide.id_video";
                                                $result = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $idVideo = $row['id_video'];
                                                    $idSlide = $row['id_slide'];
                                                    $titleVideo = $row['title_video'];
                                                    $position = $row['slide_position'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $titleVideo ?></td>
                                                    <td><?php echo $position ?></td>
                                                    <td>
                                                        <center><button type="button"
                                                                class=" btn btn-warning btnModifica "
                                                                title="Modifica Categoria" data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                value="<?php echo $idVideo ?>"><i
                                                                    class="fas fa-edit"></i></button> </center>
                                                    </td>
                                                    <td>
                                                        <form action="" method="POST">
                                                            <center><button type="submit" name="deleteSlide"
                                                                    class="btn btn-danger" title="Elimina Slide"
                                                                    value="<?php echo $idSlide ?>"><i
                                                                        class="fas fa-trash"></i></button> </center>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php } ?>

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
                                    <h5 class="modal-title" id="exampleModalLabel">Modifica Posizione Slide</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="titleModal">Title</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="titleModal" name="titleModal" type="text"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="positionModal">Posizione</label>
                                        <div class="col-sm-9">
                                            <select class="form-control col-md-12" id="positionModal"
                                                name="positionModal">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="text" name="videoIdModal" class="form-control" id="videoIdModal" hidden
                                        readonly>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="modificaSlide"
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
    <?php include "scripts_admin.php";

    if ($_SESSION['slideCreateSuccess'] == true) {
        echo '<script type="text/javascript"> swal("Successo!", "La slide è stata creata!", "success") </script>';
    }

    if ($_SESSION['slideCreateError'] == true) {
        echo '<script type="text/javascript"> swal("Errore!", "La slide non è stata creata!", "error") </script>';
    }

    if ($_SESSION['deleteSlideSuccess'] == true) {
        echo '<script type="text/javascript"> swal("Successo!", "La slide è stata eliminata!", "success") </script>';
    }

    if ($_SESSION['deleteSlideError'] == true) {
        echo '<script type="text/javascript"> swal("Errore!", "La slide non è stata eliminata!", "error") </script>';
    }
    if ($_SESSION['positionNotAvailable'] == true) {
        echo '
            <script type="text/javascript">swal("Errore!", "La posizione non è disponibile!", "error")</script>';
    }

    if ($_SESSION['positionUpdateError'] == true) {
        echo '<script type="text/javascript">swal("Errore!", "La posizione non è stata aggiornata!", "error")</script>';
    }


    if ($_SESSION['positionUpdateSuccess'] == true) {
        echo '<script type="text/javascript">
            swal("Successo!", "La posizione è stata aggiornata!", "success")
            </script>';
    }

    ?>

</body>
<script>
$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        "order": [
            [1, "asc"]
        ]
    });



    selectPosition();
    selectVideo();

    let nrSlide = $('#nrSlide').val()

    function selectVideo() {
        $(".seleziona-video").select2({
            placeholder: "Seleziona"
        });
    }

    function selectPosition() {
        $(".seleziona-position").select2({
            placeholder: "Seleziona"
        });

    }

    let newTemplate = `<div class="row template" id="template">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <select class="seleziona-video form-control col-md-10" name="seleziona-video[]">
                                                        <option></option>
                                                        <?php
                                                        global $connection;
                                                        $query = "SELECT * FROM videos"; // query to put the contracts into select box
                                                        $result = mysqli_query($connection, $query);
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $idVideo = $row['id_video'];
                                                            $titleVideo = $row['title_video'];
                                                            echo "<option value=" . $idVideo . ">" . $titleVideo . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <select class="seleziona-position form-control col-md-10" name="seleziona-position[]">
                                                    <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-danger remove" ><span class="fa fa-minus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

    $('body').on('click', '#addNew', function() {
        let tempLength = $('.template').length;
        if (tempLength > (nrSlide - 1)) {
            swal("Error!", `Non puoi aggiungere più slides!`, "error");
        } else {
            $('.template:last').after(newTemplate);
        }
        selectVideo();
        selectPosition();
    })


    let videoArr = [];
    let positionArr = [];



    $('body').on('click', '.remove', function() {
        let valPos = $(this).closest('div.template').find(".seleziona-position").val();
        let valVideo = $(this).closest('div.template').find(".seleziona-video").val();

        const deletPostion = deleteFromArr(valPos, positionArr);
        const deleteVideo = deleteFromArr(valVideo, videoArr);

        $(this).closest('.template').remove();

    })

    $('body').on('change', '.seleziona-video', function() {
        let selectVal = $(this).val();
        checkValSelected(selectVal, videoArr);
    })

    $('body').on('change', '.seleziona-position', function() {
        let selectVal = $(this).val();
        checkValSelected(selectVal, positionArr);
    })


    //push into array if the value isn't selected before
    function checkValSelected(value, arrValue) {
        var n = arrValue.includes(value);
        if (n) {
            swal("Error!", "Non puoi scegliere questa opzione, già selezionata!", "error");
            $('#btn_salva').attr('disabled', 'disabled');
        } else {
            $('#btn_salva').removeAttr('disabled');
            arrValue.push(value);
        }
    }

    //remove from array
    function deleteFromArr(val, arr) {
        const index = arr.indexOf(val);
        arr.splice(index, 1);
        return arr;
    }


    //modifica modal
    $('.btnModifica').click(function() {
        var thisRow = $(this).closest('tr');
        var dataRow = table.row(thisRow).data();

        var videoId = $(this).val();
        console.log(videoId)
        var titleVideo = dataRow[0];
        var position = dataRow[1];

        $('#titleModal').val(titleVideo);
        $('#positionModal').val(position);
        $('#videoIdModal').val(videoId);
    });
});
</script>

</html>