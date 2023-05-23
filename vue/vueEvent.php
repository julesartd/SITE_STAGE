<div id="tableEvent">
    <h1 id="lstA">Liste des évènements lors de l'année scolaire</h1>
    </br>
    <div class="event">
        <table class="table table-bordered tableau">
            <tr>
                <th id="jaune">Stage</th>
                <th id="vert">Examen</th>
                <th id="cyan">Vacances</th>
                <th id="rouge">Evénement</th>
            </tr>
        </table>
    </div>
    <table class="table table-bordered tableau">
        </br>
        <tr>
            <th>Numéro de la semaine</th>
            <?php
            foreach ($semaine as $uneSemaine) {
                ?>
                <td>
                    <?php echo $uneSemaine['week']; ?>
                </td>
                <?php

            }
            ?>
        </tr>
        <?php
        foreach ($listeClasse as $uneClasse) {
            ?>
            <tr>
                <th>
                    <?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?>
                </th>
                <?php
                foreach ($semaine as $uneSemaine) {
                    $oui = 0;
                    $listeEventByClasse = getEventsByClasseAndWeek($uneClasse['idClasse'], $uneSemaine['week']);
                    if (empty($listeEventByClasse)) {
                        $event = "";
                        ?>
                        <td></td>
                        <?php
                    } else {
                        $event = $listeEventByClasse['idEvent'];
                    }
                    foreach ($listeEvent as $unEvent) {
                        if ($oui == 0) {
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
                                if ($event == 4) {
                                    ?>
                                    <td id="rouge"></td>
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
</div>

<?php
if ($_SESSION["idDroitUtilisateur"] == 1) {
    ?>
    <form method="POST" class="lb mb-3 event" action="/?action=event">
        <h1 id="lstA">Supprimer les événements d'une classe</h1>
        <select required class="form-select" name="classe">
            <option value="" selected>Sélectionnez une classe</option>
            <?php
            foreach ($listeClasse as $uneClasse) {
                ?>
                <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
                <?php
            }
            ?>
        </select>
        <br>
        <input type="submit" class="btn btn-danger" value="SUPPRIMER" name="btnSupprEvent">
    </form>
    <?php
}
?>
<form method="POST" class="lb mb-3 event" action="/?action=event">
    <h1 id="lstA">Ajouter un évènement par semaine</h1>

    <select required class="form-select" name="classe">
        <option value="" selected>Sélectionnez une classe</option>
        <?php
        foreach ($listeClasse as $uneClasse) {
            ?>
            <option value=<?php echo $uneClasse['idClasse']; ?>><?php echo $uneClasse['niveauClasse'] . " " . $uneClasse['nomDiplome'] ?></option>
            <?php
        }
        ?>
    </select>
    </br>
    <select required class="form-select" name="evenement">
        <option value="" selected>Sélectionnez un évènement</option>
        <?php
        foreach ($listeEvent as $unEvent) {
            ?>

            <option value=<?php echo $unEvent['idEvent']; ?>><?php echo $unEvent['nomEvent']; ?></option>
            <?php
        }
        ?>
    </select>
    </br>
    <input required class="form-control" type="week" name="numero" min="<?php echo $minCalendrier; ?>"
        max="<?php echo $maxCalendrier; ?>">
    </br>
    </br>
    <input type="submit" class="btn btn-primary" value="AJOUTER" name="btnAjoutEvent">

</form>