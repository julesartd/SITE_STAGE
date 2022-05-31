<form method="POST" class="lb mb-3">
    <h1 id="lstA">Ajouter un évènement par semaine</h1>


    <select class="form-select" aria-label="Default select example" name="classe">

        <option selected>Sélectionnez une classe</option>

        <?php
        foreach ($listeClasse as $uneClasse) {

        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] ." ".$uneClasse['nomBac'] ?></option>
        <?php
        }


        ?>
    </select>


    <input type="submit" value="AJOUTER" name="btnAjoutEvent">


</form>