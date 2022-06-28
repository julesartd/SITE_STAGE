<div id="tableStrategie">

<table class="tableStrategie">

    <th colspan="2"><a href="index.php?action=recap&id=<?php echo $classeDeListe['idClasse']; ?>">Récapitulif des compétence travailler</a></th>

    <?php
    foreach ($listeCompetence as $uneCompetence) {
    ?>
        <th><?php echo $uneCompetence['libelleCompetenceMatiere'] . ' ' . $uneCompetence['intitulerCompetenceMatiere'] ?></th>

    <?php
    }
    ?>
    <tr>

        <th>Numéro de la semaine</th>
        <th>Nom de l'activité</th>
        <?php
        foreach ($listeCompetence as $uneCompetence) {

                $nbCompetence = nombreCompetenceMatiereVu($uneCompetence['idCompetenceMatiere'], $classe, $matiere);
                $nombre = $nbCompetence['nbCompetence'];
        ?>

                <th> <?php echo $nombre ?></th>
        <?php

            }
        ?>
    </tr>

    <?php
    $test = 0;
    $test2 = 0;
    foreach ($listeSemaine as $uneSemaine) {



        if ($test == $uneSemaine['idWeekDebut'] && $test2 == $uneSemaine['idWeekFin']) {
    ?>
            <tr>
                <th><?php echo $uneSemaine['nomActivite']; ?></th>
            <?php
        } else {
            $nbActiviteParSemaine = getCountSemaine($uneSemaine['idWeekDebut'], $uneSemaine['idWeekFin'], $classe);
            $nbActiviteParSemaine = $nbActiviteParSemaine['num'];
            ?>
            <tr>
                <th rowspan="<?php echo $nbActiviteParSemaine; ?>">
                    <?php
                    if ($uneSemaine['idWeekDebut'] != $uneSemaine['idWeekFin']) {
                        echo $uneSemaine['idWeekDebut'] . '-' . $uneSemaine['idWeekFin'];
                    } else {
                        echo $uneSemaine['idWeekDebut'];
                    } ?>
                    
                </th>

                <th><?php echo $uneSemaine['nomActivite']; ?></th>

                <?php
                $test = $uneSemaine['idWeekDebut'];
                $test2 = $uneSemaine['idWeekFin'];
            }

            foreach ($listeCompetence as $uneCompetence) {


                foreach ($listeSousCompetence as $uneSousCompetence) {
                    $listeSousCompetence = getCompetenceByMatiere($uneCompetence['idCompetence']);
                }

                $listeSousCompetenceParSemaine = getSousCompetenceClasse($uneSemaine['idWeekDebut'], $uneSemaine['idActivite']);


                foreach ($listeSousCompetence as $uneSousCompetence) {
                ?><td><?php
                        $verif = 0;

                        foreach ($listeSousCompetenceParSemaine as $uneSousCompetenceParSemaine) {
                        ?>


                            <?php
                            if ($verif == 0) {
                                if ($uneSousCompetence['idSousCompetence'] == $uneSousCompetenceParSemaine['idSousCompetence']) {
                                    $verif = 1;
                            ?><div id="cyan">X</td>
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
</div>