<?php
include_once "../modele/bd_utilisateur.inc.php";
include_once "../modele/bd_matiere.php";

if (!empty($_POST['idProf'])) {
    $droit = getDroitUtilisateur($_POST['idProf']);
    $droit = $droit['idDroitUtilisateur'];
    if($droit == 3){
        $listeMatiere = getMatiere();
?>
        <select name="matiere" class="form-select" required >
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