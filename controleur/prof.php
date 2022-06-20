<div>
    <?php


    include_once "modele/bd_classe.php";
    include_once "modele/bd_utilisateur.inc.php";
    include_once "modele/bd_calendrier.php";

    $listeProf = getProf();
    $listeClasse = getClasse();

    if (isset($_POST['btnAjoutProf'])) {
        $nom = $_POST['txtNomProf'];
        $prenom = $_POST['txtPrenomProf'];
        $naissance = $_POST['txtNaissProf'];

        $naissanceFR = dateEN2FR($naissance);
        $mdpDateNaissance  = str_replace('-', '', $naissanceFR);

        $mail =  strtolower($nom . '.' . $prenom);
       
        insertProf($nom, $prenom, $naissance);
        $lastProfAdd = getLastProf();
        insertUtilisateur($mail, password_hash($mdpDateNaissance, PASSWORD_DEFAULT), 2, $lastProfAdd['num']);


        
    }

    if (isset($_POST['btnAttribuer'])) {
     
      
        attribuerProf($_POST['classe'],$_POST['prof']);
     
    }


    include "vue/vueProf.Admin.php";

    ?>


</div>