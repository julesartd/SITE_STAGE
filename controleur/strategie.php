<div>
    <?php


    include_once "modele/bd_activite.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";
    include_once "modele/bd_calendrier.php";
    include_once "modele/bd_competence.php";


    $dateDt = getDateDebut();
    $dateDebut = $dateDt['db_date'];
    $dateF = getDateFin();
    $dateFin = $dateF['db_date'];



    $listeSousCompetence = getSousCompetence();




    $uneClasseId = getClasseByIdProf($_SESSION['idProfesseur']);







    if ($_SESSION["idDroitUtilisateur"] == 1) {
        $listeClasse = getClasse();
        include "vue/vueStrategie.php";
        if (isset($_POST['classe'])) {
            
            $classe =  $_POST["classe"];
            
            $uneClasseId = getClasseById($classe);
            $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($classe);
            $listeSemaine = getAttribuerActiviteByClasse($classe);

            include "vue/vueTableauStrategieByClasse.php";
        }
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
        $listeClasse = getClasseByIdProf($_SESSION['idProfesseur']);
        include "vue/vueStrategie.php";
        if (isset($_POST['classe'])) {
          

            $classe =  $_POST["classe"];
            $uneClasseId = getClasseById($classe);
            $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($classe);
            $listeSemaine = getAttribuerActiviteByClasse($classe);

            include "vue/vueTableauStrategieByClasse.php";
        }
    }

    if (isset($_POST['btnAjoutActivite'])) {
    }


    ?>


</div>