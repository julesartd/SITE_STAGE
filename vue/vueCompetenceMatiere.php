<div class="event">
<form method="POST" class="lb mb-3" action="">
    <h1 id="lstA">Créer une compétence</h1>
    </br>

    <input required  class="form-control" type="text" name='txtLibelle' placeholder='Libellé de la compétence'>
    <br>
    <input required class="form-control" type="text" name='txtIntitule' placeholder='Intitulé de la compétence'>



    </br>
    <input type="submit" value="AJOUTER" class="btn btn-primary" name="btnAjoutCompetence">
 
    </br>
    <a href="index.php?action=matiere">retour</a>
</form>
</div>
<br>
<br>
<table class="table table-dark">

    <tr class="table-active">

        <th>Libellé</th>
        <th>Intitulé</th>
        <th></th>
    </tr>
    <?php
    foreach ($listeCompetenceMatiere as $uneCompetenceMatiere) {
    ?>
        <tr>
            <input class='txt' type='hidden' name='txtNum' value="<?php echo $uneCompetenceMatiere["idCompetenceMatiere"]; ?>">
            <td><?php echo $uneCompetenceMatiere["libelleCompetenceMatiere"]; ?></td>
            <td><?php echo $uneCompetenceMatiere["intitulerCompetenceMatiere"]; ?></td>
            <td><a href="index.php?action=competenceMatiere&idSuppr=<?php echo $uneCompetenceMatiere['idCompetenceMatiere']; ?>&id=<?php echo $uneCompetenceMatiere["idMatiere"]; ?> "onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet compétence ?Cette action supprimera les sous compétences affecter à celle-ci !')">Supprimer</td>

        </tr>
    <?php
    }

    ?>
</table>
