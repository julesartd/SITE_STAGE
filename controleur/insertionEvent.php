<div>
    <?php

    include_once "modele/bd_diplome.php";
    include_once "modele/bd_calendrier.php";
 


    $listeClasse = getClasse();   



    $listeEvent = getEvent();  
    $dateDt = getDateDebut();
    $dateDebut = $dateDt['db_date'];
    $dateF = getDateFin();
    $dateFin = $dateF['db_date'];

 
    $semaine = getWeekByDate($dateDebut,$dateFin);



   

  
  
    $semaineAdd = "";


  

    if (isset($_POST['btnAjoutEvent'])) {
        $semaineAdd = substr($_POST['numero'],-2);
  
        if (isset($_POST['numero'],$_POST['evenement'],$_POST['classe'])) {
         
            if ($semaine <10){
           
                insertEvenement($_POST['evenement'],$_POST['classe'], substr($semaineAdd,-1));
             
            
            }else {
             
                insertEvenement($_POST['evenement'],$_POST['classe'], $semaineAdd);
             
               
            
            }
          
        
        }
      
    }


  
    include "vue/vueEvent.php";
  
    ?>
</div>