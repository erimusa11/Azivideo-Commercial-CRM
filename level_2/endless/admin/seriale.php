<?php
include "session.php";

saveSerial($movedFile);
modifySerial($movedFile)

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seriale | Aziflix</title>

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
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Crea Seriale</h5>
                                </div>
                                <form action="" method="POST" class="form theme-form" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="title">Titolo</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="Titolo"
                                                            name="title" id="title">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label"
                                                        for="thumbnail">Thumbnail</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="file" placeholder="Thumbnail"
                                                            name="thumbnail" id="thumbnail"
                                                            accept="image/jpg, image/jpeg, image/png">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label" for="season">Stagioni</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" placeholder="Stagioni"
                                                            name="season" id="season">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success" name="saveSerial" type="submit">Salva</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Modifica Seriale</h5>
                                </div>
                                <form action="" method="POST" class="form theme-form" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <table id="zero-config" class="table responsive table-bordered table-hover">
                                            <thead>
                                                <th>Nome del Seriale</th>
                                                <th>Foto di seriale</th>
                                                <th>Stagione del seriale</th>
                                                <th>Modifica</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT *
                                                FROM serial 
                                                ORDER BY serial_name ASC";
                                                $result = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $serialTitle = $row['serial_name'];
                                                    $serialThumbnail = $row['serial_thumbnail'];
                                                    $serialThumbnailFullPath = '../../../thumbnail_serial/'.$serialThumbnail;
                                                    $serialSeason = $row['serial_season']; ?>
                                                <tr>
                                                    <td class="serialTitle"><?php echo $serialTitle ?></td>
                                                    <td class="serialThumbnail">
                                                        <a href="<?php echo $serialThumbnailFullPath ?>"
                                                            target="_blank">
                                                            <image src="<?php echo $serialThumbnailFullPath ?>"
                                                                height="150" width="150" />
                                                        </a>
                                                    </td>
                                                    <td class="serialSeason"><?php echo $serialSeason ?></td>
                                                    <td>
                                                        <center><button type="button"
                                                                value="<?php echo $serialSeason; ?>"
                                                                class="btn btn-warning btnEdit"
                                                                title="Modificare il seriale"><i
                                                                    class="fas fa-edit"></i></button> </center>
                                                    </td>
                                                </tr>
                                                <?php
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal fade" id="serialModal" tabindex="-1" role="dialog"
                        aria-labelledby="serialModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="serialModalLabel">Modifica</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="title">Titolo</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Titolo"
                                                name="modalTitle" id="modalTitle">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="thumbnail">Thumbnail</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" placeholder="Thumbnail"
                                                name="modalThumbnail" id="modalThumbnail"
                                                accept="image/jpg, image/jpeg, image/png">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="season">Stagioni</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Stagioni"
                                                name="modalSeason" id="modalSeason">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="modifySerial" id="modifySerial"
                                        class="btn btn-primary btn-rounded mb-4 mt-2">Salva</button>
                                    <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2"
                                        data-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <?php include "footer.php"; ?>
        </div>
    </div>
    <?php include "scripts_admin.php";
    if (!empty($createSerialResponse)) {
        echo $createSerialResponse;
    }
    if (!empty($modifySerialResponse)) {
        echo $modifySerialResponse;
    }
    ?>


    <script>
    $(document).ready(function() {
        var table = $('#zero-config').DataTable({
            "language": {
                "paginate": {
                    "previous": "<i class='flaticon-arrow-left-1'></i>",
                    "next": "<i class='flaticon-arrow-right'></i>"
                },
                "info": "Showing page _PAGE_ of _PAGES_"
            },
            "paging": false,
            "ordering": true,
            "info": true
        });
        $('.btnEdit').click(function() {
            var serialId = $(this).val();
            var serialTitle = $(this).closest('tr').find('td.serialTitle').text();
            var serialSeason = $(this).closest('tr').find('td.serialSeason').text();
            $('#modalTitle').val(serialTitle);
            $('#modalSeason').val(serialSeason);
            $('#modifySerial').val(serialId);
            $('#serialModal').modal('show');
        });
    });
    </script>
</body>

</html>