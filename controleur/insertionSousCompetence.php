<div>
    <?php

    include_once "modele/bd_competence.php";

    $max = getMaxCompetenceId($_GET['id']);
    $maxSousCompetence = $max['num'];



    $listeSousCompetence= getSousCompetenceById($_GET['id']);



    if (isset($_POST['btnAjoutSousCompetence'])) {
        if (isset($_POST['txtIntituleSousCompetence'])) {
           
            insertSousCompetence($maxSousCompetence+1 ,$_POST['txtIntituleSousCompetence'], $_GET['id']);
            echo "Ajout effectué";
        }
      
    }
    


   
  
    include "vue/vueSousCompetence.php";
    

    ?>

    
</div>
