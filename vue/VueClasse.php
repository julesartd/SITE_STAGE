<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une classe</h1>
    </br>

    <select  aria-label="Default select example" name="Niveaux">
    <option selected>Sélectionnez un niveau de classe</option>
    <option value = terminal> terminal</option>
    <option value = 1ère> 1ère</option>
    <option value = 2nd> 2nd</option>
    </select>

    <select  aria-label="Default select example" name="diplome">

        <option selected>Sélectionnez un diplome</option>

        <?php
        foreach ($listeDiplome as $unDiplome) {

        ?>

            <option value=<?php echo $unDiplome['idDiplome']; ?>><?php echo $unDiplome['nomDiplome']; ?></option>
        <?php
        }


        ?>
    </select>
    <input type="text" name='txtNom' placeholder='Nom de la classe'>

    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutClasse">
    <input type="submit" value="ANNULER" name="btnCancel">
</form>

<br>
<br>
<table class="table table-dark">

    <tr class="table-active">

        <th>Niveau de classe</th>
        <th>Bac</th>
        <th>Nom de la classe</th>

    </tr>
    <?php
    foreach ($listeClasse as $uneClasse) {
    ?>
        <tr>
            <td><?php echo $uneClasse["niveauClasse"]; ?></td>
            <td><?php echo $uneClasse["nomBac"]; ?></td>
            <td><?php echo $uneClasse["nomClasse"]; ?></td>

        </tr>
    <?php
    }

    ?>
</table>