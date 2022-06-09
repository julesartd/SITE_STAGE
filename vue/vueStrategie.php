<table class="table table-bordered tableau">



    <th></th>
    <th></th>


    <?php


    foreach ($listeCompetence as $uneCompetence) {

        $comp = getMaxSousCompetenceId($uneCompetence['idCompetence']);
        $nbSousComp = $comp['num'];





    ?>

        <th colspan=<?php echo $nbSousComp; ?>><?php echo $uneCompetence['libelleCompetence'] . ' ' . $uneCompetence['intituleCompetence'] ?></th>

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

        
        ?>
            
         <td>1</td>

            <?php
        }

    ?>
    </tr>
    <?php

        foreach ($listeSemaine as $uneSemaine) {
            ?>
            <th><?php echo $uneSemaine['week'] ?></th>
            <?php
            foreach ($listeSousCompetence as $uneSousCompetence) {

                if ($uneSemaine['week'] == 20 && $uneSousCompetence['idSousCompetence'] == 35){
                    ?><td>VU</td><?php
                }else {
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