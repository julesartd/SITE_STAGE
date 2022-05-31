<div>
    <?php

    include_once "modele/bd_diplome.php";
    include_once "modele/bd_calendrier.php";
 
    $listeClasse = getClasse();   
    $listeEvent = getEvent();   

    if (isset($_POST['btnAjoutEvent'])) {
        $semaine = substr($_POST['numero'],-2);
  
        if (isset($_POST['numero'],$_POST['evenement'],$_POST['classe'])) {
         
            if ($semaine <10){
                print_r(substr($semaine,-1));
                insertEvenement($_POST['evenement'],$_POST['classe'], substr($semaine,-1));
            
            }else {
                print_r($semaine);
                insertEvenement($_POST['evenement'],$_POST['classe'], $semaine);
            
            }
          
        
        }
      
    }


  
    include "vue/vueEvent.php";
  
    ?>
</div>