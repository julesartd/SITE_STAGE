<div class="classe">

    <form method="POST" class="lb mb-3">
        <h1 id="lstA">Créer une classe</h1>
        </br>

        <select class="form-select" required aria-label="Default select example" name="NiveauxClasse">
            <option value="" selected>Sélectionnez un niveau de classe</option>
            <option> Seconde</option>
            <option> Première</option>
            <option> Terminal</option>
            <option> 1ère année</option>
            <option> 2ème année</option>

        </select>
        </br>
        <select class="form-select" name="diplome" required>

            <option value="" selected>Sélectionnez un diplome</option>

            <?php
            foreach ($listeDiplome as $unDiplome) {

            ?>

                <option value=<?php echo $unDiplome['idDiplome']; ?>><?php echo $unDiplome['nomDiplome']; ?></option>
            <?php
            }


            ?>
        </select>
        </br>
        </br>
        <input type="submit" class="btn btn-primary" value="AJOUTER" name="btnAjoutClasse">
        <input type="submit" class="btn btn-primary" value="ANNULER" name="btnCancel">


        </br>
        </br>
        </br>
    </form>


    <table class="table table-dark classe">

        <tr class="table-active">

            <th>Niveau de classe</th>
            <th>Bac</th>
            <th>Détail de la classe</th>
            <th></th>
        </tr>
        <?php
        foreach ($listeClasse as $uneClasse) {
        ?>
            <tr>
                <td><?php echo $uneClasse["niveauClasse"]; ?></td>
                <td><?php echo $uneClasse["nomDiplome"]; ?></td>
                <td><a href="index.php?action=detailClasse&id=<?php echo $uneClasse['idClasse']; ?>">Détail</td>
                <td><a href="index.php?action=classe&idSuppr=<?php echo $uneClasse['idClasse']; ?>" 
                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')">Supprimer</td>
            </tr>
        <?php
        }

        ?>
    </table>
</div>