<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bac.php";
    
    $idBac = $_GET['id'];
    $listeBac = getBac();
    $listeCompetence= getCompetenceChapeauByBac($_GET['id']);

    if (isset($_POST['btnAjoutCompetence']) && isset($_GET['id'])) {
        $idBac = $_GET['id'];
        if (isset($_POST['txtLibelle'],$_POST['txtIntitule'])) {
          
       
            insertCompetence($_POST['txtLibelle'],$_POST['txtIntitule'], $idBac);
            header("Location:index.php?action=competence&id=$idBac");
        }
      
    }
    if (isset($_GET['idSuppr'])) {
     
        supprCompetence($_GET['idSuppr']);
        header("Location:index.php?action=competence&id=$idBac");
        
    }


   
  
    include "vue/vueCompetence.php";


    

    ?>

    
</div>
