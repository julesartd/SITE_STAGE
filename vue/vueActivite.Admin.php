<h1 id="lstA">Créer une activité</h1>
<form name="envoie" method="POST" class="lb mb-3" onsubmit="return validateForm()">
    <select name="professeur" required>
        <option value="" selected>--Choisir Un professeur--</option>
        <?php
        foreach ($listeProf as $unProf) {
        ?>
            <option value=<?php echo $unProf['idProf']; ?>><?php echo $unProf['prenomProf'] . " " . $unProf['nomProf']; ?></option>
        <?php
        }
        ?>
    </select>
    <br><br>
    <input required type="text" name='txtNomActivite' placeholder="Nom de l'activité">
    <br><br>

    <input required type="week" name="numeroSemaine" min="<?php echo $minCalendrier; ?>" max="<?php echo $maxCalendrier; ?>">

    <br>
    <br>
    <select required id="niveauClasse" name="niveauClasse" onchange="competence(this.value);">
        <option value="">--Choisir Une Classe--</option>
        <?php
        foreach ($listeClasse as $uneClasse) {
        ?>
            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] .' '. $uneClasse["nomDiplome"]; ?></option>
        <?php
        }
        ?>
    </select>
    <br>
    <br>
    <table id="activiteCompetence">
        <tr>
            <td id="competence1" colspan="4"></td>
        </tr>
        <tr>
            <td id="sousCompetence1"></td>
            <td id="sousCompetence2"></td>
            <td id="sousCompetence3"></td>
            <td id="sousCompetence4"></td>
        </tr>
    </table>

    <input value="Valider" name="btnValider" type="submit">

</form>