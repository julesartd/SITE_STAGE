<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

	// Recuperation des parametres (lors du changement d'annees)
	if(isset($_POST["year"])) { // Recuperation des parametres POST pour le formulaire
		$year = $_POST["year"];
	}
	elseif(isset($_GET["year"])) { // Recuperation des parametres GET pour les liens vers les annees precedentes et suivantes
		$year = $_GET["year"];
	}
	else { // sinon on applique l'annee en cours
		$newDate = New DateTime();
		$year = $newDate->format("Y");
	}
	
	// mise en memoire des jours de la semaine et des mois de l'annee dans un tableau
	$aDayOfWeek = array("Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim");
	$aMonth = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	
	// creation d'une date temporaire en fonction du parametre annee recu
	$newDate = New DateTime();
	$newDate->setDate($year, 1, 1);
	if ($newDate->format("L") == 1) { // si l'annee est bissextile, mise en memoire des nombres de jours par mois de l'annee (avec 29 a fevrier)
		$aMonthDays = array("31", "29", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
	}
	else { // sinon, mise en memoire des nombres de jours par mois de l'annee (avec 28 a fevrier)
		$aMonthDays = array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
	}


    include "$racine/vue/vueCalendrier.php";
?>
