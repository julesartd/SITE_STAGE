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

    $listeClasse = getClasse();
    $listeCompetence= getCompetenceChapeau();
    $listeSousCompetence = getSousCompetence();

 
    $listeSemaine = getAttribuerActivite();

  






    if ($_SESSION["idDroitUtilisateur"] == 1) {
      
    }
    if ($_SESSION["idDroitUtilisateur"] == 2) {
    }

    if(isset($_POST['btnAjoutActivite'])){
       
    }

    include "vue/vueStrategie.php"
   
    
    ?>

    
</div>
<div>
<th>oui</th>
<th>oui</th>
<th>oui</th>
<th>oui</th>
<th>oui</th>
<th>oui</th>
<th>oui</th>
<tr>non</tr>
</div>