<form method="POST" class="lb mb-3">
    <h1 id="lstA">Ajouter un évènement par semaine</h1>


    <select  aria-label="Default select example" name="classe">

        <option selected>Sélectionnez une classe</option>

        <?php
        foreach ($listeClasse as $uneClasse) {

        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
        <?php
        }


        ?>
    </select>


    <select class="form-select" aria-label="Default select example" name="evenement">

        <option selected>Sélectionnez un évènement</option>

        <?php
        foreach ($listeEvent as $unEvent) {

        ?>

            <option value=<?php echo $unEvent['idEvent']; ?>><?php echo $unEvent['nomEvent'];?></option>
        <?php
        }


        ?>
    </select>

    
    <input type="week" name="numero">
    <input type="submit" value="AJOUTER" name="btnAjoutEvent">


</form>