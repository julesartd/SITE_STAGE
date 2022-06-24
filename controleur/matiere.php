<div>
    <?php

    include "modele/bd_matiere.php";
    include "modele/bd_competence.php";


    if (isset($_SESSION['mailUtilisateur'])) {


        if (isset($_POST['btnAjoutMat'])) {
            if (isset($_POST['txtNomMatiere'])) {
                insertMatiere($_POST['txtNomMatiere']);
            }
        }

        if (isset($_GET["idSuppr"])) {
            $idMatiere = $_GET["idSuppr"];
            supprCompetenceByMatiere($idMatiere);
            supprMatiere($idMatiere);
        }


        if ($_SESSION["idDroitUtilisateur"] == 1) {
            $tableauMatiere = getMatiere();
            include "vue/vueMatiere.Admin.php";
        } 
        if ($_SESSION["idDroitUtilisateur"] == 2) {
            echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
            Veuillez vous connecter en administrateur pour accéder à cette page
          </div>";
        }
        if ($_SESSION["idDroitUtilisateur"] == 3) {
            $tableauMatiere = getMatiereByProf($_SESSION["idProfesseur"]);
            include "vue/vueMatiere.Prof.php";
        }
    } else {
        header("Location:/?action=connexion&login=non");
    }
    ?>
</div>