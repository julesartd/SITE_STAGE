<div>
    <?php

    include_once "modele/bd_competence.php";
    include_once "modele/bd_calendrier.php";
	
	if (isset($_POST['btnValider'])) {
		$oui = creeTableCalendrier($_POST['dateDebut'] ,$_POST['dateFin']);
	}

	if (isset($_POST['btnSupprimer'])) {
		supprTableCalendrier();
	}

	include "vue/vueCalendrier.php";
	?>
</div>
