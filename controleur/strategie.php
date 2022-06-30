<div>
    <?php


    include_once "modele/bd_activite.php";
    include_once "modele/bd_diplome.php";
    include_once "modele/bd_classe.php";
    include_once "modele/bd_calendrier.php";
    include_once "modele/bd_competence.php";
    include_once "modele/bd_matiere.php";

    if (isset($_SESSION['mailUtilisateur'])) {
        $anneeDt = getAnneeDebut();
        $anneeF = getAnneeFin();
        $annee = $anneeDt['year'].'-'.$anneeF['year'];
        $listeSousCompetence = getSousCompetence();
        $test = "";
    }else{
        header("Location:/?action=connexion&login=non");
    }
    if (isset($_POST['classe'])) {
        $test = "vrai";
        $classe =  $_POST["classe"];
        $classeDeListe = getClasseById($classe);
    }





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
        if(isset($_POST['suppr'])){
            include "vue/vueStrategieSuppr.php";
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
    if ($_SESSION["idDroitUtilisateur"] == 3) {
        $listeClasse = getClasseByIdProf($_SESSION['idProfesseur']);
        include "vue/vueStrategie.ProfGeneral.php";
        if (isset($_POST['classe']) && isset($_POST['matiere'])) {
            $nomMatiere = getNomMatiere($_POST['matiere']);
            $nomMatiere = $nomMatiere['nom'];
            $classe =  $_POST["classe"];
            $matiere = $_POST['matiere'];
            $uneClasseId = getClasseById($classe);
            $listeCompetence = getCompetenceByMatiere($matiere);
            $listeSemaine = getAttribuerActiviteMatiereByClasseAndMatiere($classe, $matiere);

            include "vue/vueTableauStrategieByClasse.ProfGeneral.php";
        }
    }
    

    ?>


</div>