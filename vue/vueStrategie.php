<div id="gauche">
    <?php
    if ($_SESSION["idDroitUtilisateur"] == 1) {
    ?>
        <a href="./?action=strategieSuppr">Supprimer des activite professionelle</a>
        <br>
        <a href="./?action=strategieSupprGenerale">Supprimer des activite générale</a>
    <?php
    }
    ?>

</div>
<br>
<form method="POST" class="lb mb-3" action="?action=strategie">
    <h2>Tableau de Stratégie</h2>
    <select aria-label="Default select example" name="classe" onchange="submit()">
        <?php
        if ($test != "") {
        ?>
            <option selected><?php echo $classeDeListe['niveauClasse'] . " " . $classeDeListe['nomDiplome']; ?></OPTION>
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