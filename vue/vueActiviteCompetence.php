<script>
function sousCompetence1(val) {
    $.ajax({
    type: "POST",
    url: "../vue/vueActiviteCompetence.php",
    data:'idSousCompetence1='+val,
    success: function(data){
      $("#sousCompetence1").html(data);
    }
    });
  }

</script>
<?php
include_once "../modele/bd_activite.php";
include_once "../modele/bd_competence.php";




if (!empty($_POST['idClasse'])) {
        $idCompetence = $_POST['idClasse'];
        $listeCompetence = getCompetenceChapeauByDiplomeFromClasse($idCompetence);
        for ($i = 1; $i <= 4; $i++) {
                $competence = "competence" . $i . "";
                $fonction = "sousCompetence" . $i . "(this.value);";
?>
                <select name="<?php echo $competence; ?>" onchange="console.log(this.value);sousCompetence1(this.value);">
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

if (!empty($_POST['idSousCompetence1'])) {
        $idSousCompetence = $_POST['idSousCompetence1'];

        $listeSousCompetence = getSousCompetenceById($idSousCompetence);

        ?>
        <select name='sousCompetence1'>
                <option value="">--Choisir Une Sous-Compétence--</option>
                <?php
                foreach ($listeSousCompetence as $uneSousCompetence) { ?>
                        <option value="<?php echo $uneSousCompetence['idSousCompetence']; ?>"><?php echo $uneSousCompetence['libelleCompetence'] . '.' . $uneSousCompetence['libelleSousCompetence'] . ' ' . $uneSousCompetence['intituleSousCompetence']; ?></option>
                <?php }
                ?>
        </select>
<?php
}

if (!empty($_POST['idSousCompetence2'])) {
        $idSousCompetence = $_POST['idSousCompetence2'];

        $listeSousCompetence = getSousCompetenceById($idSousCompetence);

?>
        <select name='sousCompetence2'>
                <option value="">--Choisir Une Sous-Compétence--</option>
                <?php
                foreach ($listeSousCompetence as $uneSousCompetence) { ?>
                        <option value="<?php echo $uneSousCompetence['idSousCompetence']; ?>"><?php echo $uneSousCompetence['libelleCompetence'] . '.' . $uneSousCompetence['libelleSousCompetence'] . ' ' . $uneSousCompetence['intituleSousCompetence']; ?></option>
                <?php }
                ?>
        </select>
<?php
}

if (!empty($_POST['idSousCompetence3'])) {
        $idSousCompetence = $_POST['idSousCompetence3'];

        $listeSousCompetence = getSousCompetenceById($idSousCompetence);

?>
        <select name='sousCompetence3'>
                <option value="">--Choisir Une Sous-Compétence--</option>
                <?php
                foreach ($listeSousCompetence as $uneSousCompetence) { ?>
                        <option value="<?php echo $uneSousCompetence['idSousCompetence']; ?>"><?php echo $uneSousCompetence['libelleCompetence'] . '.' . $uneSousCompetence['libelleSousCompetence'] . ' ' . $uneSousCompetence['intituleSousCompetence']; ?></option>
                <?php }
                ?>
        </select>
<?php
}

if (!empty($_POST['idSousCompetence4'])) {
        $idSousCompetence = $_POST['idSousCompetence4'];

        $listeSousCompetence = getSousCompetenceById($idSousCompetence);

?>
        <select name='sousCompetence4'>
                <option value="">--Choisir Une Sous-Compétence--</option>
                <?php
                foreach ($listeSousCompetence as $uneSousCompetence) { ?>
                        <option value="<?php echo $uneSousCompetence['idSousCompetence']; ?>"><?php echo $uneSousCompetence['libelleCompetence'] . '.' . $uneSousCompetence['libelleSousCompetence'] . ' ' . $uneSousCompetence['intituleSousCompetence']; ?></option>
                <?php }
                ?>
        </select>
<?php
}
?>