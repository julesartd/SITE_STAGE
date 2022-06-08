<div>
    <?php


    include_once "modele/bd_classe.php";


    if(isset($_POST['btnAjoutProf'])){
        insertProf($_POST['txtNomProf'], $_POST['txtPrenomProf']);
        
        header("Location:index.php?action=prof");
    }


    include "vue/vueProf.Admin.php";
    
    ?>

    
</div>