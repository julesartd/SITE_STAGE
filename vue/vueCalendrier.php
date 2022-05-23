<html>
	<head>
		<title>Calendrier <?php echo $year; // Affichage de l'annee ?></title>
		<style type="text/css">
			<!--
				#calendar {padding:0; margin:0; border-top:1px solid black; border-left:1px solid black; border-right:1px solid black;}
				#calendar th {border:1px solid black; border-bottom:2px solid black}
				#calendar td {padding-left:3px; padding-right:3px}
				#calendar td.dayOfWeek {border-left:1px solid black;}
				#calendar td.day {text-align: right;}
				#calendar td.week {border-right:1px solid black; font-weight:bold;}
				#calendar td.endOfMonth {border-bottom:2px solid black;}
				#calendar .weekend{background-color : #CCC;}
			-->
		</style>
	</head>
	<body>
		<center>
			<h2>Calendrier <?php echo $year;// Affichage de l'annee ?></h2>
			<table id="calendar" cellpadding="0" cellspacing="0" border="0">
				<thead>
					<tr>
						<?php for ($m=0; $m<12; $m++) { // Creation d'une boucle pour ecrire les entetes de colonnes ?>
						<th colspan="3"><?php echo $aMonth[$m]; // Ecriture du nom du mois ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php for ($d=1; $d<=31; $d++) { // Creation d'une boucle pour realiser les lignes ?>
					<tr>
						<?php for ($m=0; $m<12; $m++) { // Creation d'une boucle pour ecrire les colonnes
							$newDate = New DateTime(); // Creation d'une date pour obtenir le numero du jour de la semaine et le numero de semaine
							$newDate->setDate($year, ($m+1), $d);
							$dayOfWeek = $newDate->format("N")-1; // Recuperation du numero du jour de la semaine (0 à 6)
							$weekend = ((($dayOfWeek==5 or $dayOfWeek==6) and $d <= $aMonthDays[$m])?" weekend":""); // Si le jour est un samedi ou dimanche et compris dans le mois, mise en memoire du mot weekend (classe css)
							$endOfMonth = (($d==31)?" endOfMonth":""); // Si dernier jour du mois, mise en memoire du mot endOfWeek (classe css)
							if ($d <= $aMonthDays[$m])  { // Si le jour est compris dans le mois en cours ?>
							
						<!--// Ajout des classes css predefinis et affichage du jour de la semaine dans la premiere colonne -->
						<td class="dayOfWeek<?php echo $weekend.$endOfMonth;?>"><?php echo $aDayOfWeek[$dayOfWeek]; ?></td>
						
						<!--// Ajout des classes css predefinis et affichage du numero du jour du mois-->
						<td class="day<?php echo $weekend.$endOfMonth;?>"><?php echo $d; ?></td>
						
						<!--// Ajout des classes css predefinis et affichage en debut de semaine ou premier jour de l'annee du numero de semaine -->
						<td class="week<?php echo $weekend.$endOfMonth;?>"><?php echo (($dayOfWeek==0 or ($d==1 and $m==0))?$newDate->format("W"):"&nbsp;");?></td>
						
						<?php } else { // Si le jour n'est pas compris dans le mois (le 31 n'existe pas en fevrier) ?>
						
						<!--// Ajout des classes css predefinis et ajout d'un espace pour que la cellule soit affichee correctement -->
						<td class="dayOfWeek<?php echo $weekend.$endOfMonth;?>" colspan="2">&nbsp;</td>
						<td class="week<?php echo $weekend.$endOfMonth;?>">&nbsp;</td>
						
						<?php } } ?>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<!--// Liens vers cette meme page avec le parametre annee pointant vers l'annee precedente et suivante -->
			<a href="<?php echo $_SERVER["PHP_SELF"]?>?year=<?php echo $year-1;?>">Année précédente</a>&nbsp;&nbsp;&nbsp;
			<a href="<?php echo $_SERVER["PHP_SELF"]?>?year=<?php echo $year+1;?>">Année suivante</a>
			<br />
			<br />
			<!--// Creation d'un formulaire pour la saisie de l'annee qui retourne vers cette meme page -->
			<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
				Année :&nbsp;
				<input name="year" value="<?php echo $year;?>" />
				<input type="submit" value="Appliquer" />
			</form>
		</center>
	</body>
</html>
