<form method="POST" class="lb mb-3">
    <h2>Ajouter un professeur</h2>

    <input required type="text" name='txtNomProf' placeholder='Nom du professeur'>

    <input required type="text" name='txtPrenomProf' placeholder='Prénom du professeur'>


    <label for="start">Date de naissance</label>
    <br>
    <input type="date" name="txtNaissProf" placeholder="dd-mm-yyyy" value="">

    <input type="submit" name='btnAjoutProf'>

    </div>
    </br>
</form>

<form method="POST" class="lb mb-3">
    <select aria-label="Default select example" name="prof">

        <option selected>Sélectionnez un prof</option>

        <?php
        foreach ($listeProf as $unProf) {
        ?>
            <option value=<?php echo $unProf['idProf']; ?>><?php echo $unProf['prenomProf'] . ' ' . $unProf['nomProf']; ?></option>
        <?php
        }
        ?>
    </select>

    <select aria-label="Default select example" name="classe">

        <option selected>Sélectionnez une classe</option>

        <?php
        foreach ($listeClasse as $uneClasse) {

        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
        <?php
        }
        ?>
    </select>

    <input type="submit" name="btnAttribuer" value="Attribuer">
</form>