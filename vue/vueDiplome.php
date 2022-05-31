<form method="POST" class="lb mb-3">
    <h1 id="lstA">Ajouter un diplome</h1>
    </br>
    <caption>Insertion d'un diplome :</caption>
    <input type="text" name='txtNomDiplome' placeholder='Nom du diplome' required class="form-label">
    <input type="submit" value="AJOUTER" name="btnAjout">
    </br>
    </br>
    <h2>Voici la liste des diplomes déjà enregistrés</h2>
    <div id=tableau>
        <table class="table table-bordered">
            <tr>
                <th>nom diplome</th>
                <th>Supprimer le diplome</th>
            </tr>
            <?php
            foreach ($tableauDiplome as $diplome) {
            ?>
                <tr>
                    <td><?php echo $diplome["nomDiplome"]; ?></td>
                    <td><a href="index.php?action=diplome&idSuppr=<?php echo $diplome['idDiplome']; ?>"onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce diplôme ?Cette action supprimera les compétences et sous compétences affecter à celui-ci !')">Supprimer</td>
                    <td><a href="index.php?action=competence&id=<?php echo $diplome['idDiplome']; ?>">Voir les compétences</td>
                <?php
            }
                ?>

        </table>
    </div>
    </br>
</form>