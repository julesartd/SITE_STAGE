<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";

  



    if (isset($_POST['btnAjoutCompetence']) && isset($_GET['id'])) {
        $idDiplome = $_GET['id'];
        if (isset($_POST['txtLibelle'], $_POST['txtIntitule'])) {


            insertCompetence($_POST['txtLibelle'], $_POST['txtIntitule'], $idDiplome);
            header("Location:index.php?action=competence&id=$idDiplome");
        }
    }
    if (isset($_GET['idSuppr'])) {
        supprSousCompetenceByCompetence($_GET['idSuppr']);
        supprCompetence($_GET['idSuppr']);
        header("Location:index.php?action=competence&id=$idDiplome");
    }

    if (isset($_SESSION['mailUtilisateur'])) {
        if ($_SESSION["idDroitUtilisateur"] == 1 || $_SESSION["idDroitUtilisateur"] == 2|| $_SESSION["idDroitUtilisateur"] == 3) {

            $idDiplome = $_GET['id'];
            $listeDiplome = getDiplome();
            $listeCompetence = getCompetenceChapeauBydiplome($_GET['id']);
            include "vue/vueCompetence.php";
        }
    } else {
        header("Location:/?action=connexion&login=non");
    }








    ?>


</div>