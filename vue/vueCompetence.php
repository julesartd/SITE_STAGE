<form method="POST" class="lb mb-3">
    <h1 id="lstA">Créer une compétence</h1>
    </br>

    <input required type="text" name='txtLibelle' placeholder='Libellé de la compétence'>

    <input required type="text" name='txtIntitule' placeholder='Intitulé de la compétence'>


    <select name="txtBac">
        <option selected>Sélectionnez un bac</option>
        <?php

        foreach ($listeBac as $unBac) {

        ?>
            <option value=<?php echo $unBac['idBac']; ?>><?php echo $unBac['nomBac']; ?></option>
        <?php
        }
        ?>
    </select>

    </br>
    <input type="submit" value="AJOUTER" name="btnAjout">
    <input type="submit" value="ANNULER" name="btnCancel">

    <br>
    <br>
    <table class="table table-dark">

        <tr class="table-active">

            <th>Libellé</th>
            <th>Intitulé</th>
            <th></th>
            </tr>
            <?php
        foreach ($listeCompetence as $uneCompetence) {
        ?>
        <tr>
                <input class='txt' type='hidden' name='txtNum' value="<?php echo $uneCompetence["idCompetence"]; ?>">
                <td><?php echo $uneCompetence["libelleCompetence"];?></td>
                <td><?php echo $uneCompetence["intituleCompetence"];?></td>
                <td><input type="submit" name="btnInfo" value="Voir les compétences" class="record"></td>

        
        </tr>
    <?php
        }

?>
  </table>


</form>