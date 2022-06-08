<div>
    <?php


    include_once "modele/bd_classe.php";


    if(isset($_POST['btnAjoutEleve'])){
        insertEleve($_POST['txtNomEleve'], $_POST['txtPrenomEleve']);
        
        header("Location:index.php?action=eleve");
    }


    include "vue/vueEleve.Admin.php";
    
    ?>

    
</div>