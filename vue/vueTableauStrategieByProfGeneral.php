<?php
include "../modele/bd_matiere.php";

echo $_POST['idProfesseur'],$_POST['idClasse'];
$listeMatiere = getMatiereByProfAndClasse($_POST['idProfesseur'],$_POST['idClasse']);
if (isset($_POST['idClasse'])) {

  
?>
    <select name="selectMatiere" onChange="submit()">
        <option selected>-- Choisissez une matière --</OPTION>
        <?php
 
  

        foreach ($listeMatiere as $uneMatiere) {

        ?>

            <option value=<?php echo $uneMatiere['idMatiere']; ?>><?php echo $uneMatiere['nomMatiere']; ?></option>
        <?php
        }


        ?>
    </select>
    
<?php
}
?>

<!-- <div id="tableStrategie">

    <table class="table table-striped-columns table-responsive ">

        <th colspan="2" rowspan="2"><a href="index.php?action=recap&id=<?php echo $classeDeListe['idClasse']; ?>">Récapitulif des compétence travailler</a></th>



        <?php



        foreach ($listeCompetenceMatiere as $uneCompetenceMatiere) {
            $nbCompetenceMatiere =  getCountCompetenceId($uneCompetence['idCompetence']);
            $maxSousComp = $nbSousCompInCompChapeau['num'];
        ?>
            <th colspan=<?php echo $maxSousComp; ?>><?php echo $uneCompetence['libelleCompetence'] . ' ' . $uneCompetence['intituleCompetence'] ?></th>

        <?php



        }
        ?>


        <tr>

            <th>Numéro de la semaine</th>
            <th>Nom de l'activité</th>
            <?php
            foreach ($listeCompetence as $uneCompetenceMatiere) {





                $nbCompetence = nombreSousCompetenceVu($uneCompetence['idCompetenceMatiere'], $classe);
                $nombre = $nbCompetence['nbCompetence'];








            ?>

                <td> <?php echo $nombre ?></td>
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
                    <td><?php echo $uneSemaine['nomActivite']; ?></td>
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

                    <td><?php echo $uneSemaine['nomActivite']; ?></td>

                <?php
                $test = $uneSemaine['idWeekDebut'];
                $test2 = $uneSemaine['idWeekFin'];
            }

            foreach ($listeCompetenceMatiere as $uneCompetenceMatiere) {



                $listeCompetenceParSemaine = getCompetenceByActivite($uneSemaine['idWeekDebut'], $uneSemaine['idActivite']);



                ?><td><?php
                        $verif = 0;

                        foreach ($listeCompetenceParSemaine as $uneCompetenceParSemaine) {
                        ?>

                            <?php
                            if ($verif == 0) {
                                if ($uneCompetenceMatiere['idCompetenceMatiere'] == $uneSousCompetenceParSemaine['idCompetenceMatiere']) {
                                    $verif = 1;
                            ?><div id="cyan">X</td>
                    <?php
                                    $verif = 1;
                    ?>
    <?php
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
</div> -->