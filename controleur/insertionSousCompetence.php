<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bloc.php";
    

    if (isset($_POST['btnAjoutSousCompetence'])) {
        if (isset($_POST['txtLibelle'],$_POST['txtIntitule'],$_POST['txtCompetence'])) {
           
            insertSousCompetence($_POST['txtLibelle'],$_POST['txtIntitule'],$_POST['txtCompetence']);
        }
        else {
            echo "Erreur";
        }
    }
    $listeCompetence = getCompetenceChapeau();


   
  
    include "vue/vueSousCompetence.php";
    

    ?>

    
</div>
