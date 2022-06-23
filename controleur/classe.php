<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";
    if (isset($_SESSION['mailUtilisateur'])) {
        if ($_SESSION["idDroitUtilisateur"] == 1) {

            $listeDiplome = getDiplome();
            $listeClasse = getClasse();
            include "vue/vueClasse.Admin.php";
        } 
        if ($_SESSION["idDroitUtilisateur"] == 2) {
            $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
            include "vue/vueClasse.Prof.php";
        } 
    }else {
        header("Location:/?action=connexion&login=non");
    }


    if (isset($_POST['btnAjoutClasse'])) {
        insertClasse($_POST['NiveauxClasse'], $_POST['diplome']);
        header("Location:index.php?action=classe");
    }

    if (isset($_GET['idSuppr'])) {
        $idClasse = $_GET['idSuppr'];
        deleteProfFromClasse($idClasse);
        supprClasse($idClasse);
        header("location:" .  $_SERVER['HTTP_REFERER']);
    }
    ?>


</div>