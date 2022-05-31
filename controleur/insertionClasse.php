<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_diplome.php";


    $listeDiplome = getDiplome();
    $listeClasse = getClasse();

    if(isset($_POST['btnAjoutClasse'])){
        insertClasse($_POST['txtNiveaux'], $_POST['diplome']);
    }

    include "vue/vueClasse.php";

    ?>

    
</div>
