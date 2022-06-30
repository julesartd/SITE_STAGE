<?php
include_once "../modele/bd_utilisateur.inc.php";
include_once "../modele/bd_matiere.php";

if (!empty($_POST['idProf'])) {
        $droit = getDroitUtilisateur($_POST['idProf']);
        $droit = $droit['idDroitUtilisateur'];
        if ($droit == 3) {
                $listeMatiere = getMatiere();
?>
                <select name="matiere" class="form-select" required>
                        <option value="">--Choisir Une Matiére--</option>
                        <?php
                        foreach ($listeMatiere as $uneMatiere) { ?>
                                <option value="<?php echo $uneMatiere['idMatiere']; ?>"><?php echo $uneMatiere['nomMatiere']; ?></option>
                        <?php }
                        ?>
                </select>
        <?php
        }
}

if (!empty($_POST['idC']) && !empty($_POST['idP'])) {
        $listeMatiere = getMatiereByProfAndClasse($_POST['idP'], $_POST['idC']);
        ?>
        <select name="matiere" required onchange="submit()">
                <option value="">--Choisir Une Matiére--</option>
                <?php
                foreach ($listeMatiere as $uneMatiere) { ?>
                        <option value="<?php echo $uneMatiere['idMatiere']; ?>"><?php echo $uneMatiere['nomMatiere']; ?></option>
                <?php }
                ?>
        </select>
<?php
}

if (!empty($_POST['idClasse'])) {
        $listeMatiere = getMatiereByClasse($_POST['idClasse']);
        ?>
        <select name="matiere" required onchange="submit()">
                <option value="">--Choisir Une Matiére--</option>
                <?php
                foreach ($listeMatiere as $uneMatiere) { ?>
                        <option value="<?php echo $uneMatiere['idMatiere']; ?>"><?php echo $uneMatiere['nomMatiere']; ?></option>
                <?php }
                ?>
        </select>
<?php
}
