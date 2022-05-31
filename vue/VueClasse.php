<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une classe</h1>
    </br>

    <input required type="text" name='txtNiveaux' placeholder='Niveaux de la classe'>

    <select  aria-label="Default select example" name="bac">

        <option selected>Sélectionnez un Bac</option>

        <?php
        foreach ($listeBac as $unBac) {

        ?>

            <option value=<?php echo $unBac['idBac']; ?>><?php echo $unBac['nomBac']; ?></option>
        <?php
        }


        ?>
    </select>

    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutClasse">
    <input type="submit" value="ANNULER" name="btnCancel">
</form>