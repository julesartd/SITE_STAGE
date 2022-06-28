<h1 id="lstA">Créer une activité</h1>
</br>
<form name="envoie" method="POST" class="lb mb-3" onsubmit="return validateForm()">
    <br><br>
    <input required type="text" class="form-control" name='txtNomActivite' placeholder="Nom de l'activité">
    <br><br>
    <label class="form-label">Semaine de début de l'activité : </label>
    <input class="form-control" xrequired type="week" name="numeroSemaineDebut" min="<?php echo $minCalendrier; ?>" max="<?php echo $maxCalendrier; ?>">
    <label class="form-label">Semaine de fin de l'activité : </label>
    <input required class="form-control" type="week" name="numeroSemaineFin" min="<?php echo $minCalendrier; ?>" max="<?php echo $maxCalendrier; ?>">

    <br>
    <br>
    <select required id="niveauClasse" name="niveauClasse" onchange="competence(this.value);">
        <option value="">--Choisir Une Classe--</option>
        <?php
        foreach ($listeClasse as $uneClasse) {
        ?>
            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . ' ' . $uneClasse["nomDiplome"]; ?></option>
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
<br>
    <input value="Valider" class="btn btn-primary" name="btnValider" type="submit">

</form>