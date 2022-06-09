<div>
    <?php


    include_once "modele/bd_activite.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";



    if ($_SESSION["idDroitUtilisateur"] == 1) {
        $listeDiplome = getDiplome();
        $listeClasse = getClasse();
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($_POST['classe']);
        include "vue/vueActivite.php";
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($_POST['classe']);
        include "vue/vueActivite.php";
    }

    if(isset($_POST['btnAjoutActivite'])){
        insertActivite($_POST['txtNomActivite'], $_POST['competence'],$_SESSION['idProfesseur'],$_POST['classe']);
        
        header("Location:index.php?action=activite");
    }


   
    
    ?>

    
</div>