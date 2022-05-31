<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bac.php";


    $listeBac = getBac();
    $listeClasse = getClasse();

    if(isset($_POST['btnAjoutClasse'])){
        insertClasse($_POST['Niveaux'], $_POST['bac'], $_POST['txtNom']);
    }

    include "vue/vueClasse.php";

    ?>

    
</div>
