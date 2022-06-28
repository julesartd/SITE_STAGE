<div>
    <?php

    include_once "modele/bd_matiere.php";

    if (isset($_SESSION['mailUtilisateur'])) {

        $idMatiere = $_GET['id'];
        $listeMatiere = getMatiere();
        $listeCompetenceMatiere = getCompetenceChapeauByMatiere($_GET['id']);
    } else {
        header("Location:/?action=connexion&login=non");
    }




    if (isset($_POST['btnAjoutCompetence']) && isset($_GET['id'])) {
        
        if (isset($_POST['txtLibelle'], $_POST['txtIntitule'])) {


            insertCompetenceMatiere($_POST['txtLibelle'], $_POST['txtIntitule'], $idMatiere);
            header("Location:index.php?action=competenceMatiere&id=$idMatiere");
        }
    }
    if (isset($_GET['idSuppr'])) {
        supprCompetenceMatiere($_GET['idSuppr']);
        header("Location:index.php?action=competenceMatiere&id=$idMatiere");
    }




    include "vue/vueCompetenceMatiere.php";




    ?>


</div>