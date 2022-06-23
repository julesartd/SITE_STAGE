<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_classe.php";

    if (isset($_SESSION['mailUtilisateur'])) {
        $listeProf = getProfByClasse($_GET["id"]);
        $listeEleve = getEleveByClasse($_GET["id"]);
    }else {
        header("Location:/?action=connexion&login=non");
    }
    if ($_SESSION["idDroitUtilisateur"] == 1) {
        include "vue/vueDetailClasse.Admin.php";
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        include "vue/vueDetailClasse.Prof.php";
    }


    ?>

</div>