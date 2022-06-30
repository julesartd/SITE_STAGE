<table class="table table-bordered">

    <tr class="table-active">
        <th>Compétences</th>
        <th>Nombre</th>
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
            <?php
                if ($nombre > 0) {
                ?>
                <td class="table-success"><?php echo $uneSousCompetence['libelleCompetence'] . '.' .
                        $uneSousCompetence['libelleSousCompetence'] ?></td>
                
                    <td class="table-success"><?php echo $nombre ?></td>
            </tr>
            <?php
                }else {
                    ?>
                     <td><?php echo $uneSousCompetence['libelleCompetence'] . '.' .
                        $uneSousCompetence['libelleSousCompetence'] ?></td>
                    <td><?php echo $nombre ?></td>
                    <?php 
                }
            }
        }
?>
</table>