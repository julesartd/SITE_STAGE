<h1 id="lstA">Créer le calendrier de l'année scolaire</h1>
	<form method="POST" class="lb mb-3" action="">
		<?php
		// Set the new timezone
		date_default_timezone_set('Europe/Paris');
		$date = date('d-m-Y');
		?>
		<h3 id="lstA">Entrez la date de début et de fin d'année scolaire</h3>
		</br>
		date de début : <input type="date" name="dateDebut" value="" min="<?php $date ?>" max="">
		date de fin : <input type="date" name="dateFin" value="" min="<?php $date ?>" max="">
		</br></br>
		<input type="submit" value="Valider" name="btnValider">
		</br></br>

	Supprimer la table actuel : <input type="submit" value="Supprimer" name="btnSupprimer">

	</form>