

<div id=tableau>
        <table class="table table-bordered">

    <tr class="table-active">
        <th>Nom professeur</th>
        <th>Prénom professeur</th>
    </tr>
    <?php
    foreach ($listeProf as $unProf) {
    ?>
        <tr>
            <td><?php echo $unProf["nomProf"]; ?></td>
            <td><?php echo $unProf["prenomProf"]; ?></td>
        </tr>
    <?php
    }
    ?>
    </table>
    <table class="table table-bordered">
    <tr class="table-active">
        <th>Nom élève</th>
        <th>Prénom élève</th>
    </tr>
    <?php
    foreach ($listeEleve as $unEleve) {
    ?>
        <tr>
            <td><?php echo $unEleve["nomEleve"]; ?></td>
            <td><?php echo $unEleve["prenomEleve"]; ?></td>
        </tr>
    <?php
    }

    ?>
</table>
</div>