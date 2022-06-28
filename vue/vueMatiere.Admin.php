<div id=tableau>
    <table class="table table-bordered">
        <tr class="table-active">
            <th>nom matiere</th>
            <th>Compétence</th>
            <th></th>
        </tr>
        <?php
        foreach ($tableauMatiere as $matiere) {
        ?>
            <tr>
                <td><?php echo $matiere["nomMatiere"]; ?></td>
                <td><a href="index.php?action=competenceMatiere&id=<?php echo $matiere["idMatiere"]; ?>">Voir les compétences</td>
                <td><a href="index.php?action=matiere&idSuppr=<?php echo $matiere["idMatiere"]; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce diplôme ?Cette action supprimera les compétences et sous compétences affecter à celui-ci !')">Supprimer</td>
            <?php
        }
            ?>

    </table>
</div>
</br>
<form method="POST" class="lb mb-3 event">
    <h1 id="lstA">Ajouter une Matière</h1>
    </br>
    <input type="text" name='txtNomMatiere' placeholder='Nom de la matière' required class="form-control">
    </br>
    <input type="submit" value="AJOUTER" name="btnAjoutMat" class="btn btn-primary">
    </br>
    </br>


    </br>
</form>