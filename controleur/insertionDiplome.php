<div>
    <?php

    include "modele/bd_diplome.php";
    include "modele/bd_competence.php";

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtNomDiplome'])){
            insertDiplome($_POST['txtNomDiplome']);
        } 
    }

    if(isset($_GET["idSuppr"])){
        $idDiplome = $_GET["idSuppr"];
        $diplomeSuppr = getCompetenceChapeauByDiplome($idDiplome);
        foreach($diplomeSuppr as $supprimer){
            supprSousCompetenceByCompetence($supprimer['idCompetence']);
        }
        supprCompetenceByDiplome($idDiplome);
        supprDiplome($idDiplome);
    }

    $tableauDiplome = getDiplome();

    include "vue/vueDiplome.php"
    ?>
</div>