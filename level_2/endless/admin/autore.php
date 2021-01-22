<?php
include 'session.php';
creaAutore();
modificaAutore();
deleteAutore();

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autore | Aziflix</title>
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
        <?php include "navbar_page.php";
    ?>
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include "sidebar_page.php";
      ?>
            <!-- Page Sidebar Ends-->

            <div class="page-body">
                <div class="container-fluid">
                    <!-- CONTENT AREA -->
                    <br>
                    <div class="row" id="cancel-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                            <br>

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Crea nuovo autore</h5>
                                                </div>
                                                <div class="card-body">
                                                    <form class="needs-validation" novalidate="" method="POST" action=""
                                                        enctype="multipart/form-data">
                                                        <div class="form-row">
                                                            <div class="col-md-3 mb-3">
                                                                <label for="nome">Nome</label>
                                                                <input class="form-control" id="nome" name="nome"
                                                                    type="text" placeholder="Nome" required="">
                                                                <div class="invalid-feedback">L'input del nome non deve
                                                                    essere vuoto!</div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="cognome">Cognome</label>
                                                                <input class="form-control" id="cognome" name="cognome"
                                                                    type="text" placeholder="Cognome" required="">
                                                                <div class="invalid-feedback">L'input del cognome non
                                                                    deve essere vuoto!</div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="citta">Città</label>
                                                                <div class="input-group">
                                                                    <input class="form-control" id="citta" name="citta"
                                                                        type="text" placeholder="Città" required="">
                                                                    <div class="invalid-feedback">L'input del città non
                                                                        deve essere vuoto!</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="descrizione">Descrizione</label>
                                                                <div class="input-group">
                                                                    <textarea class="form-control" id="descrizione"
                                                                        name="descrizione" type="text"
                                                                        placeholder="Descrizione"
                                                                        required=""></textarea>
                                                                    <div class="invalid-feedback">L'input del
                                                                        descrizione non deve essere vuoto!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3 mb-3">
                                                                <label for="facebook">Facebook Link</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"
                                                                            id="inputGroupPrepend"><i
                                                                                class="fab fa-facebook-f"></i></span>
                                                                    </div>
                                                                    <input class="form-control" id="facebook"
                                                                        name="facebook" type="text"
                                                                        placeholder="Facebook Link" required="">
                                                                    <div class="invalid-feedback">L'input del facebook
                                                                        link non deve essere vuoto!</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="twitter">Twitter Link</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"
                                                                            id="inputGroupPrepend"><i
                                                                                class="fab fa-twitter"></i></span></div>
                                                                    <input class="form-control" id="twitter"
                                                                        name="twitter" type="text"
                                                                        placeholder="Twitter Link" required="">
                                                                    <div class="invalid-feedback">L'input del twitter
                                                                        link non deve essere vuoto!</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="linkedin">LinkedIn Link</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"
                                                                            id="inputGroupPrepend"><i
                                                                                class="fab fa-linkedin-in"></i></span>
                                                                    </div>
                                                                    <input class="form-control" id="linkedin"
                                                                        name="linkedin" type="text"
                                                                        placeholder="Linked Link" required="">
                                                                    <div class="invalid-feedback">L'input del LinkedIn
                                                                        link non deve essere vuoto!</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="instagram">Instagram Link</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span
                                                                            class="input-group-text"
                                                                            id="inputGroupPrepend"><i
                                                                                class="fab fa-instagram"></i></span>
                                                                    </div>
                                                                    <input class="form-control" id="instagram"
                                                                        name="instagram" type="text"
                                                                        placeholder="Linked Link" required="">
                                                                    <div class="invalid-feedback">L'input del Instagram
                                                                        link non deve essere vuoto!</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="col-md-3 mb-3">
                                                                <label for="photo">Foto</label>
                                                                <div class="input-group">
                                                                    <input type="file" class="form-control" name="photo"
                                                                        id="photo" accept=".jpg, .jpeg, .png">
                                                                    <div class="invalid-feedback">L'input del foto non
                                                                        deve essere vuoto</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3 ml-4">
                                                        <button name="btn_creaAutore"
                                                            class="btn btn-success btn-rounded waves-effect waves-light"
                                                            type="submit">Crea</button>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Default ordering (sorting) Starts-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Modifica l'autore</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="display dataTable table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nome </th>
                                                <th>Cognome</th>
                                                <th>Città</th>
                                                <th>Descrizione</th>
                                                <th>Foto</th>
                                                <th>Facebook Link</th>
                                                <th>Twitter Link</th>
                                                <th>LinkedIn Link</th>
                                                <th>Instagram Link</th>
                                                <th>Modifica Autore</th>
                                                <th>Elemina Autore</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                      global $connection;
                      $select_autore = "SELECT * FROM autore_video";
                      $result_autore = mysqli_query($connection, $select_autore);
                      while ($row_autore = mysqli_fetch_array($result_autore)) {
                        $nome = $row_autore['nome_autore'];
                        $cognome = $row_autore['cognome_autore'];
                        $citta = $row_autore['citta_autore'];
                        $descrizione = $row_autore['desc_autore'];
                        $photo = '../../../image/autoreImg/' . $row_autore['img_autore'];
                        $facebook = $row_autore['fb_autore'];
                        $twitter = $row_autore['twitter_autore'];
                        $linkedin = $row_autore['linkedin_autore'];
                        $instagram = $row_autore['insta_autore'];

                      ?>
                                            <tr>
                                                <td><?php echo $nome ?></td>
                                                <td><?php echo $cognome ?></td>
                                                <td><?php echo $citta ?></td>
                                                <td><?php echo $descrizione ?></td>
                                                <td><?php echo '<a href="' . $photo . '" target="_blank">Foto</a>' ?>
                                                </td>
                                                <td><?php echo $facebook ?></td>
                                                <td><?php echo  $twitter ?></td>
                                                <td><?php echo  $linkedin ?></td>
                                                <td><?php echo  $instagram ?></td>
                                                <td>
                                                    <center><button type="button" class=" btn btn-warning btnModifica "
                                                            title="Modifica Categoria" data-toggle="modal"
                                                            data-target="#exampleModal"
                                                            value="<?php echo $row_autore['id_autore'] ?>"><i
                                                                class="fas fa-edit"></i></button> </center>
                                                </td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="text d-none" name="photoAutore"
                                                            value="<?php echo $photo ?>" hidden readonly />
                                                        <center><button value="<?php echo $row_autore['id_autore'] ?>"
                                                                type="submit" name="delete" class="btn btn-danger"
                                                                title="Elimina Categoria"><i
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
                    <!-- Default ordering (sorting) Ends-->
                    <!-- Modal -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifica Autore</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="nomeModal">Nome</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="nomeModal" name="nomeModal" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="cognomeModal">Cognome</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="cognomeModal" name="cognomeModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="cittaModal">Città</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="cittaModal" name="cittaModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                for="descrizioneModal">Descrizione</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="descrizioneModal"
                                                    name="descrizioneModal" type="text"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="facebookModal">Facebook
                                                Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="facebookModal" name="facebookModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for=twitterModal">Twitter
                                                Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="twitterModal" name="twitterModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="linkedinModal">LinkedIn
                                                Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="linkedinModal" name="linkedinModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"
                                                for="instagramModal">Instagram</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="instagramModal" name="instagramModal"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="fotoModal">Foto</label>
                                            <div class="col-sm-9">
                                                <a id="photoModal" target="_blank">Foto</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="fotoModal">Cambia Foto</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" id="fotoModal" name="fotoModal" type="file"
                                                    accept=".jpg, .jpeg, .png">
                                            </div>
                                        </div>
                                        <input type="text" name="autoreIdModal" class="form-control" id="autoreIdModal"
                                            hidden readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="modificaAutore"
                                            class="btn btn-primary btn-rounded mb-4 mt-2">Salva</button>
                                        <button type="button" class="btn btn-dark btn-rounded mb-4 mt-2"
                                            data-dismiss="modal">Chiudi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Container-fluid starts-->
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <?php include "footer.php"; ?>
        </div>
    </div>
    <?php include "scripts_admin.php"; ?>
    <?php

  if ($_SESSION['authorSuccess'] == true) {
    echo '<script type="text/javascript">
            swal("Successo!", "L\'autore è stato creato!", "success")
            </script>';
  }

  if ($_SESSION['authorError'] == true) {
    echo '
            <script type="text/javascript">swal("Errore!", "L\'autore non è stato creato!", "error")</script>';
  }

  if ($_SESSION['authorExist'] == true) {
    echo '<script type="text/javascript">swal("Errore!", "L\'autore esiste già", "error")</script>';
  }

  if ($_SESSION['extError'] == true || $_SESSION['extModifyError'] == true) {
    echo '<script type="text/javascript">swal("Errore!", "L\'estensione del file dovrebbe essere .jpg, .jpeg o .png!", "error")</script>';
  }

  if ($_SESSION['authorModifySuccess'] == true) {
    echo '<script type="text/javascript">
            swal("Successo!", "L\'autore è stato modificato!", "success")
            </script>';
  }

  if ($_SESSION['authorModifyError'] == true) {
    echo '
            <script type="text/javascript">swal("Errore!", "L\'autore non è stato modificato!", "error")</script>';
  }

  if ($_SESSION['authorDeleteSuccess'] == true) {
    echo '<script type="text/javascript">
            swal("Successo!", "L\'autore è stato cancellato!", "success")
            </script>';
  }

  if ($_SESSION['authorModifyError'] == true) {
    echo '
            <script type="text/javascript">swal("Errore!", "L\'autore non è stato cancelllato!", "error")</script>';
  }
  ?>
    <script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "order": [
                [0, "asc"]
            ],
            columnDefs: [{
                targets: 3,
                render: $.fn.dataTable.render.ellipsis(50)
            }]
        });

        $('.btnModifica').click(function() {
            var thisRow = $(this).closest('tr');
            var dataRow = table.row(thisRow).data();

            var autoreId = $(this).val();
            var nome = dataRow[0];
            var cognome = dataRow[1];
            var citta = dataRow[2];
            var descrizione = dataRow[3];
            var photo = dataRow[4];
            var facebook = dataRow[5];
            var twitter = dataRow[6];
            var linkedin = dataRow[7];
            var instagram = dataRow[8];

            $('#nomeModal').val(nome);
            $('#cognomeModal').val(cognome);
            $('#cittaModal').val(citta);
            $('#descrizioneModal').val(descrizione);
            $('#facebookModal').val(facebook);
            $('#twitterModal').val(twitter);
            $('#linkedinModal').val(linkedin);
            $('#instagramModal').val(instagram);
            $('#photoModal').html(photo);
            $('#autoreIdModal').val(autoreId);
        });
    });
    </script>


</body>

</html>