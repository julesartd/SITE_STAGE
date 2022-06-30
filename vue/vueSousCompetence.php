<form method="POST" class="lb mb-3" action ="">
    <h1 id="lstA">Créer une sous-compétence</h1>
    </br>


    <input required id="taille" class="form-control" type="text" name='txtIntituleSousCompetence' placeholder='Intitulé de la sous-compétence'>



    </br>
    <input type="submit"  class="btn btn-primary" value="AJOUTER" name="btnAjoutSousCompetence">

    </br>
    <a href="index.php?action=competence&id=<?php echo $idRetour; ?>">retour</a>


    <table class="table table-dark">

        <tr class="table-active">
            <th>Libellé compétence chapeau</th>
            <th>Libellé</th>
            <th>Intitulé</th>
            <th></th>
        </tr>
        <?php
        foreach ($listeSousCompetence as $uneSousCompetence) {
        ?>
            <tr>
                <input class='txt' type='hidden' name='txtNum' value="<?php echo $uneSousCompetence["idSousCompetence"]; ?>">
                <td><?php echo $uneCompetenceId["libelleCompetence"]; ?></td>
                <td><?php echo $uneSousCompetence["libelleSousCompetence"]; ?></td>
                <td><?php echo $uneSousCompetence["intituleSousCompetence"]; ?></td>
                <?php
            if ($_SESSION["idDroitUtilisateur"] == 1) {
            ?>
                <td><a href="index.php?action=sousCompetence&idSuppr=<?php echo $uneSousCompetence['idSousCompetence']; ?>&id=<?php echo $uneSousCompetence["idCompetence"]; ?>">Supprimer</td>
            <?php
            } else {
            ?>
                <td></td>
            <?php
            }
            ?>
            </tr>
        <?php
        }

        ?>
    </table>

    </form>
