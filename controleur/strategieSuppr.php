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


    if (isset($_POST['classe'])) {
        $test = "vrai";
        $classe =  $_POST["classe"];
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
            supprAttribuerActivite($id);
            supprActivite($id);
            header("Location:index.php?action=strategieSuppr&classe=$classe");
        }
        $listeClasse = getClasse();
        include "vue/vueStrategieSuppr.php";
        if (isset($_POST['classe'])|| isset($_GET['classe'])) {
            $listeActivite = getAttribuerActiviteByClasse($classe);
            include "vue/vueTableauStrategieSuppr.php";
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