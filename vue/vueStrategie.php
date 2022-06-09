<table class="table table-bordered tableau">



    <th></th>
    <th></th>


    <?php


    foreach ($listeCompetence as $uneCompetence) {


        $nbSousCompInCompChapeau = getMaxSousCompetenceId($uneCompetence['idCompetence']);
        $maxSousComp = $nbSousCompInCompChapeau['num'];




    ?>

        <th colspan=<?php echo $maxSousComp; ?>><?php echo $uneCompetence['libelleCompetence'] . ' ' . $uneCompetence['intituleCompetence'] ?></th>

    <?php


    }
    ?>
    <tr>
        <th></th>
        <th></th>


        <?php

        foreach ($listeSousCompetence as $uneSousCompetence) {
        ?>

            <td><?php echo $uneSousCompetence['libelleCompetence'] . '.'
                    . $uneSousCompetence['libelleSousCompetence'] . ' ' . $uneSousCompetence['intituleSousCompetence'] ?></td>

        <?php
        }
        ?>
    </tr>

    <tr>

        <th>Semaines</th>
        <th>Nombre</th>
        <?php


        foreach ($listeSousCompetence as $uneSousCompetence) {

            $nbSousCompetence = nombreSousCompetenceVu($uneSousCompetence['idSousCompetence']);
            $nombre = $nbSousCompetence['nbSousCompetence'];


        ?>

            <td> <?php echo $nombre ?></td>


        <?php
        }

        ?>
    </tr>
    <?php

    foreach ($listeSemaine as $uneSemaine) {
    ?>
        <th><?php echo $uneSemaine['idWeek'] ?></th>

        <td></td>
        <?php


        foreach ($listeSousCompetence as $uneSousCompetence) {
        ?>

           
            <?php
            if ($uneSousCompetence['idSousCompetence'] == $uneSemaine['idSousCompetence']) {

            ?><td>vu</td><?php
                    } else {
                        echo "<td> </td>";
                    }
                        ?>



        <?php
        }

        ?>
        <tr>






        <?php
    }
        ?>

        </tr>

        </tr>
</table>