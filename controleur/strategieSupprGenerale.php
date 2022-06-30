<div>
    <?php


    include_once "modele/bd_activite.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";
    include_once "modele/bd_calendrier.php";
    include_once "modele/bd_competence.php";
    include_once "modele/bd_matiere.php";

    if (isset($_SESSION['mailUtilisateur'])) {
    }else{
        header("Location:/?action=connexion&login=non");
    }


    if (isset($_POST['classe']) && isset($_POST['matiere'])) {
        $test = "vrai";
        $classe =  $_POST["classe"];
        $matiere = $_POST['matiere'];
        $classeDeListe = getClasseById($classe);
    }
    if (isset($_GET['classe'])) {
        $test = "vrai";
        $classe =  $_GET["classe"];
        $classeDeListe = getClasseById($classe);
    }
    if ($_SESSION["idDroitUtilisateur"] == 1) {

        if(isset($_GET['idActiviteSuppr'])){
            
            $id = $_GET['idActiviteSuppr'];
            supprAttribuerActiviteMatiere($id);
            supprActivite($id);
            header("Location:index.php?action=strategieSupprGenerale&classe=$classe");
        }
        $listeClasse = getClasse();
        include "vue/vueStrategieSupprGenerale.php";
        if (isset($_POST['classe']) && isset($_POST['matiere'])) {
            $listeActivite = getAttribuerActiviteMatiereByClasse($classe);
            include "vue/vueTableauStrategieSupprGenerale.php";
        }
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        header("Location:index.php?action=strategie");
    }
    if ($_SESSION["idDroitUtilisateur"] == 3) {
        header("Location:index.php?action=strategie");
    }
    

    ?>


</div>