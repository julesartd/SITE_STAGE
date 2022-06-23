<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";

    if (isset($_SESSION['mailUtilisateur'])) {

        $idDiplome = $_GET['id'];
        $listeDiplome = getDiplome();
        $listeCompetence = getCompetenceChapeauBydiplome($_GET['id']);
    }else {
        header("Location:/?action=connexion&login=non");
    }




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




    include "vue/vueCompetence.php";




    ?>


</div>