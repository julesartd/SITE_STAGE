<form method="POST" class="lb mb-3" >
    <h1 id="lstA">Ajouter un Baccalauréat</h1>
    </br>
    <caption>Insertion d'un Bac :</caption>
    <input type="text" name='txtNomBac' placeholder='Nom du bac' required class="form-label">
    <input type="submit" value="AJOUTER" name="btnAjout" >
    </br>
    </br>
    <h2>Voici la liste des Bacs déjà enregistrés</h2>
    <div id=tableau>
        <table class="table table-bordered">
            <tr>
                <th>nom Bac</th>
                <th>Supprimer le Bac</th>
            </tr>
            <?php
            foreach ($tableauBac as $Bac) {
            ?>
                <tr>
                    <td><?php echo $Bac["nomBac"]; ?></td>
                    <td><a href="index.php?action=bac&idSuppr=<?php echo $Bac['idBac']; ?>">Supprimer</td>
<<<<<<< HEAD
=======
                    <td><a href="index.php?action=competence&id=<?php echo $Bac['idBac']; ?>">Voir les compétences</td>
>>>>>>> a6302b0f55a9005c14715e65f9f2be2ed2c7dff8
                <?php
            }
                ?>

        </table>
    </div>
    </br>
</form>