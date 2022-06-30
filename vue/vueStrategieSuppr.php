<form method="POST" class="lb mb-3" action="?action=strategieSuppr">
    <h2>Supprimer une activité</h2>
    <select aria-label="Default select example" name="classe" onchange="submit()">


        <?php
        if ($test != "") {
        ?>
            <option value=<?php echo $classeDeListe['idClasse']; ?> selected><?php echo $classeDeListe['niveauClasse'] . " " . $classeDeListe['nomDiplome']; ?></OPTION>
        <?php
        } else {
        ?>
            <option selected>-- Choisissez une Classe --</OPTION>
        <?php
        }

        foreach ($listeClasse as $uneClasse) {


        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
        <?php
        }


        ?>
    </select>
    <br><br>

</form>