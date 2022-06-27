<?php
include_once "../modele/bd_utisateur.inc.php";
include_once "../modele/bd_competence.php";

if (!empty($_POST['idClasse'])) {
        $idCompetence = $_POST['idClasse'];
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($idCompetence);
        for ($i = 1; $i <= 4; $i++) {
                $competence = "competence" . $i . "";
                $fonction = "sousCompetence" . $i . "(this.value);";
?>
                <select name="<?php echo $competence; ?>" onchange="<?php echo $fonction?>;">
                        <option value="">--Choisir Une Compétence--</option>
                        <?php
                        foreach ($listeCompetence as $uneCompetence) { ?>
                                <option value="<?php echo $uneCompetence['idCompetence']; ?>"><?php echo $uneCompetence['libelleCompetence'] . ' ' . $uneCompetence['intituleCompetence']; ?></option>
                        <?php }
                        ?>
                </select>
        <?php
        }
}