<div>
    <?php

    include "modele/bd_diplome.php";

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtNomDiplome'])){
            insertDiplome($_POST['txtNomDiplome']);
        } 
    }

    if(isset($_GET["idSuppr"])){
        $idDiplome = $_GET["idSuppr"];
        supprCompetenceByDiplome($idDiplome);
        supprDiplome($idDiplome);
    }

    $tableauDiplome = getDiplome();

    include "vue/vueDiplome.php"
    ?>
</div>