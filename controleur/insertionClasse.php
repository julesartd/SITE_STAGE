<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";


    $listeDiplome = getDiplome();
    $listeClasse = getClasse();

    if(isset($_POST['btnAjoutClasse'])){
        insertClasse($_POST['NiveauxClasse'], $_POST['diplome'],$_POST['txtNom']);
        
        header("Location:index.php?action=classe");
    }

    if (isset($_GET['idSuppr'])) {
        supprClasse($_GET['idSuppr']);
        header("Location:index.php?action=classe");
        
    }

    include "vue/vueClasse.php";

    ?>

    
</div>
