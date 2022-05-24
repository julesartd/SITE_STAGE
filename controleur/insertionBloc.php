<div>
    <?php

    include "modele/bd_competence.php";

  

    // if (empty($_SESSION['mailU']) || empty($_SESSION['mdpU'])) {
    //     header("Location:/?action=");
    // }

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtIDBLOC'], $_POST['txtNomBloc'], $_POST['txtIDBAC'])) {

            insertCompetence($_POST['txtIDBLOC'], $_POST['txtNomBloc'], $_POST['txtIDBAC']);
        } 
    }
    $listeBac = getBac();
    print_r($listeBac);

    echo($_POST['txtIDBLOC']);
    echo($_POST['txtNomBloc']);
    echo($_POST['txtIDBAC']);
  
    
    
    include "vue/vueBloc.php"
    ?>
</div>