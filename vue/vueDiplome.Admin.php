<div id=tableau>
    <table class="table table-bordered">
        <tr class="table-active">
            <th>Nom diplome</th>
            <th>Compétence</th>
            <th></th>
        </tr>
        <?php
        foreach ($tableauDiplome as $diplome) {
        ?>
            <tr>
                <td><?php echo $diplome["nomDiplome"]; ?></td>
                <td><a href="index.php?action=competence&id=<?php echo $diplome['idDiplome']; ?>">Voir les compétences</td>
                <td><a href="index.php?action=diplome&idSuppr=<?php echo $diplome['idDiplome']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce diplôme ?Cette action supprimera les compétences et sous compétences affecter à celui-ci !')">Supprimer</td>
            <?php
        }
            ?>

    </table>
</div>
</br>
<form method="POST" class="lb mb-3 event">
    <h1 id="lstA">Ajouter un diplome</h1>
    </br>
    <input type="text" name='txtNomDiplome' placeholder='Nom du diplome' required class="form-control">
    </br>
    <input type="submit" value="AJOUTER" name="btnAjout" class="btn btn-primary">
    </br>
    </br>


    </br>
</form>