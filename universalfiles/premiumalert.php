<?php if (!$userId) {
        echo '<script language="javascript">
        $(document).ready(function(){
             $(".premium-div").on("click", function() {
                 $("#exampleModal").modal("show");
             });
        })
        </script>';
    } else {
        echo '<script language="javascript">
        $(document).ready(function(){
             $(".premium-div").on("click", function() {
                swal("Attenzione", "Non puoi riprodurre questo video. È necessario acquistarlo!","warning");
             });
        })
        </script>';
    }  ?>