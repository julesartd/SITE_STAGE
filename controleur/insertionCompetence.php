<div>
    <?php

    include "modele/bd_competence.php";
    include "modele/bd_bloc.php";
    

    if (isset($_POST['btnAjout'])) {
        if (isset($_POST['txtIDBLOC'],$_POST['txtNomCompetence'])) {
            $id=0;
            $id = getMaxCompetence();
            insertCompetence($id+1, $_POST['txtIDBLOC'],$_POST['txtNomCompetence']);
        } 
    }
    $listeBloc = getBloc();


   
  
    include "vue/vueCompetence.php";
    

    ?>

    
</div>