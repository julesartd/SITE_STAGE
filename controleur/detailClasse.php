<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";

    if ($_SESSION["idDroitUtilisateur"] == 1) {
        $listeDiplome = getDiplome();
        $listeClasse = getClasse();
        include "vue/vueDetailClasse.Admin.php";
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
        include "vue/vueDetailClasse.Prof.php";
    }


    ?>


</div>