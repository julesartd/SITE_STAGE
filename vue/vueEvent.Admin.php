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




    <input type="week" name="numero">
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
 
                if ($uneSemaine['week'] == $semaineAdd) {
            ?>
                    <style>
                         #tdRouge {
                            background-color: red;
                        }
                    </style>

                    <td id="tdRouge">evenement</td>
                <?php
                } else {
                ?>
                    <td></td>
            <?php
                }
            }
            ?>

        <?php
    }



        ?>
        </tr>
</table>
