<div>
    <?php
    include_once "modele/bd_competence.php";
    include_once "modele/bd_classe.php";
    include_once "modele/bd_activite.php";

    if (isset($_SESSION['mailUtilisateur'])) {

        $listeSousCompetence = getSousCompetence();

        $classe =  $_GET["id"];

        $uneClasseId = getClasseById($classe);
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($classe);
        include "vue/vueStrategieCompteCompetence.php";
    }else{
        header("Location:/?action=connexion&login=non");
    }

 

    ?>


</div>