<table class="table table-bordered border-primary">



    <th></th>
    <th></th>


    <?php


    foreach ($listeCompetence as $uneCompetence) {


        $nbSousCompInCompChapeau =  getCountCompetenceId($uneCompetence['idCompetence']);
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


        $listeNumSemaine = getWeekFromTimeDimensionInAC($uneSemaine['idActivite']);
        print_r($listeNumSemaine);

        foreach ($listeNumSemaine as $unNumSemaine) {

        
            $nbActiviteParSemaine = getCountSemaine($unNumSemaine['idWeek']);
            $nbActiviteParSemaine = $nbActiviteParSemaine['num'];
    
    ?>
            <th rowspan="<?php echo $nbActiviteParSemaine; ?>"><?php echo $unNumSemaine['idWeek'] ?></th>
            <td>NOM</td>
    
        <?php
        }

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
