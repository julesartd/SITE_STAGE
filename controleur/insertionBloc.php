<div>
    <?php

    include "modele/bd_bloc.php";

    

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtIDBLOC'], $_POST['txtNomBloc'], $_POST['txtIDBAC'])) {

            insertCompetenceChapeau($_POST['txtIDBLOC'], $_POST['txtNomBloc'], $_POST['txtIDBAC']);
        } 
    }
    $listeBac = getBac();
   
  
    include "vue/vueBloc.php";
    

    ?>
</div>