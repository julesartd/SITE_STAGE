<h1 id="lstA">Créer une activité</h1>
</br>
<div class="event">
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
    </div>
    <select required id="niveauClasse" name="niveauClasse" onchange="listeMatiere(this.value, <?php echo $_SESSION['idProfesseur'];?>);">
        <option value="">--Choisir Une Classe--</option>
        <?php
        foreach ($listeClasse as $uneClasse) {
        ?>
            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . ' ' . $uneClasse["nomDiplome"]; ?></option>
        <?php
        }
        ?>
    </select>
    <div id="listeMatiere"></div>
    <br>
    <br>
    <table id="activiteCompetence">
        <tr>
            <td id="competenceMatiere"></td>
        </tr>
    </table>
<br>
    <input value="Valider" class="btn btn-primary" name="btnValider" type="submit">

</form>