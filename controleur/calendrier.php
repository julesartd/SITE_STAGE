<div>
	<?php

	include_once "modele/bd_competence.php";
	include_once "modele/bd_calendrier.php";


	if (isset($_SESSION['mailUtilisateur'])) {
		if (isset($_POST['btnValider'])) {
			supprTableCalendrier();
			creeTableCalendrier($_POST['dateDebut'], $_POST['dateFin']);
			echo "Le calendrier a bien été créé.";
		}
		include "vue/vueCalendrier.php";
	}else {
        header("Location:/?action=connexion&login=non");
    }


	
	?>
</div>