<?php
if (isset($_POST['idClasse']) && isset($_POST['idProf'])) {
    $listeMatiere = getMatiereByProfAndClasse($_POST['idProfesseur'],$_POST['idClasse']);
?>
    <select name="selectMatiere" onChange="competenceMatiere(this.value);">
        <option selected>-- Choisissez une matière --</OPTION>
        <?php
 
  

        foreach ($listeMatiere as $uneMatiere) {

        ?>

            <option value=<?php echo $uneMatiere['idMatiere']; ?>><?php echo $uneMatiere['nomMatiere']; ?></option>
        <?php
        }


        ?>
    </select>
    
<?php
}

if (isset($_POST['idCompetence'])) {
        $idCompetence = $_POST['idCompetence'];
        $listeCompetence = getCompetenceByMatiereFromClasse($idCompetence);
        for ($i = 1; $i <= 4; $i++) {
                $competence = "competence" . $i . "";
?>
                <select name="<?php echo $competence; ?>">
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
?>