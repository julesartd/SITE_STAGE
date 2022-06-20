<div>
    <?php


    include_once "modele/bd_classe.php";
    include_once "modele/bd_utilisateur.inc.php";

   
    if(isset($_POST['btnAjoutProf'])){
        $nom = $_POST['txtNomProf'];
        $prenom = $_POST['txtPrenomProf'];
        $mail =  strtolower($nom.' '.$prenom);
        print_r($nom); 
     
       // insertProf($_POST['txtNomProf'], $_POST['txtPrenomProf']);
   
        
        header("Location:index.php?action=prof");
    }


    include "vue/vueProf.Admin.php";
    
    ?>

    
</div>