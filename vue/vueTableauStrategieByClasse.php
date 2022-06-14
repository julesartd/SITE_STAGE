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
        foreach ($listeCompetence as $uneCompetence) {


            foreach ($listeSousCompetence as $uneSousCompetence) {
                $listeSousCompetence = getSousCompetenceById($uneCompetence['idCompetence']);
            }

            foreach ($listeSousCompetence as $uneSousCompetence) {
        ?>

                <td><?php echo $uneSousCompetence['libelleCompetence'] . '.'
                        . $uneSousCompetence['libelleSousCompetence'] . ' ' . $uneSousCompetence['intituleSousCompetence'] ?></td>

        <?php

            }
        }
        ?>
    </tr>

    <tr>

        <th>Numéro de la semaine</th>
        <th>Nom de l'activité</th>
        <?php
        foreach ($listeCompetence as $uneCompetence) {


            foreach ($listeSousCompetence as $uneSousCompetence) {
                $listeSousCompetence = getSousCompetenceById($uneCompetence['idCompetence']);
            }

            foreach ($listeSousCompetence as $uneSousCompetence) {


                $nbSousCompetence = nombreSousCompetenceVu($uneSousCompetence['idSousCompetence'],$classe);
                $nombre = $nbSousCompetence['nbSousCompetence'];


        ?>

                <td> <?php echo $nombre ?></td>
        <?php

            }
        }



        ?>
    </tr>

    <?php
    $test = 0;

    foreach ($listeSemaine as $uneSemaine) {



        if ($test == $uneSemaine['idWeek']) {
    ?>
            <tr>
                <td><?php echo $uneSemaine['nomActivite']; ?></td>
            <?php
        } else {
            $nbActiviteParSemaine = getCountSemaine($uneSemaine['idWeek'],$classe);
            $nbActiviteParSemaine = $nbActiviteParSemaine['num'];
            ?>
            <tr>
                <th rowspan="<?php echo $nbActiviteParSemaine; ?>"><?php echo $uneSemaine['idWeek'] ?></th>
                <td><?php echo $uneSemaine['nomActivite']; ?></td>

                <?php
                $test = $uneSemaine['idWeek'];
            }

            foreach ($listeCompetence as $uneCompetence) {


                foreach ($listeSousCompetence as $uneSousCompetence) {
                    $listeSousCompetence = getSousCompetenceById($uneCompetence['idCompetence']);
                }

                $listeSousCompetenceParSemaine = getSousCompetenceClasse($uneSemaine['idWeek'], $uneSemaine['idActivite']);


                foreach ($listeSousCompetence as $uneSousCompetence) {
                ?><td><?php
                    $verif = 0;

                    foreach ($listeSousCompetenceParSemaine as $uneSousCompetenceParSemaine) {
                    ?>


                            <?php
                            if ($verif == 0) {
                                if ($uneSousCompetence['idSousCompetence'] == $uneSousCompetenceParSemaine['idSousCompetence']) {
                                    $verif = 1;
                            ?><div class="bleu">X</td>
                    </div><?php
                                    $verif = 1;
                            ?>
<?php
                                }
                            }
                        }
                    }
                }




?>

            </tr>





        <?php
    }


        ?>



</table>