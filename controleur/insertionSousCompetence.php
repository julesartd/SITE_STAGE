<div>
    <?php

    include_once "modele/bd_competence.php";

    $max = getMaxCompetenceId($_GET['id']);
    $maxSousCompetence = $max['num'];


    $uneCompetenceId = getCompetenceChapeauById($_GET['id']);
    $listeSousCompetence= getSousCompetenceById($_GET['id']);



    if (isset($_POST['btnAjoutSousCompetence'])&& isset($_GET['id'])) {
        if (isset($_POST['txtIntituleSousCompetence'])) {
           
            insertSousCompetence($maxSousCompetence+1 ,$_POST['txtIntituleSousCompetence'], $_GET['id']);
        
        }
      
    }
    
    if (isset($_GET['idSuppr'])) {
        supprSousCompetence($_GET['idSuppr']);
       
    }

   
  
    include "vue/vueSousCompetence.php";
    

    ?>

    
</div>
