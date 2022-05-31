<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une compétence</h1>
    </br>

    <input required type="text" name='txtLibelle' placeholder='Libellé de la compétence'>

    <input required type="text" name='txtIntitule' placeholder='Intitulé de la compétence'>



    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutCompetence">
    <input type="submit" value="ANNULER" name="btnCancel">
</form>

<br>
<br>
<table class="table table-dark">

    <tr class="table-active">

        <th>Libellé</th>
        <th>Intitulé</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach ($listeCompetence as $uneCompetence) {
    ?>
        <tr>
            <input class='txt' type='hidden' name='txtNum' value="<?php echo $uneCompetence["idCompetence"]; ?>">
            <td><?php echo $uneCompetence["libelleCompetence"]; ?></td>
            <td><?php echo $uneCompetence["intituleCompetence"]; ?></td>
            <td><a href="index.php?action=sousCompetence&id=<?php echo $uneCompetence['idCompetence']; ?>">Voir les sous-compétences</td>
            <td><a href="index.php?action=competence&idSuppr=<?php echo $uneCompetence['idCompetence']; ?>&id=<?php echo $uneCompetence["idBac"]; ?>">Supprimer</td>

        </tr>
    <?php
    }

    ?>
</table>