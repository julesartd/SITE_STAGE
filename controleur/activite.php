<div>
    <?php


    include_once "modele/bd_activite.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";
    include_once "modele/bd_competence.php";


    if ($_SESSION["idDroitUtilisateur"] == 1) {

        $listeDiplome = getDiplome();
        $listeClasse = getClasse();
        $listeProf = getProf();
        if (isset($_POST['btnAjoutActivite'])) {
            print_r( $_POST['SelectCompetence']);
            insertActivite($_POST['txtNomActivite'], $_POST['selectCompetence'], $_POST['professeur'], $_POST['selectClasse']);

            header("Location:index.php?action=activite");
        }
        include "vue/vueActivite.Admin.php";
    }else {
        header("Location:/?action=connexion&login=non");
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        
        $listeDiplome = getDiplome();
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
        if (isset($_POST['btnAjoutActivite'])) {
            insertActivite($_POST['txtNomActivite'], $_POST['SelectCompetence'], $_SESSION['idProfesseur'], $_POST['selectClasse']);

            header("Location:index.php?action=activite");
        }
        include "vue/vueActivite.Prof.php";
    }else {
        header("Location:/?action=connexion&login=non");
    }
    ?>


</div>