<div>
    <?php


    include_once "modele/bd_activite.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";
    include_once "modele/bd_competence.php";
    include_once "modele/bd_calendrier.php";

    $dateDt = getDateDebut();
    $dateDebut = $dateDt['db_date'];
    $dateF = getDateFin();
    $dateFin = $dateF['db_date'];

    $calendrierDebut = getMinYearAndWeek();
    $calendrierFin = getMaxYearAndWeek();

    $yearFin = $calendrierFin['year'];
    $weekFin = $calendrierFin['week'];

    $yearDebut = $calendrierDebut['year'];
    $weekDebut = $calendrierDebut['week'];



    if ($weekFin < 10) {
        $maxCalendrier = $yearFin . '-W0' . $weekFin;
    } else {
        $maxCalendrier = $yearFin . '-W' . $weekFin;
    }


    if ($weekDebut < 10) {
        $minCalendrier = $yearDebut . '-W0' . $weekDebut;
    } else {
        $minCalendrier = $yearDebut . '-W' . $weekDebut;
    }



    $semaine = getWeekByDate($dateDebut, $dateFin);



    if ($_SESSION["idDroitUtilisateur"] == 1) {

        $listeDiplome = getDiplome();
        $listeClasse = getClasse();
        $listeProf = getProf();
        if (isset($_POST['btnAjoutActivite'])) {
            print_r( $_POST['SelectCompetence']);
            insertActivite($_POST['txtNomActivite'], $_POST['selectCompetence'], $_POST['professeur'], $_POST['selectClasse']);
            if(isset($_POST['btnValider'])){
                echo $_POST['competence1'],$_POST['competence2'],$_POST['competence3'],$_POST['competence4'];

            }


        }
        include "vue/vueActivite.Admin.php";
    }else {
        header("Location:/?action=connexion&login=non");
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        
        $listeDiplome = getDiplome();
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
        if (isset($_POST['btnAjoutActivite'])) {
            insertActivite($_POST['txtNomActivite'], $_POST['SelectCompetence'], $_SESSION['idProfesseur'], $_POST['selectClasse']);


        }
        include "vue/vueActivite.Prof.php";
    }else {
        header("Location:/?action=connexion&login=non");
    }
    ?>


</div>