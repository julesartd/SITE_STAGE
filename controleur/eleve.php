<div>
    <?php


    include_once "modele/bd_classe.php";

    if(isset($_SESSION['mailUtilisateur'])){
        if ($_SESSION['idDroitUtilisateur']==1){
            include "vue/vueEleve.Admin.php";
            if(isset($_POST['btnAjoutEleve'])){
                insertEleve($_POST['txtNomEleve'], $_POST['txtPrenomEleve']);
                
                header("Location:index.php?action=eleve");
                
            }
        }else {
            echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
        Vous n'avez pas l'autorisation d'accèder à cette page
      </div>";
        }
      
    }else {
        header("Location:/?action=connexion&login=non");
    }
    


    
    ?>

    
</div>