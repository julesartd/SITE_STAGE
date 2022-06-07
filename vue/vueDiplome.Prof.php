<form method="POST" class="lb mb-3">
    <h2>Voici la liste des diplomes</h2>
    <div id=tableau>
        <table class="table table-bordered">
            <tr>
                <th>nom diplome</th>
                <th>Compétence</th>
            </tr>
            <?php
            foreach ($tableauDiplome as $diplome) {
            ?>
                <tr>
                    <td><?php echo $diplome["nomDiplome"]; ?></td>
                    <td><a href="index.php?action=competence&id=<?php echo $diplome['idDiplome']; ?>">Voir les compétences</td>
                <?php
            }
                ?>

        </table>
    </div>
    </br>
</form>