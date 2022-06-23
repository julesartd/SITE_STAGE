<div>
    <?php


    include_once "modele/bd_classe.php";

    if(isset($_SESSION['mailUtilisateur'])){
        include "vue/vueEleve.Admin.php";
        if(isset($_POST['btnAjoutEleve'])){
            insertEleve($_POST['txtNomEleve'], $_POST['txtPrenomEleve']);
            
            header("Location:index.php?action=eleve");
            
        }
    }else {
        header("Location:/?action=connexion&login=non");
    }
    


    
    ?>

    
</div>