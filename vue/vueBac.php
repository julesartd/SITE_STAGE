<form method="POST" class="lb mb-3">
    <h1 id="lstA">Ajouter un Baccalauréat</h1>
    </br>
    <caption>Insertion d'un Baccalauréat :</caption>
    <input type="text" name='txtNomBac' placeholder='Nom du bac' required>
    <input type="submit" value="AJOUTER" name="btnAjout">
    </br>
    </br>
    <h1>Baccalauréat déja enregistrer</h1>
    <table class="table-info gestion">
        <tr>
            <th>nom Baccalauréat</th>
            <th>Supprimer le Baccalauréat</th>
        </tr>
        <?php
        foreach ($tableauBac as $Bac) {
        ?>
            <tr>
                <td><?php echo $Bac["NOMDUBAC"]; ?></td>
                <td><a href="index.php?action=bac&idSuppr=<?php echo $Bac['IDBAC']; ?>">Supprimer</td>
            <?php
        }
            ?>

    </table>

    </br>
</form>