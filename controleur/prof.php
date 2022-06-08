<div>
    <?php


    include_once "modele/bd_activite.php";


    if(isset($_POST['btnAjoutProf'])){
        insertProf($_POST['nomProf'], $_POST['prenomProf']);
        
        header("Location:index.php?action=activite");
    }


    include "vue/vueProf.Admin.php";
    
    ?>

    
</div>