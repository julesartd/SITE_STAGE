<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";

    $listeDiplome = getDiplome();
if($_SESSION["idDroitUtilisateur"] == 1)
{
    $listeClasse = getClasse();
}
if($_SESSION["idDroitUtilisateur"] == 2)
{
    $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
}
    if(isset($_POST['btnAjoutClasse'])){
        insertClasse($_POST['NiveauxClasse'], $_POST['diplome']);
        
        header("Location:index.php?action=classe");
    }

    if (isset($_GET['idSuppr'])) {
        supprClasse($_GET['idSuppr']);
        header("Location:index.php?action=classe");
        
    }

    include "vue/vueClasse.php";

    ?>

    
</div>
