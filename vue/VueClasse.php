<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une classe</h1>
    </br>

    <input required type="text" name='txtNiveaux' placeholder='Niveaux de la classe'>

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

    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutClasse">
    <input type="submit" value="ANNULER" name="btnCancel">
</form>