<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bac.php";
    
    $idBac = $_GET['id'];

    print_r($idBac);

    if (isset($_POST['btnAjoutCompetence']) && isset($_GET['id'])) {
        $idBac = $_GET['id'];
        if (isset($_POST['txtLibelle'],$_POST['txtIntitule'])) {
          
       
            insertCompetence($_POST['txtLibelle'],$_POST['txtIntitule'], $idBac);
        }
      
    }
    $listeBac = getBac();
    $listeCompetence= getCompetenceChapeauByBac($_GET['id']);

   
  
    include "vue/vueCompetence.php";


    

    ?>

    
</div>
