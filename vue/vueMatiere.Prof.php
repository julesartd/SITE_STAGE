<div id=tableau>
    <table class="table table-bordered">
        <tr class="table-active">
            <th>Nom matière</th>
            <th>Compétence</th>
        </tr>
        <?php
        foreach ($tableauMatiere as $matiere) {
        ?>
            <tr>
                <td><?php echo $matiere["nomMatiere"]; ?></td>
                <td><a href="index.php?action=competenceMatiere&id=<?php echo $matiere["idMatiere"]; ?>">Voir les compétences</td>
            <?php
        }
            ?>

    </table>
</div>
</br>
