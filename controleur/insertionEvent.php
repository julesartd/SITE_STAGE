<div>
    <?php

    include_once "modele/bd_diplome.php";
    include_once "modele/bd_calendrier.php";
 
    $listeClasse = getClasse();   
    $listeEvent = getEvent();   

    if (isset($_POST['btnAjoutEvent'])) {
  
        if (isset($_POST['numero'],$_POST['evenement'],$_POST['classe'])) {
           
            print_r($_POST['numero']);
            //insertEvenement($_POST['evenement'],$_POST['classe'],$_POST['numero']);
            
        
        }
      
    }


  
    include "vue/vueEvent.php";
  
    ?>
</div>