<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une classe</h1>
    </br>

    <select  aria-label="Default select example" name="NiveauxClasse">
    <option selected>Sélectionnez un niveau de classe</option>
    <option> terminal</option>
    <option> 1ère</option>
    <option> 2nd</option>
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
        <th></th>
    </tr>
    <?php
    foreach ($listeClasse as $uneClasse) {
    ?>
        <tr>
            <td><?php echo $uneClasse["niveauClasse"]; ?></td>
            <td><?php echo $uneClasse["nomDiplome"]; ?></td>
            <td><?php echo $uneClasse["nomClasse"]; ?></td>
            <td><a href="index.php?action=classe&idSuppr=<?php echo $uneClasse['idClasse']; ?>"onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')">Supprimer</td>
        </tr>
    <?php
    }

    ?>
</table>