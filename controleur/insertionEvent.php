<div>
    <?php

    include "modele/bd_bac.php";

    $unBac = getBacByClasse($_POST['classe']);
    $listeClasse = getClasse();
    print_r($_POST['classe']);
    include "vue/vueEvent.php";
  
    ?>
</div>