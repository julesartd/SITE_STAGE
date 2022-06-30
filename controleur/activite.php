<?php


include_once "modele/bd_activite.php";
include_once "modele/bd_diplome.php";
include_once "modele/bd_classe.php";
include_once "modele/bd_competence.php";
include_once "modele/bd_calendrier.php";
include_once "modele/bd_matiere.php";




if (isset($_SESSION["mailUtilisateur"])) {

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
        $listeProf = getProfPro();

        if (isset($_POST['btnValider'])) {
            $semaineDeb = substr($_POST['numeroSemaineDebut'], -2);
            $semaineFin = substr($_POST['numeroSemaineFin'], -2);
            if ($semaine < 10) {
                $semaineDeb = substr($semaineDeb, -1);
                $semaineFin = substr($semaineFin, -1);
            }

            insertActivite($_POST['txtNomActivite'], $_POST['professeur'], $_POST['niveauClasse']);
            $recupId = getLastActivite();
            $id = $recupId['num'];
            if (!empty($_POST['sous_Competence1'])) {
                attribuerActivite($id, $_POST['sous_Competence1'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence2'])) {
                attribuerActivite($id, $_POST['sous_Competence2'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence3'])) {
                attribuerActivite($id, $_POST['sous_Competence3'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence4'])) {
                attribuerActivite($id, $_POST['sous_Competence4'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence5'])) {
                attribuerActivite($id, $_POST['sous_Competence5'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence6'])) {
                attribuerActivite($id, $_POST['sous_Competence6'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence7'])) {
                attribuerActivite($id, $_POST['sous_Competence7'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence8'])) {
                attribuerActivite($id, $_POST['sous_Competence8'], $semaineDeb, $semaineFin);
            }
        }

        include "vue/vueActivite.Admin.php";
    }

    if ($_SESSION["idDroitUtilisateur"] == 2) {

        $listeDiplome = getDiplome();
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);
        if (isset($_POST['btnValider'])) {
            $semaineDeb = substr($_POST['numeroSemaineDebut'], -2);
            $semaineFin = substr($_POST['numeroSemaineFin'], -2);
            if ($semaine < 10) {
                $semaineDeb = substr($semaineDeb, -1);
                $semaineFin = substr($semaineFin, -1);
            }
            insertActivite($_POST['txtNomActivite'], $_SESSION['idProfesseur'], $_POST['niveauClasse']);
            $recupId = getLastActivite();
            $id = $recupId['num'];
            if (!empty($_POST['sous_Competence1'])) {

                attribuerActivite($id, $_POST['sous_Competence1'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence2'])) {
                attribuerActivite($id, $_POST['sous_Competence2'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence3'])) {
                attribuerActivite($id, $_POST['sous_Competence3'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence4'])) {
                attribuerActivite($id, $_POST['sous_Competence4'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence5'])) {
                attribuerActivite($id, $_POST['sous_Competence5'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence6'])) {
                attribuerActivite($id, $_POST['sous_Competence6'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence7'])) {
                attribuerActivite($id, $_POST['sous_Competence7'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['sous_Competence8'])) {
                attribuerActivite($id, $_POST['sous_Competence8'], $semaineDeb, $semaineFin);
            }
        }
        include "vue/vueActivite.Prof.php";
    }
    if ($_SESSION["idDroitUtilisateur"] == 3) {
        $listeClasse = getClasseByIdProf($_SESSION["idProfesseur"]);

        if (isset($_POST['btnValider'])) {
            $semaineDeb = substr($_POST['numeroSemaineDebut'], -2);
            $semaineFin = substr($_POST['numeroSemaineFin'], -2);
            if ($semaine < 10) {
                $semaineDeb = substr($semaineDeb, -1);
                $semaineFin = substr($semaineFin, -1);
            }
            insertActivite($_POST['txtNomActivite'], $_SESSION['idProfesseur'], $_POST['niveauClasse']);
            $recupId = getLastActivite();
            $id = $recupId['num'];
            if (!empty($_POST['competence1'])) {
                attribuerActiviteMatiere($id, $_POST['competence1'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['competence2'])) {
                attribuerActiviteMatiere($id, $_POST['competence2'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['competence3'])) {
                attribuerActiviteMatiere($id, $_POST['competence3'], $semaineDeb, $semaineFin);
            }
            if (!empty($_POST['competence4'])) {
                attribuerActiviteMatiere($id, $_POST['competence4'], $semaineDeb, $semaineFin);
            }
        }
        include "vue/vueActivite.ProfGeneral.php";
    }
} else {
    header("Location:/?action=connexion&login=non");
}
