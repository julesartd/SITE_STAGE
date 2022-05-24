<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_bloc.php";
    

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtIDBLOC'],$_POST['txtNomCompetence'])) {
           
            
            
            //insertCompetence($_POST['txtIDBLOC'],$_POST['txtNomCompetence']);
        } 
    }
    $listeBloc = getBloc();


   
  
    include "vue/vueCompetence.php";
    

    ?>

    
</div>
