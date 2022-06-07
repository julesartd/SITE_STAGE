<h1 id="lstA">Voici vos classes</h1>
<br><br><br>
<table class="table table-dark">

    <tr class="table-active">

        <th>Niveau de classe</th>
        <th>Bac</th>
        <th>Détail de la classe</th>
     
    </tr>
    <?php
    foreach ($listeClasse as $uneClasse) {
    ?>
        <tr>
            <td><?php echo $uneClasse["niveauClasse"]; ?></td>
            <td><?php echo $uneClasse["nomDiplome"]; ?></td>
            <td><a href="index.php?action=classe">Détail</td>
          
        </tr>
    <?php
    }

    ?>
</table>