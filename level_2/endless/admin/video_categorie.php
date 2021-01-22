<?php
include "session.php";

carica_Category();
modifyCategory();
DeleteCategory();
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Categorie | Aziflix</title>
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
                                        <div class="col-sm-12 col-md-8">
                                            <form action="video_categorie.php" method="POST">

                                                <div class="card card-body text-center  mb-4">
                                                    <h3><i class="fas fa-plus"></i> Carica la categoria dell video</h3>
                                                    <hr>
                                                    <h6 class="card-title">Categoria video</h6>
                                                    <input class="form-control" type="text" name="carica_category"
                                                        placeholder="Categoria">
                                                    <br>
                                                    <p class="card-text">
                                                        <button type="submit" name="btn_carica"
                                                            class="btn btn-success btn-rounded waves-effect waves-light">
                                                            <span class="btn-label"><i class="mdi mdi-check"></i>
                                                            </span>Carica</button>
                                                    </p>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row" id="cancel-row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                            <div class="card">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                            <br>
                                            <h3><i class="fas fa-edit"></i> Modifica/Elimina la categoria dell video
                                            </h3>
                                            <hr>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12 col-md-8">
                                            <table id="zero-config" class="table responsive table-bordered table-hover">
                                                <thead>
                                                    <th>Categorie Video</th>
                                                    <th>Modifica Categoria</th>
                                                    <th>Elimina Categoria</th>
                                                </thead>
                                                <tbody>
                                                    <?php $query_categoria = "SELECT * FROM video_category";
                          $result_categoria = mysqli_query($connection, $query_categoria);
                          while ($row_categoria = mysqli_fetch_array($result_categoria)) {
                          ?>
                                                    <tr>
                                                        <td><?php echo $row_categoria['category_video'] ?></td>
                                                        <td>
                                                            <center><button type="button"
                                                                    class=" btn btn-warning btnModifica "
                                                                    title="Modifica Categoria" data-toggle="modal"
                                                                    data-target="#exampleModal"
                                                                    value="<?php echo $row_categoria['id_category']; ?>"
                                                                    namevalue="<?php echo $row_categoria['category_video']; ?>"><i
                                                                        class="fas fa-edit"></i></button> </center>
                                                        </td>
                                                        <td>
                                                            <form action="video_categorie.php" method="POST">
                                                                <input type="text d-none" hidden name="deleteImp"
                                                                    value="<?php echo $row_categoria['id_category']; ?>"
                                                                    <center><button type="submit" name="deletebtn"
                                                                    class="btn btn-danger btnElimina"
                                                                    title="Elimina Categoria"><i
                                                                        class="fas fa-trash"></i></button> </center>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                            <!-- Modal -->
                                            <form action="video_categorie.php" method="POST">
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modifica
                                                                    Categoria</h5>

                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4 class="modal-heading mb-4 mt-2">
                                                                    <input type="text" name="categoria_nome"
                                                                        class="form-control" id="categoria_nome">
                                                                    <input type="text" name="categoria_id"
                                                                        class="form-control" id="categoria_id" hidden>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="modifyBtn"
                                                                    class="btn btn-primary btn-rounded mb-4 mt-2">Salva
                                                                    modifica</button>
                                                                <button type="button"
                                                                    class="btn btn-dark btn-rounded mb-4 mt-2"
                                                                    data-dismiss="modal">Chiudi</button>
                                                            </div>
                                                        </div>
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
                <!-- Container-fluid starts-->
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <?php include "footer.php"; ?>
        </div>
    </div>
    <?php include "scripts_admin.php"; ?>


    <script>
    $(document).ready(function() {
        // $('#zero-config').DataTable({
        //   "language": {
        //     "paginate": {
        //       "previous": "<i class='flaticon-arrow-left-1'></i>",
        //       "next": "<i class='flaticon-arrow-right'></i>"
        //     },
        //     "info": "Showing page _PAGE_ of _PAGES_"
        //   },
        //   "paging": false,
        //   "ordering": true,
        //   "info": true
        // });

        $('.btnModifica').click(function() {
            $id_tipologia = $(this).val();

            $namevalue_tipologia = $(this).attr('namevalue');
            $('#categoria_nome').val($namevalue_tipologia);
            $('#categoria_id').val($id_tipologia);
        });
    });
    </script>

    <?php

  if (isset($_GET['carica'])) {
    $carica = $_GET['carica'];
    if ($carica == 'true') {
      echo '
    <script type="text/javascript">
    swal("Successo!", "La categoria è stata creata", "success");
    </script>';
    } else if ($carica == 'false') {
      echo '
  <script type="text/javascript">
  swal("Attenzione!", "La categoria non è stata creata", "error");
  </script>';
    }
  }

  $modify = $_GET['modify'];

  if ($modify == 'true') {
    echo '
  <script type="text/javascript">
  swal("Successo!", "La categoria è stata modificata", "success");
  </script>';
  } else if ($modify == 'false') {
    echo '
<script type="text/javascript">
swal("Attenzione!", "La categoria non è stata modificata", "error");
</script>';
  }

  $delete = $_GET['delete'];
  if ($delete == 'true') {
    echo '
<script type="text/javascript">
swal("Successo!", "La categoria è stata eliminata", "success");
</script>';
  } else if ($delete == 'false') {
    echo '
<script type="text/javascript">
swal("Attenzione!", "La categoria non è stata eliminata", "error");
</script>';
  }
  ?>
</body>

</html>