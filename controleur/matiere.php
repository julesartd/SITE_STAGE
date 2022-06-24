<div>
    <?php

    include "modele/bd_matiere.php";
    include "modele/bd_competence.php";


    if (isset($_SESSION['mailUtilisateur'])) {


        if (isset($_POST['btnAjout'])) {
            if (isset($_POST['txtNomDiplome'])) {
                insertDiplome($_POST['txtNomDiplome']);
            }
        }

        if (isset($_GET["idSuppr"])) {
            $idDiplome = $_GET["idSuppr"];
            $diplomeSuppr = getCompetenceChapeauByDiplome($idDiplome);
            foreach ($diplomeSuppr as $supprimer) {
                supprSousCompetenceByCompetence($supprimer['idCompetence']);
            }
            supprCompetenceByDiplome($idDiplome);
            supprDiplome($idDiplome);
        }


        if ($_SESSION["idDroitUtilisateur"] == 1) {
            $tableauDiplome = getMatiere();
            include "vue/vueMatiere.Admin.php";
        } 
        if ($_SESSION["idDroitUtilisateur"] == 2) {
            echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
            Veuillez vous connecter en administrateur pour accéder à cette page
          </div>";
        }
        if ($_SESSION["idDroitUtilisateur"] == 3) {
            include "vue/vueMatiere.Prof.php";
        }
    } else {
        header("Location:/?action=connexion&login=non");
    }
    ?>
</div>