<table class="table table-dark">
    <tr>
        <th>Nom de l'activité</th>
        <th>Semaine de début et de fin</th>
        <th></th>
    </tr>
    <?php
    foreach ($listeActivite as $uneActivite) {
    ?>
        <tr>
            <td><?php echo $uneActivite['nomActivite']; ?></td>
            <td><?php echo $uneActivite['idWeekDebut']."-".$uneActivite['idWeekFin']; ?></td>
            <td><a href="index.php?action=strategieSuppr&idActiviteSuppr=<?php echo $uneActivite['idActivite']."&classe=".$classe; ?> ">Supprimer l'activité</td>
        </tr>
    <?php
    }
    ?>
</table>