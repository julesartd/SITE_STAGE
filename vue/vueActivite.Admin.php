<h1 id="lstA">Créer une activité</h1>
<form method="POST" class="lb mb-3" action="">
    Séléctionner un professeur :
    <select name="professeur">
        <?php
        foreach ($listeProf as $unProf) {
        ?>
            <option value=<?php echo $unProf['idProf']; ?>><?php echo $unProf['prenomProf'] . " " . $unProf['nomProf']; ?></option>
        <?php
        }
        ?>
    </select>
    <br><br>
    nom de l'activité : <input type="text" name='txtNomActivite' placeholder="Nom de l'activité">
    <br><br>

    <select id="niveauClasse" name="niveauClasse" onchange="competence1(this.value);">
        <option value="">--Choisir Une Classe--</option>
        <?php
        foreach ($listeClasse as $uneClasse) {
        ?>
            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . $uneClasse["nomDiplome"]; ?></option>
        <?php
        }
        ?>
    </select>
    <br>
    <br>
    <table><tr>
    <td id="competence1"></td> <!--<td id="competence2"></td><td id="competence3"></td><td id="competence4"></td> -->
</tr>
<tr>
    <td id="sousCompetence1"></td><td id="sousCompetence2"></td><td id="sousCompetence3"></td><td id="sousCompetence4"></td>
    </tr>
</table>
</form>
