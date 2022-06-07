<div>
    <?php


    include_once "modele/bd_activite.php";


    if(isset($_POST['btnAjoutActivite'])){
        insertActivite($_POST['nomActivite'], $_POST['competence'],$_SESSION['idProfesseur']);
        
        header("Location:index.php?action=activite");
    }


    include "vue/vueActivite.php";
    
    ?>

    
</div>