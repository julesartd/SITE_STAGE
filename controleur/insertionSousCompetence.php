<div>
    <?php

    include_once "modele/bd_competence.php";

    $max = getMaxSousCompetenceId($_GET['id']);

  
    $maxSousCompetence = $max['num'];

    $idComp = $_GET['id'];

    $uneCompetenceId = getCompetenceChapeauById($idComp);
    $listeSousCompetence= getSousCompetenceById($idComp);

  


    if (isset($_POST['btnAjoutSousCompetence'])&& isset($_GET['id'])) {
        if (isset($_POST['txtIntituleSousCompetence'])) {
           
            insertSousCompetence($maxSousCompetence+1 ,$_POST['txtIntituleSousCompetence'], $idComp);
            header("Location:index.php?action=sousCompetence&id=$idComp");
        
        }
      
    }
    
    if (isset($_GET['idSuppr'])) {
        try {
            supprSousCompetence($_GET['idSuppr']);
            header("Location:index.php?action=sousCompetence&id=$idComp");
        } catch (Exception $e) {
            echo "Cette sous-compétence est attribué à une activité, veuillez supprimer l'activité en premier :";
       
        }
        
    }

   
  
    include "vue/vueSousCompetence.php";
    

    ?>

    
</div>
