<h1 id="lstA">Voici vos classes</h1>
<br><br>
<table class="table table-dark classe">

    <tr class="table-active">

        <th>Niveau de classe</th>
        <th>Bac</th>
     
    </tr>
    <?php
    foreach ($listeClasse as $uneClasse) {
    ?>
        <tr>
            <td><?php echo $uneClasse["niveauClasse"]; ?></td>
            <td><?php echo $uneClasse["nomDiplome"]; ?></td>
          
        </tr>
    <?php
    }

    ?>
</table>