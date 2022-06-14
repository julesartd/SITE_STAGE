<form method="POST" class="lb mb-3">
    <h1 id="lstA">Ajouter un évènement par semaine</h1>


    <select aria-label="Default select example" name="classe">

        <option selected>Sélectionnez une classe</option>

        <?php
        foreach ($listeClasse as $uneClasse) {

        ?>

            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
        <?php
        }


        ?>
    </select>


    <select class="form-select" aria-label="Default select example" name="evenement">

        <option selected>Sélectionnez un évènement</option>

        <?php
        foreach ($listeEvent as $unEvent) {

        ?>

            <option value=<?php echo $unEvent['idEvent']; ?>><?php echo $unEvent['nomEvent']; ?></option>
        <?php
        }


        ?>
    </select>




    <input type="week" name="numero" min="<?php echo $minCalendrier;?>" max="<?php echo $maxCalendrier;?>" >
    <input type="submit" value="AJOUTER" name="btnAjoutEvent">


</form>


<table class="table table-bordered tableau">
    <tr>
        <th>Numéro de la semaine</th>



        <?php


        foreach ($semaine as $uneSemaine) {

        ?>

            <td><?php echo $uneSemaine['week']; ?></td>
        <?php

        }
        ?>
    </tr>
    <?php
    foreach ($listeClasse as $uneClasse) {

    ?>
        <tr>


            <th><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></th>

            <?php

            foreach ($semaine as $uneSemaine) {
                $oui = 0;
                $listeEventByClasse = getEventsByClasseAndWeek($uneClasse['idClasse'], $uneSemaine['week']);
                if (empty($listeEventByClasse)){
                    $event = "";
                    ?>
                    <td></td>
                    <?php
                }else {
                    $event = $listeEventByClasse['idEvent'];
                  
                   
                }
              

                foreach ($listeEvent as $unEvent) {
                    if($oui == 0){
                    if ($unEvent['idEvent'] == $event) {
                        $oui = 1;
                        if ($event == 1) {
                            ?>
                            <td id="cyan"></td>
                            <?php
                        }
                        if ($event == 2) {
                            ?>
                            <td id="vert"></td>
                            <?php
                        }
                        if ($event == 3) {
                            ?>
                            <td id="jaune"></td>
                            <?php
                        }
                    }
                   
                }
                }
            ?>

        <?php
            }
        }

        ?>
        </tr>
</table>