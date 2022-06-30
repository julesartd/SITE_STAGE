<form method="POST" class="lb mb-3 event">
    <h2>Ajouter un professeur : </h2>
    </br>
    <input required type="text" name='txtNomProf' placeholder='Nom du professeur'>

    <input required type="text" name='txtPrenomProf' placeholder='Prénom du professeur'>
    </br>
    </br>
    <label for="start">Date de naissance :</label>
    <input required type="date" name="txtNaissProf" placeholder="dd-mm-yyyy" max="<?php echo date('Y-m-d'); ?>">
    </br>


    </br>
    <select class="form-select" name="selectDroit" required>

        <option value="" selected>Sélectionnez les permissions</option>

        <?php
        foreach ($listeDroit as $unDroit) {

        ?>

            <option value=<?php echo $unDroit['idDroit']; ?>><?php echo $unDroit['Droit']; ?></option>
        <?php
        }


        ?>
    </select>
    </br>
    <input type="submit" name='btnAjoutProf'>

    </div>
    </br>
</form>



<form>
    <table class="table table-dark">

        <tr class="table-active">

            <th>Nom du professeur</th>
            <th>Prénom</th>
            <th>Réinitialiser le mot de passe</th>
            <th></th>

        </tr>
        <?php
        foreach ($listeProf as $unProf) {


        ?>
            <tr>
                <td><?php echo $unProf["nomProf"]; ?></td>
                <td><?php echo $unProf["prenomProf"]; ?></td>
                <td><a href="index.php?action=prof&id=<?php echo $unProf['idProf']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir réinitialiser le mot de passe de ce professeur ?')">Réinitisaliser</td>
                <td><a href="index.php?action=prof&id=<?php echo $unProf['idProf']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">Supprimer</td>

            </tr>
        <?php
        }

        ?>
    </table>
</form>
</br>


<h2>Affecter un professeur à une classe : </h2>
</br>
<form method="POST" class="lb mb-3 event">
    <select required class="form-select" name="prof" onchange="profDroit(this.value);">

        <option selected value="">Sélectionnez un prof</option>

        <?php
        foreach ($listeProf as $unProf) {
        ?>
            <option value=<?php echo $unProf['idProf']; ?>><?php echo $unProf['prenomProf'] . ' ' . $unProf['nomProf']; ?></option>
        <?php
        }
        ?>
    </select>
    </br>
    <div id ="prof"></div>
    </br>
    <select required class="form-select" name="classe" >

        <option selected value="">Sélectionnez une classe</option>

        <?php
        foreach ($listeClasse as $uneClasse) {

        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
        <?php
        }
        ?>
    </select>

    </br>
    <input type="submit" name="btnAttribuer" value="Attribuer">
</form>