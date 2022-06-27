<div id=tableau>
    <table class="table table-bordered">
        <tr class="table-active">
            <th>Nom matière</th>
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
