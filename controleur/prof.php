<div>
    <?php


    include_once "modele/bd_classe.php";
    include_once "modele/bd_utilisateur.inc.php";
    include_once "modele/bd_calendrier.php";
    include_once "modele/bd_matiere.php";



    if (isset($_POST['btnAjoutProf'])) {

        $nom = $_POST['txtNomProf'];
        $prenom = $_POST['txtPrenomProf'];
        $naissance = $_POST['txtNaissProf'];
        $droit = $_POST['selectDroit'];

        $naissanceFR = dateEN2FR($naissance);
        $mdpDateNaissance  = str_replace('-', '', $naissanceFR);


        $mail = strtolower(str_to_noaccent($nom) . '.' . str_to_noaccent($prenom));

        insertProf($nom, $prenom, $naissance);
        $lastProfAdd = getLastProf();

        insertUtilisateur($mail, password_hash($mdpDateNaissance, PASSWORD_DEFAULT), $droit, $lastProfAdd['num']);
        header("Location:index.php?action=prof");
    }

    if (isset($_POST['btnAttribuer'])) {
        $droit = getDroitUtilisateur($_POST['prof']);
        $droit = $droit['idDroitUtilisateur'];
        if ($droit == 3) {
            attribuerProfMatiere($_POST['classe'], $_POST['prof'], $_POST['matiere']);
            attribuerProf($_POST['classe'], $_POST['prof']);
        } else {
            attribuerProf($_POST['classe'], $_POST['prof']);
        }
    }

    if (isset($_GET['id'])) {
        $date = getProfById($_GET['id']);
        $naissanceFR = dateEN2FR($date['dateNaissance']);
        $mdpDateNaissance  = str_replace('-', '', $naissanceFR);
        $reset = resetPassword(password_hash($mdpDateNaissance, PASSWORD_DEFAULT), $_GET['id']);
    }

    if (isset($_GET['idSuppr'])) {
        $id = ($_GET['idSuppr']);
        desatribuerProfFromClasseMatiere($id);
        desatribuerProfFromClasse($id);
        deleteUtilisateur($id);
        supprProf($id);
    }


    if (isset($_SESSION['mailUtilisateur']) && isset($_SESSION['mdpUtilisateur'])) {
        if ($_SESSION["idDroitUtilisateur"] == 1) {
            $listeProf = getProf();
            $listeClasse = getClasse();
            $listeDroit = getDroit();

            include "vue/vueProf.php";
        } else {
            echo " <div id='msgErr' class='alert alert-danger mx-auto' role='alert'>
            Veuillez vous connecter en administrateur pour accéder à cette page
          </div>";
        }
    } else {
        header("Location:/?action=connexion&login=non");
    }




    ?>


</div>