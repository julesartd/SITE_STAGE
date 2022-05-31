<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bac.php";


    $listeBac = getBac();

    if(isset($_POST['btnAjoutClasse'])){
        insertClasse($_POST['txtNiveaux'], $_POST['bac']);
    }

    include "vue/vueClasse.php";

    ?>

    
</div>
