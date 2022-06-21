<table class="table table-dark">

    <tr class="table-active">
        <th>Compétences</th>
        <th>Nombre de fois vue</th>
    </tr>
    <?php
    foreach ($listeCompetence as $uneCompetence) {


        foreach ($listeSousCompetence as $uneSousCompetence) {
            $listeSousCompetence = getSousCompetenceById($uneCompetence['idCompetence']);
        }

        foreach ($listeSousCompetence as $uneSousCompetence) {


            $nbSousCompetence = nombreSousCompetenceVu($uneSousCompetence['idSousCompetence'], $classe);
            $nombre = $nbSousCompetence['nbSousCompetence'];


    ?>
            <tr>
                <td><?php echo $uneSousCompetence['libelleCompetence'] . '.' . $uneSousCompetence['libelleSousCompetence'] ?></td>
                <td><?php echo $nombre ?></td>
            </tr>
    <?php

        }
    }
    ?>
</table>
