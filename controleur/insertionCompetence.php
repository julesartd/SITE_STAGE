<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bac.php";
    

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtLibelle'],$_POST['txtIntitule'],$_POST['txtBac'])) {
       
            insertCompetence($_POST['txtLibelle'],$_POST['txtIntitule'],$_POST['txtBac']);
        }
        else {
            echo "Erreur";
        }
    }
    $listeBac = getBac();
    $listeCompetence = getCompetenceChapeau();

   
  
    include "vue/vueCompetence.php";


    

    ?>

    
</div>
